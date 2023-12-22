<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    public function  home(){
        $city_state = DB::table('tbl_city')
            ->join('tbl_state', 'tbl_city.state_id', '=', 'tbl_state.id')
            ->select(DB::raw('CONCAT(tbl_city.city_name,",",tbl_state.state_name) as city_state'))
            ->get()->toArray();

            $city_state = json_decode(json_encode($city_state), true);
            $city_state = array_column($city_state,'city_state');
            $data['city_state'] = implode('*,*',$city_state);

            return view('home',$data);
    }


    // Search Package
    public function search_package(Request $request){

        if ($request->isMethod('get')) {

            $data=[
                'from_city' => $request->input('from_city'),
                'to_city' => $request->input('to_city'),
                'category_id' => $request->input('category_id'),
                'category_name' => '',
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'package_detail' => []
            ];
            $masterId='';

            $master=json_decode(json_encode(DB::table('tbl_package_master')->
                            where(['from_city'=>$data['from_city'], 'to_city'=>$data['to_city'], 'category_id'=>$data['category_id']])->get()->toArray()), true);
            
            if(!empty($master)){
                $masterId=$master[0]['id'];
            }
            
            $category=array_column(json_decode(json_encode(DB::table('tbl_category')->get()->toArray()),true), 'category_name', 'category_id');
            
            if(array_key_exists($data['category_id'],$category)){
                $data['category_name']=$category[$data['category_id']];
            }
            
            if($masterId!=''){
                $data['package_detail']=json_decode(json_encode(DB::table('tbl_package_detail')->where(['package_master_id'=>$masterId])->get()->toArray()), true);     
            }          
            
            
            return view('package_detail', $data);
        }
    }

    public function booking_form(Request $request){
        
        $data=[
            'from_city'=>$request->input('from_city'),
            'to_city'=>$request->input('to_city'),
            'time_date'=>$request->input('time_date'),
            'cab_name'=>$request->input('cab_name'),
            'amount'=>$request->input('amount'),
            'distance'=>$request->input('distance'),
            ];
        
        return view('booking_page', $data);

    }
    
}
