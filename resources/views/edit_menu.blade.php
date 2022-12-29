@extends('layouts.main')
@section('main-container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Menu</h4>
                                    <!-- <p class="card-description">
                                        Basic form elements
                                    </p> -->
                                   
                                    <form class="forms-sample" method="POST" id="new_invoice_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                            <label for="exampleTextarea1">Menu Name </label>
                                            <input type="hidden" class="form-control" id="menuid" value="{{$menu_list[0]->menu_id}}"/>
                                            <input type="text" class="form-control" id="menuname" value="{{$menu_list[0]->menu_name}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Select Type</label>
                                            <select class="form-control" id="menuselect" >
                                                <option>Regular </option>
                                                <option value="">Breakfast</option>
                                                <option>Lunch </option>
                                                <option value="">Dinner </option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Date </label>
                                            <input type="date" class="form-control" id="menudate" value="{{$menu_list[0]->menu_date}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Price</label>
                                            <input type="text" class="form-control" id="menuprice" value="{{$menu_list[0]->menu_price}}"
                                                placeholder="Enter price">
                                        </div>

                                        <div class="form-group">
                                            <label>File upload</label>
                                            <input type="file" name="img[]" id="fileupload" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled=""
                                                    placeholder="Upload Image" value="{{$menu_list[0]->file_upload}}">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>

                                        <button type="button" id="updatemenu" class="btn btn-primary mr-2">Update</button>
                                       <div id="msg"></div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

  @endsection
  @section('scripts')
  <script>
      // add invoice
var ENDPOINT = "{{ url('/') }}";
$('#updatemenu').click(function(){
 
    var formData = new FormData();
        formData.append('menuname', $('#menuname').val());
        formData.append('menuid', $('#menuid').val());
        formData.append('menuselect', $('#menuselect').val());
        formData.append('menudate', $('#menudate').val());
        formData.append('menuprice', $('#menuprice').val());
        formData.append('_token','{{ csrf_token() }}');
        formData.append('fileupload', $('#fileupload').get(0).files[0]);
    $.ajax({
        url:ENDPOINT + '/update_menu',
        method:"POST",
        data: formData,
        dataType:'json',
        headers: {
                'IsAjax': 'true'
            },
            processData: false,
            contentType: false,
            dataType: 'json',
        success:function(data)
        {
            if(data.code=="404"){
                $('#msg').html('<div class="alert alert-danger">'+data.msg+'</div>');
            }
            else{
                $('#msg').html('<div class="alert alert-success">Updated successfully!.</div>');
            }
        }
    });
});


</script>
@endsection