<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\login;
use App\Models\state;


class AdminController extends Controller
{
    public function login(){
        return view('owner.log_in');
    }

    public function submit_login(Request $req){

        $validator = Validator::make($req->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }else{
            $data = login::where('email', $req->email)
                      ->where('password',$req->password)
                      ->get()->toArray();

                      
            if(!empty($data)){
                $req->session()->put(['email' => $data[0]['email'], 'password' => $data[0]['password']]);
                
                return redirect('dashboard');
            }else{
                return back()->withErrors(['email'=>'Email not match !', 'password' => 'Password not Match !'])->withInput();
            }

        }
    }

    public function dashboard(Request $request){
        return view('owner.home');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('admin-setting');
    }

    public function add_package(){
        
        $data['category'] = DB::table('tbl_category')->select('*')->get()->toArray();
        
        $city_state = DB::table('tbl_city')
            ->join('tbl_state', 'tbl_city.state_id', '=', 'tbl_state.id')
            ->select(DB::raw('CONCAT(tbl_city.city_name,",",tbl_state.state_name) as city_state'))
            ->get()->toArray();

            $city_state = json_decode(json_encode($city_state), true);
            $city_state = array_column($city_state,'city_state');
            $data['city_state'] = implode('*,*',$city_state);
                       
            return view('owner.package.add_package',$data);
    }


    public function save_update_package(Request $request){    
        if($request->ajax()){

            if($request->update_id==''){
                $getMasterRecord=json_decode(json_encode(DB::table('tbl_package_master')
                              ->where(['category_id'=> $request->category, 'from_city' => $request->from_city, 'to_city' => $request->to_city])
                              ->get()), true);
            
                if(!empty($getMasterRecord)){
                    $success = $this->package_detail($request->is_remove,$getMasterRecord[0]['id'],$request->update_detail,$request->file('cab_image'),$request->cab_name,$request->cab_detail,$request->cab_distance,$request->delete_amount,$request->save_amount,$request->total_amount);
                }else{
                    $record=[
                        'category_id' => $request->category,
                        'from_city' => $request->from_city,
                        'to_city' => $request->to_city,
                        'updated_at' => date('Y:m:d h:i:s')
                    ];
                    
                    if(DB::table('tbl_package_master')->insert($record)){
                        $latestInsertedId=DB::table('tbl_package_master')->latest('id')->first()->id;
        
                        $success = $this->package_detail($request->is_remove,$latestInsertedId,$request->update_detail,$request->file('cab_image'),$request->cab_name,$request->cab_detail,$request->cab_distance,$request->delete_amount,$request->save_amount,$request->total_amount);
                    }
                }

                if($success>0){
                    return response()->json(['error'=>'success','message'=>'Package successfully added!']);
                }else{
                    return response()->json(['error'=>'fail','message'=>'Package can not added!']);
                }
            }else{               

               $update = $this->package_detail($request->is_remove,$request->update_id,$request->update_detail,$request->file('cab_image'),$request->cab_name,$request->cab_detail,$request->cab_distance,$request->delete_amount,$request->save_amount,$request->total_amount);
               if($update>0){
                return response()->json(['error'=>'success','message'=>'Package successfully updated!']);
                }else{
                    return response()->json(['error'=>'fail','message'=>'Package can not updated!']);
                }
            }       
        }          
    }

