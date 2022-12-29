@extends('layouts.main')
@section('main-container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Add Order</h4>
                            </div>
                            <div class="col-md-6">
                                <!-- <a href="add_cash.php"
                                    class="btn btn-primary mb-2 float-right">Adjust Cash</a> -->
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <form class="forms-sample">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Order Title</label>
                                                <input type="text" class="form-control" id="ordertitle"
                                                    placeholder="Enter Order Title">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Amount</label>
                                                <input type="text" class="form-control" id="amount"
                                                    placeholder="Please Enter Amount">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Add Image</label>
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


                                    <button type="button" class="btn btn-primary mr-2 btnorder">Submit</button>
                                    @csrf
                                    <div id="msg"></div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection
        @section('scripts')

        <script>
        $(document).ready(function() {

            $(document).on('click', '.btnorder', function() {
                var ENDPOINT = "{{ url('/') }}";
                var formData = new FormData();
                formData.append('ordertitle', $('#ordertitle').val());
                formData.append('amount', $('#amount').val());
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('fileupload', $('#fileupload').get(0).files[0]);

                $.ajax({
                    method: "POST",
                    url: ENDPOINT + '/store_details_order',
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
        @endsection