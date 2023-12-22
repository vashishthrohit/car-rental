@section('title')
<title>Dashboard || Add Cities</title>
@endsection
<x-dashboard_head_link></x-dashboard_head_link>
<x-dashboard_header></x-dashboard_header>

<!-- Title Area -->
<section>
    <div class="container">
        <div class="row">
            <div class="title-area">
                <p>Add Cities</p>
            </div>
        </div>
    </div>
</section>
<!-- End Title Area-->

<!-- Add package button area for model -->
<section class="mt-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <button type="button" id="package_button" class="package_button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add
                    Cities</button>
            </div>
        </div>
    </div>
</section>
<!-- End Add package button area for model -->
<!-- Modal -->
<section>
    <form id="submit_form" action="">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Cities</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-header d-block">                      
                        <div>
                            @csrf
                            <div class="row">
                                <div class="col-md-2 col-lg-2" style="width:12% !important;">
                                    <label for="exampleInputEmail1" class="form-label">Select States</label>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <select id="state" class="form-select form-select-sm" name="states">
                                        <option value="">--Select--</option>
                                        @foreach($states as $row)
                                            <option value="{{$row['id']}}">{{$row['state_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>                                
                            </div>
                        </div>                       
                    </div>
                <div class="modal-body">
                                
                        <input name="update_id" type="hidden" />
                        <input id="is_remove" name="delete_ids" class="is_remove" value=""/ type="hidden">

                        <div class="table-responsive">
                            <table class="table table-bordered custom-table-append">      
                                <thead class="p-0">
                                    <th>Sr.No</th>
                                    <th>Cities</th>
                                    <th>Action</th>
                                </thead>                          
                                <tbody id="add_cities_name" class="add_cities_data">
                                    
                                </tbody>
                            </table>
                        </div>
                </div>
                <input id="index4" value="" type="hidden">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary save_btn">Save</button>                    
                </div>                
            </div>           
        </div>        
    </div>
     </form>
</section>
<section>
    <div class="container">
        <table id="city_table" class="table table-bordered mt-3 custom-table-append">
            <thead class="p-0">
                <th>Sr.No</th>
                <th>States</th>
                <th>No of Cities</th>
               <th>Action</th>
            </thead>
            <tbody id="cities_data">
                
            </tbody>
        </table>
    </div>
</section>
</div>

<x-dashboard_foot_link></x-dashboard_foot_link>
<script type="text/javascript">
    
$(document).ready(function(){
    all_data();
});

var no = 2;
var insert_row = 1;
var delete_ids=[]; 

all_data = async() => {
    
    let Response = await fetch("{{url('get-all-cities')}}", {
        method: 'POST', 
        headers: {
            // 'Content-Type': 'application/json',
            // 'Accept': 'application/json',
            // 'url': 'get-all-cities',
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
            },
        });
    
    let result = await Response.json();

    let tbody = document.getElementById("cities_data");
    tbody.innerHTML="";

    if(result.status == 0){
        let row =  tbody.insertRow(0);
        let cell1 = row.insertCell();
        
        cell1.setAttribute("colspan", 4);
        cell1.setAttribute("class","fw-bold");
        cell1.innerHTML = result.record;
    }else{        
        let srno = 1;
        for(let x in result.record){
            let row =  tbody.insertRow(x);
            let cell1 = row.insertCell();
            let cell2 = row.insertCell();
            let cell3 = row.insertCell();
            let cell4 = row.insertCell();
            cell1.innerHTML = srno;
            cell2.innerHTML = result.record[x].state_name;
            cell3.innerHTML = result.record[x].no_of_cities;
            cell4.innerHTML = `<i class="fas fa-edit" style="cursor:pointer; color:var(--theme-color);" onclick="get_single_record(${result.record[x].state_id})" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i> <i class="fas fa-minus-circle text-danger"></i>`;
            srno++;
        }
    }
}

document.getElementById("package_button").addEventListener("click", function(){
    inisilize();
});

inisilize = () =>{
    var delete_ids=[];
    document.getElementById('state').removeAttribute('style');
    document.getElementById("state").value = "";
    var tbody = document.getElementById('add_cities_name');
    tbody.innerHTML = "";
    var row = tbody.insertRow(0);
    let td3 = row.insertCell(0);
    let td2 = row.insertCell(0);
    let td1 = row.insertCell(0);
    td1.setAttribute("class","srno");
    td1.innerHTML = "1";
    let input = document.createElement('input');
    input.setAttribute("id","city");
    input.setAttribute("class","city");
    input.setAttribute("name","city[]");
    input.style.width = "100%";

    let input2 = document.createElement('input');
    input2.setAttribute("name","city_ids[]");
    input2.setAttribute("type","hidden");
    td2.appendChild(input2);

    td2.appendChild(input);
    td3.innerHTML = `<a style="color:red;"><i class="fa fa-ban" aria-hidden="true"></i></a> <a class="ms-3" style="cursor:pointer;" onClick="add_new_row()"><i class="fa fa-plus" aria-hidden="true"></i></a>`;

    no = 2;
    insert_row = 1;
}

add_new_row = () => {
    
    let cityval = document.getElementsByClassName('city');
    for(i=0; i<cityval.length; i++){
        if(cityval[i].value=='' || document.getElementById("state").value==""){
            Swal.fire({
                icon: 'error',
                title: 'Please Fill all fields !',
                showConfirmButton: false,
                timer: 2500
            })
            return 0;
        }
    }

    var tbody = document.getElementById('add_cities_name');
    var row = tbody.insertRow(insert_row);
    let td3 =  row.insertCell(0);
    let td2 = row.insertCell(0);
    let td1 = row.insertCell(0);
    let input = document.createElement("input");
    input.setAttribute("id","city");
    input.setAttribute("class","city");
    input.setAttribute("name","city[]");
    input.style.width = "100%";

    td1.setAttribute("class","srno");
    td1.innerHTML = no;

    let input2 = document.createElement('input');
    input2.setAttribute("name","city_ids[]");
    input2.setAttribute("type","hidden");
    td2.appendChild(input2);

    td2.appendChild(input);
    td3.innerHTML = `<a onclick="delete_row(this)" style="cursor:pointer;"><i class="fa fa-minus" aria-hidden="true"></i></a> <a class="ms-3" style="cursor:pointer;" onClick="add_new_row()"><i class="fa fa-plus" aria-hidden="true"></i></a>`;
    no++;
    insert_row++;
}

delete_row = (row,id="") => {
   
    if(id!=""){
        delete_ids.push(id);
        document.getElementById('is_remove').value = delete_ids;
    }
    
    $(row).closest('tr').remove();
    let srno = document.getElementsByClassName('srno');
    let uniqno = 0;
    for(i=0; i<srno.length; i++){
         srno[i].innerHTML = i+1;
         uniqno = i+1;
    }
    no=uniqno+1;
    insert_row=uniqno;
}

get_single_record = async(state_id) =>{

    delete_ids=[];

    let stateId = new FormData();
        stateId.append('state_id',state_id);

    let Response = await fetch("{{url('get-single-cities')}}", {
        method: 'POST',
        body:stateId,
        headers: {
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
            },
    });
    
    let result = await Response.json();
   
    let state = document.getElementById('state');
     
    state.value = result[0].state_id;  
    state.setAttribute('style','pointer-events:none !important; background-color:antiquewhite;');
    
    let tbody = document.getElementById('add_cities_name');
    tbody.innerHTML="";

    let srno=1;
    let rowInsert=0;
    for(let x in result){
          let row = tbody.insertRow(x);
          let cell1 = row.insertCell();
          let cell2 = row.insertCell();
          let cell3 = row.insertCell();
          cell1.innerHTML = srno;
          cell1.classList.add('srno');
          let cityId = document.createElement('input');
              cityId.setAttribute('name','city_ids[]');
              cityId.setAttribute('type','hidden');
              cityId.setAttribute('value',result[x].city_id);
          let cityName = document.createElement('input');
              cityName.setAttribute('name','city[]');
              cityName.setAttribute('class','w-100');
              cityName.classList.add("w-100");
              cityName.classList.add("city");
              cityName.setAttribute('value',result[x].city_name);
          cell2.appendChild(cityId);
          cell2.appendChild(cityName);

          if(x==0){
            cell3.innerHTML = `<a style="color:red;"><i class="fa fa-ban" aria-hidden="true"></i></a> <a class="ms-3" style="cursor:pointer;" onClick="add_new_row()"><i class="fa fa-plus" aria-hidden="true"></i></a>`;
          }else{
            cell3.innerHTML = `<a onclick="delete_row(this,${result[x].city_id})" style="cursor:pointer;"><i class="fa fa-minus" aria-hidden="true"></i></a> <a class="ms-3" style="cursor:pointer;" onClick="add_new_row()"><i class="fa fa-plus" aria-hidden="true"></i></a>`;
          }
          srno++;
          rowInsert++;
    }

    no=srno;
    insert_row=rowInsert;
}

submit_form.onsubmit = async(e) => {
    e.preventDefault();

    let cityval = document.getElementsByClassName('city');
    for(i=0; i<cityval.length; i++){
        if(cityval[i].value=='' || document.getElementById("state").value==""){
            Swal.fire({
                icon: 'error',
                title: 'Please Fill all fields !',
                showConfirmButton: false,
                timer: 2500
            })
            return 0;
        }
    }

    let formData = new FormData(submit_form);

    let response = await fetch("{{url('save-cities')}}", {
      method: 'POST',
      body: formData
    });

    let result = await response.json();

    if(result.status==1){
        Swal.fire({
                icon: 'success',
                title: result.message,
                showConfirmButton: false,
                timer: 2500
            })

            document.getElementsByClassName('btn-close')[0].click();
            all_data();
            delete_ids=[];
    }

}



</script>