    public function package_detail($is_remove,$packageMasterId,$updateDetail,$cabImage,$cabName,$cabDetail,$cabDistance,$deleteAmount,$saveAmount,$totalAmount){
        
        $detailRecord=array_column(DB::table('tbl_package_detail')->get()->toArray(), 'cab_image', 'package_detail_id');     

        $insert=[];
        $update=[];
        $delete=explode(",",$is_remove);
        $iud=[];
        $packageDetailId=[];

        for($i=0; $i<count($updateDetail); $i++){

            $array=[
                'package_master_id' => $packageMasterId,                    
                'cab_name' => $cabName[$i],
                'cab_detail' => $cabDetail[$i],
                'distance' => $cabDistance[$i], 
                'delete_amount' => $deleteAmount[$i], 
                'save_amount' => $saveAmount[$i], 
                'total_amount' => $totalAmount[$i], 
                'updated_at' => date('Y:m:d H:i:s'),
            ];

            if($updateDetail[$i]==''){
                if(isset($cabImage[$i])){
                    $imagename = $cabImage[$i]->hashName();
                    $cabImage[$i]->storeAs('public/images/cab_detail_img',$imagename);
                    $array['cab_image'] = $imagename;
                }                
                array_push($insert,$array);
            }else if($updateDetail[$i]!=''){
                if(isset($cabImage[$i])){
                    $imagename = $cabImage[$i]->hashName();
                    unlink('storage/images/cab_detail_img/'.$detailRecord[$updateDetail[$i]]);                    
                    $cabImage[$i]->storeAs('public/images/cab_detail_img',$imagename);                    
                    $array['cab_image'] = $imagename;
                }
                
                $array['package_detail_id']=$updateDetail[$i];
                array_push($update,$array);                
            }
        }      
       
        $success=0;     
        if(!empty($insert)){
            if(DB::table('tbl_package_detail')->insert($insert)){
                $success++;
            }
        }
        
        if(!empty($update)){
            $upd=0;
            foreach($update as $up){
                if(DB::table('tbl_package_detail')->where('package_detail_id', $up['package_detail_id'])->update($up)){
                    $upd++;
                }
            }
            if($upd>0){
                $success++;
            }
        }

        if(!empty($delete)){
            $upd=0;
            foreach($delete as $de){
                if(DB::table('tbl_package_detail')->where('package_detail_id', '=', $de)->delete()){
                    $upd++;
                }
            }
            if($upd>0){
                $success++;
            }
        }
        
        return $success;
    }

    public function get_all_records(Request $request){
        if($request->ajax()){
            
            $all_data = DB::table('tbl_package_master')->orderBy('id','DESC')->get();
            $count = array_count_values(array_column(DB::table('tbl_package_detail')->get()->toArray(), 'package_master_id'));
            $category=array_column(DB::table('tbl_category')->get()->toArray(), 'category_name', 'category_id');
            $record = json_decode(json_encode($all_data),true);
            
            $package=[];
            foreach($record as $rec){             
                $numPackage=$count[$rec['id']];
                $ctegoryName=$category[$rec['category_id']];
                $row = [
                    'id' => $rec['id'],
                    'category_name'=>  $ctegoryName,
                    'from_city'=>  $rec['from_city'],
                    'to_city'=>  $rec['to_city'],
                    'total_package' => $numPackage
                ];
                array_push($package,$row);
            }            
            return json_encode($package);
        }
    }

