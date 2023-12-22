@section('title')
<title>Dashboard || Add Package</title>
@endsection
<x-dashboard_head_link></x-dashboard_head_link>
<x-dashboard_header></x-dashboard_header>

<!-- Title Area -->
<section>
    <div class="container">
        <div class="row">
            <div class="title-area">
                <p>Add Package</p>
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
                    Package</button>
            </div>
        </div>
    </div>
</section>
<!-- End Add package button area for model -->
<!-- Modal -->
<section>
    <form name="package_form" id="submit_form" action="" enctype="multipart/form-data">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-header d-block">                      
                        <div>
                            @csrf
                            <div class="row">
                                <div class="col-md-2 col-lg-2" style="width:12% !important;">
                                    <label for="exampleInputEmail1" class="form-label">Select Category </label>
                                </div>
                                <div class="col-md-2 col-lg-2">
                                    <select class="form-select form-select-sm" name="category">
                                        <option value="">--Select--</option>
                                        @foreach($category as $rec)
                                            <option value="{{$rec->category_id}}">{{$rec->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1" class="form-label">From City</label>
                                </div>
                                <div class="col-md-3 autocomplete">
                                    <input name="from_city" id="from_city" type="text"
                                        class="form-control form-control-sm" placeholder="From City" autocomplete="off">
                                </div>
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1" class="form-label">To City</label>
                                </div>
                                <div class="col-md-3 autocomplete">
                                    <input name="to_city" id="to_city" type="text" class="form-control form-control-sm"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="To City"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>                       
                    </div>
                <div class="modal-body"> 
                                
                        <input name="update_id" type="hidden" />
                        <input type="hidden" name="is_remove" class="is_remove" value=""/>

                        <div class="table-responsive">
                            <table class="table table-bordered custom-table-append">      
                                <thead class="p-0">
                                    <th>Sr.No</th>
                                    <th style="width:95px;">Cab Image</th>
                                    <th>Cab Name</th>
                                    <th>Cab Detail</th>
                                    <th>Distance</th>
                                    <th>Delete Amount</th>
                                    <th>Save Amount</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </thead>                          
                                <tbody id="add_package_data" class="add_package_data">
                                                                        
                                </tbody>
                            </table>
                        </div>
                </div>
                <input id="index4" value="" type="hidden">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary save_btn">Save</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>                
            </div>           
        </div>        
    </div>
     </form>
</section>

<section>
    <div class="container">
        <table class="table table-bordered mt-3 custom-table-append">
            <thead class="p-0">
                <th>Sr.No</th>
                <th>Category</th>
                <th>From City</th>
                <th>To City</th>
                <th>Number of Package</th>
                <th>Action</th>
            </thead>
            <tbody id="package_data_show">
                
            </tbody>
        </table>
    </div>
</section>
</div>
<x-dashboard_foot_link></x-dashboard_foot_link>

<script type="text/javascript">
var city_state = '{{$city_state}}'.split("*,*");

autocomplete(document.getElementById("from_city"), city_state);
autocomplete(document.getElementById("to_city"), city_state);

$(document).ready(()=>{
    get_all_record();    
});

var srno=0;
$(".package_button").click(function(){
    initialize();    
});

initialize = () =>{
    srno=0;
    $('[name=update_id]').val("");
    $('[name=category]').val("");
    $('[name=from_city]').val("");
    $('[name=to_city]').val("");
    appendFirstRow(0);
}

validation = () =>{
    srno++;
    let validation = new Promise((resolve,reject) => {
            if(inputvalidation()){
                    resolve();                          
            }else{
                reject();
            }
        });

        validation.then(()=>{
            appendFirstRow(1);
        }).catch(()=>{
            Swal.fire({
                    icon: 'error',
                    title: 'Please Fill all fields !',
                    showConfirmButton: false,
                    timer: 2500
                })        
        });
}

appendFirstRow = (value='') => {
    if(value==0){
        $('#add_package_data').html('');
    }
    srno++;
    
    html =
        `<tr class="row-add">
                    <td><span class="srno"></span><input name="update_detail[]" type="hidden" value=""/></td>
                    <td>
                        <div class="append-choose-image">                            
                            <img class="img_preview" id="imgpreview_${srno}" src="{{url('assets/images/car-default.png')}}" height="80px" width="130px">
                            <label class="label" for="formFileSm_${srno}">Choose Image</label>
                        </div>
                        <input  name="cab_image[]" class="preview-image d-none check-val" id="formFileSm_${srno}" type="file" data-id="imgpreview_${srno}">
                    </td>
                    <td><textarea name="cab_name[]" class="check-feild check-val" id="" rows="3"></textarea></td>
                    <td><textarea name="cab_detail[]" class="check-feild cab_detail check-val" id="" rows="3"></textarea></td>
                    <td><input name="cab_distance[]" class="check-feild check-val" id="" type="text" style="width:100%;"></td>
                    <td><input name="delete_amount[]" class="check-val" id="" type="text" style="width:100%;"></td>
                    <td><input name="save_amount[]" class="check-val" id="" type="text" style="width:100%;"></td>
                    <td><input name="total_amount[]" class="check-feild check-val" id="" type="text" style="width:100%;"></td>
                    <td style="position:relative;"><a class="add_new_row" onClick="validation()"><i class="fa fa-plus" aria-hidden="true"></i></a>`;
    if (srno == 1) {
        html += `<a class="ban"><i class="fa fa-ban" aria-hidden="true"></i></a></td></tr>`;
    } else {
        html += `<a class="delete_row"><i class="fa fa-minus" aria-hidden="true"></i></a></td></tr>`;
    }
    $('#add_package_data').append(html);

    const srnos = document.getElementsByClassName("srno");    

    let num=1;
    for(var i=0; i<srnos.length; i++){
        srnos[i].innerHTML = num;
        // $(img_preview[i]).attr('id','imgpreview_'+num);
        num++;
    }
}

var delete_ids=[];
$(document).on('click','.delete_row',function(){    
    $(this).closest('tr').remove();
    delete_ids.push($(this).closest('tr').find('.update_detail').val());
    $('.is_remove').val(delete_ids);

    const srnos = document.getElementsByClassName("srno");
    let num=1;
    for(var i=0; i<srnos.length; i++){
        srnos[i].innerHTML = num;
        num++;
    }
});

function readURL(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on('change', '.preview-image', function() {
    var s = (this.files[0].size);
    var ext = $(this).val().split('.').pop().toLowerCase();
    var array = ["png", "jpg", "jpeg"];
    s = Math.round(s / 1024);
    if (s <= 100 && array.includes(ext)) {
        readURL(this, $(this).attr("data-id"));
    } else {
        if (s >= 100) {
            $(this).val("");
            Swal.fire({
                icon: 'error',
                title: 'Image Size Must be 100kb !',
                showConfirmButton: false,
                timer: 2500
            })
            return 0;
        }
        if ($.inArray(ext, ["png", "jpg", "jpeg"]) == -1) {
            $(this).val("");
            Swal.fire({
                icon: 'error',
                title: 'Image Extesion Error !',
                showConfirmButton: false,
                timer: 2500
            })
            return 0;
        }
    }
});

inputvalidation = () =>{
    let check=0;
    if($('[name=category]').val() == "" || $('[name=from_city]').val() == "" ||$('[name=to_city]').val() == ""){
        check++;
    }

    $('.check-val').each(function(index,value){
        if($(this).val()==""){            
            check++;
        }
    });

   if(check!=0){
        return false;
    }else{
        return true;
    }
}

$('.save_btn').click((e)=>{
    e.stopPropagation();

    var formdata = new FormData($('#submit_form')[0]);

    if(inputvalidation()==false){
        Swal.fire({
            icon: 'error',
            title: 'Please Fill all fields !',
            showConfirmButton: false,
            timer: 2500
        })
        return 0;
    }

    var formdata = new FormData($('#submit_form')[0]);

    $.ajax({
        type: "POST",
        url: "{{url('save-package')}}",
        data: formdata,
        processData: false,
        contentType: false,
        // dataType: "json",
        success: function(data) {
            if(data['error']=='success'){
                Swal.fire({
                    icon: 'success',
                    title: data['message'],
                    showConfirmButton: false,
                    timer: 2500
                })                
                initialize();
                $('.btn-close').click();
                get_all_record();
            }
           
        },
        error: function(data) {
           //process error msg
        },
    });
    
});

get_all_record = () =>{

    $.get("{{url('get_all_package')}}",'',function(data,textStatus,xhr){
        var data = JSON.parse(data);
        var html = '';

        data.forEach((item,index) => {            
            html += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${item.category_name}</td>
                            <td>${item.from_city}</td>
                            <td>${item.to_city}</td>
                            <td>${item.total_package}</td>
                            <td><i class="fas fa-edit edit-pkg" onClick="update_pkg(${item.id})" style="color:var(--theme-color);"></i> <i class="fas fa-minus-circle text-danger"></i></td>
                        </tr>
            `;
        });        
        $('#package_data_show').html(html);    
    });
}

update_pkg = (id) => {

    $.get("{{url('get-single-package-record')}}",{id},function(data,textStatus,xhr){
        var data = JSON.parse(data);         
        
        $('#staticBackdrop').modal('show');
        $('[name=update_id]').val(data[0]['id']);
        $('[name=category]').val(data[0]['category_id']);
        $('[name=from_city]').val(data[0]['from_city']);
        $('[name=to_city]').val(data[0]['to_city']);        

        let detail = data[0]['detail'];
        let detailhtml='';
        $('#add_package_data').html('');

        detail.forEach((item,index) => {
            srno++;
            var img = item['cab_image'];
            detailhtml +=
                    `<tr class="row-add">
                                <td><span class="srno"></span><input name="update_detail[]" class="update_detail" type="hidden" value="${item['package_detail_id']}"/></td>
                                <td>
                                    <div class="append-choose-image">                            
                                        <img class="img_preview" id="imgpreview_${srno}" src="{{asset('storage/images/cab_detail_img/${img}')}}" height="80px" width="130px">
                                        <label class="label" for="formFileSm_${srno}">Choose Image</label>
                                    </div>
                                    <input  name="cab_image[]" class="preview-image d-none" id="formFileSm_${srno}" type="file" data-id="imgpreview_${srno}">
                                </td>
                                <td><textarea name="cab_name[]" class="check-feild check-val" id="" rows="3">${item['cab_name']}</textarea></td>
                                <td><textarea name="cab_detail[]" class="check-feild cab_detail check-val" id="" rows="3">${item['cab_detail']}</textarea></td>
                                <td><input name="cab_distance[]" class="check-feild check-val" id="" type="text" style="width:100%;" value="${item['distance']}"></td>
                                <td><input name="delete_amount[]" class="check-val" id="" type="text" style="width:100%;" value="${item['delete_amount']}"></td>
                                <td><input name="save_amount[]" class="check-val" id="" type="text" style="width:100%;" value="${item['save_amount']}"></td>
                                <td><input name="total_amount[]" class="check-feild check-val" id="" type="text" style="width:100%;" value="${item['total_amount']}"></td>
                                <td style="position:relative;"><a class="add_new_row" onClick="validation()"><i class="fa fa-plus" aria-hidden="true"></i></a>`;
                if (index == 0) {
                    detailhtml += `<a class="ban"><i class="fa fa-ban" aria-hidden="true"></i></a></td></tr>`;
                } else {
                    detailhtml += `<a class="delete_row"><i class="fa fa-minus" aria-hidden="true"></i></a></td></tr>`;
                }                
        });
        $('#add_package_data').append(detailhtml);

        const srnos = document.getElementsByClassName("srno");

        let num=1;
        for(var i=0; i<srnos.length; i++){
            srnos[i].innerHTML = num;
            // $(img_preview[i]).attr('id','imgpreview_'+num);
            num++;
        }
    });    
}

</script>
