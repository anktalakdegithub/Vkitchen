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
                                    <h4 class="card-title">Add Menu</h4>
                                    <!-- <p class="card-description">
                                        Basic form elements
                                    </p> -->
                                    <form method="POST" class="forms-sample" enctype="multipart/form-data">
                                   
                                    <div class="form-group">
                                            <label for="exampleTextarea1">Menu Name </label>
                                            <input type="text" class="form-control" id="menuname"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Select Type</label>
                                            <select class="form-control" id="menuselect" >
                                                <option value="Regular">Regular </option>
                                                <option value="Breakfast">Breakfast</option>
                                                <option value="Lunch">Lunch </option>
                                                <option value="Dinner">Dinner </option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Date </label>
                                            <input type="date" class="form-control" id="menudate"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Price</label>
                                            <input type="text" class="form-control" id="menuprice"
                                                placeholder="Enter price">
                                        </div>

                                        <div class="form-group">
                                            <label>File upload</label>
                                            <input type="file" name="img[]" id="fileupload" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled=""
                                                    placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-primary mt-2 btnmenu">Submit</button>
                                        <div id="msg"></div>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
       
        $(document).on('click', '.btnmenu', function() {
                var ENDPOINT = "{{ url('/') }}";
                var formData = new FormData();
                formData.append('menuname', $('#menuname').val());
                formData.append('menuselect', $('#menuselect').val());
                formData.append('menudate', $('#menudate').val());
                formData.append('menuprice', $('#menuprice').val());
                formData.append('_token','{{ csrf_token() }}');
                formData.append('fileupload', $('#fileupload').get(0).files[0]);
            
                $.ajax({
                    method: "POST",
                    url: ENDPOINT + '/storemenu',
                    data: formData,
                    headers: {
                        'IsAjax': 'true'
                    },
                    processData: false,
                    contentType: false,
                    dataType: 'json',

                    success: function(data) {
                        if (data.code == "404") {
                            $('#msg').html('<p class="text-danger">' + data.msg + '</p>');
                        
                        } else {
                            // alert('success');
                            $('#msg').html('<p class="text-success">' + data.msg + '</p>');
                    
                        }


                    }
                });
                
        });
    });
</script>