    public function get_single_package_record(Request $request){

        if($request->ajax()){
            $all_data = json_decode(json_encode(DB::table('tbl_package_master')            
            ->Select('tbl_package_master.id', 'tbl_package_master.category_id', 'tbl_category.category_id' , 'tbl_category.category_name', 'tbl_package_master.from_city', 'tbl_package_master.to_city', 'tbl_package_master.is_delete as m_is_deleted', 'tbl_package_master.created_at as m_created_at', 'tbl_package_master.updated_at AS m_updated_at', 'tbl_package_detail.*')
            ->join('tbl_package_detail','tbl_package_master.id','=','tbl_package_detail.package_master_id')
            ->join('tbl_category', 'tbl_package_master.category_id', '=', 'tbl_category.category_id')
            ->where(['tbl_package_master.id' => $request->id, 'tbl_package_detail.is_delete' => 0])
            ->orderBy('tbl_package_master.id','DESC')
            ->get()), true);


            $unique_data=[];
            $package_data=[];
            foreach($all_data as $rec){
                if(!in_array($rec['package_master_id'],$unique_data)){
                    array_push($unique_data,$rec['package_master_id']);
                    
                    $detail=[
                        'package_detail_id' => $rec['package_detail_id'],
                        'package_master_id' => $rec['package_master_id'],
                        'trip_id' => $rec['trip_id'],
                        'address' => $rec['address'],
                        'cab_image' => $rec['cab_image'],
                        'cab_name' => $rec['cab_name'],
                        'cab_detail' => $rec['cab_detail'],
                        'distance' => $rec['distance'],
                        'hourse' => $rec['hourse'],
                        'delete_amount' => $rec['delete_amount'],
                        'save_amount' => $rec['save_amount'],
                        'total_amount' => $rec['total_amount'],
                        'is_active' => $rec['is_active'],
                        'is_delete' => $rec['is_delete'],
                        'created_at' => $rec['created_at'],
                        'updated_at' => $rec['updated_at']
                    ];

                    $master_data = [
                        'id' => $rec['id'],
                        'category_id' => $rec['category_id'],
                        'category_name' => $rec['category_name'], 
                        'from_city' => $rec['from_city'], 
                        'to_city' => $rec['to_city'],
                        'm_is_deleted' => $rec['m_is_deleted'],
                        'm_created_at' => $rec['m_created_at'], 
                        'm_updated_at' => $rec['m_updated_at'],
                        'detail'=> [] 
                    ]; 

                    array_push($master_data['detail'],$detail);
                    array_push($package_data,$master_data);                    
                }else{
                    
                    $detail=[
                        'package_detail_id' => $rec['package_detail_id'],
                        'package_master_id' => $rec['package_master_id'],
                        'trip_id' => $rec['trip_id'],
                        'address' => $rec['address'],
                        'cab_image' => $rec['cab_image'],
                        'cab_name' => $rec['cab_name'],
                        'cab_detail' => $rec['cab_detail'],
                        'distance' => $rec['distance'],
                        'hourse' => $rec['hourse'],
                        'delete_amount' => $rec['delete_amount'],
                        'save_amount' => $rec['save_amount'],
                        'total_amount' => $rec['total_amount'],
                        'is_active' => $rec['is_active'],
                        'is_delete' => $rec['is_delete'],
                        'created_at' => $rec['created_at'],
                        'updated_at' => $rec['updated_at']
                    ];
                    
                    array_push($package_data[0]['detail'],$detail);
                }
            }

            return json_encode($package_data);
        }
    }


    public function  add_cities(){

        $data['states']=json_decode(json_encode(DB::table('tbl_state')->get()),true);   

        return view('owner.package.add_cities',$data);
    }

    public function save_update_cities(Request $request){
        if ($request->isMethod('post')) {
            
            $deleteIds = $request->input('delete_ids');

            if(!empty($deleteIds)){
                $deleteIds = explode(",",$deleteIds);
                DB::table('tbl_city')->whereIn('city_id',$deleteIds)->delete();
            }
            
            $ids = $request->input('city_ids');
            $state = $request->input('states');
            $city = $request->input('city');

            $insert=[];
            for($i=0; $i<count($ids); $i++){                
                $insert[$i]['state_id'] = $state;
                $insert[$i]['city_name'] = $city[$i];
                $insert[$i]['mannual'] = 1;
                $insert[$i]['city_id'] = $ids[$i];
            }

           DB::table('tbl_city')->upsert(
                $insert,
                ['city_id']
            );

            return ['status'=>1,'message'=>'Record updated !'];

            }
    }

    public function get_all_cities(){        

        $getData = DB::table('tbl_city')
                    ->join('tbl_state', 'tbl_city.state_id', '=', 'tbl_state.id')
                    ->select(DB::raw('count(tbl_city.state_id) as no_of_cities, tbl_city.state_id, tbl_state.state_name'))
                    ->where(['tbl_city.mannual'=>1])
                    ->groupBy('tbl_city.state_id')
                    ->groupBy('tbl_state.state_name')
                    ->orderBy('tbl_city.city_id','desc')
                    ->get()->toArray();
        
        if(!empty($getData)){
            return  ['status' => 1, "record" => $getData];
        }else{
            return ['status' => 0, "record" => "No Record !"];
        }
    }

    public function get_single_cities(Request $request){

        if($request->isMethod('post')){
            $state_id = $request->all();

            return  DB::table('tbl_city')
                       ->where(['mannual'=>1, 'state_id' => $state_id['state_id']])
                       ->get()->toArray();
        }
        
    }
}


