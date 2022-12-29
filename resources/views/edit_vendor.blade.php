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
                                    <h4 class="card-title">Add Vendor Details</h4>
                                   
                                    <form class="forms-sample">


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Name </label>
                                                    <input type="hidden" id="vendor_id" class="form-control" value="{{$vendor_editArr[0]->vendor_id}}">
                                                    <input type="text" class="form-control" id="vendor_name" placeholder="Enter Name" value="{{$vendor_editArr[0]->vendor_name}}">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Mobile Number</label>
                                                    <input type="tel" class="form-control" id="vendor_number" placeholder="Enter Mobile Number" value="{{$vendor_editArr[0]->vendor_contactnum}}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Whatsapp No.</label>
                                                    <input type="text" class="form-control" id="vendor_whatsapp" placeholder="Enter Address" value="{{$vendor_editArr[0]->vendor_whatsappnum}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Email-ID</label>
                                                    <input type="email" class="form-control" id="vendor_email" placeholder="Enter Email-ID" value="{{$vendor_editArr[0]->vendor_emailid}}">
                                                </div>
                                            </div>

                                        </div>
                                        
                                        <!-- <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Pin Code</label>
                                                    <input type="text" class="form-control" id="customer_pin" placeholder="Enter Pin Code" value="{{--$vendor_editArr[0]->customer_pincode--}}">
                                                </div>
                                            </div>
                                        </div> -->

                                        <button type="button" class="btn btn-primary mr-2 editbtncustomer">Update</button>
                                        @csrf
                                    </form>
                                    <div id="msg"></div>
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
           
//on create click fetch selected products & store details in database
var ENDPOINT = "{{ url('/') }}";
$('body').on('click', '.editbtncustomer', function() {
    var vendor_id = $('#vendor_id').val();
    var vendor_name = $('#vendor_name').val();
    var vendor_number = $('#vendor_number').val();
    var vendor_email = $('#vendor_email').val();
    var vendor_whatsapp = $('#vendor_whatsapp').val();
    // var customer_pin = $('#customer_pin').val();
   
    $.ajax({
        url: ENDPOINT + "/updatevendor",
        data: {
            "_token": "{{ csrf_token() }}",
            vendor_id: vendor_id,
            vendor_name: vendor_name,
            vendor_number: vendor_number,
            vendor_email: vendor_email,
            // customer_address: customer_address,
            vendor_whatsapp:vendor_whatsapp
        },
        type: 'post',
        dataType: "json",
        beforeSend: function() {
                        $('.editbtncustomer').addClass('disabled');
                    },

        success: function(response) {

            if (response.code=="404") {
              ;
                 $('.editbtncustomer').removeClass('disabled').text('Update');
                 $('#msg').html('<div class="alert alert-danger alert-dismissible fade show" id="smsg" role="alert">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $('.editbtncustomer').removeClass('disabled').text('Update');
                $('#msg').html('<div class="alert alert-success alert-dismissible fade show" id="smsg" role="alert">Vendor Updated successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                window.location.href=ENDPOINT +"/vendor_list";
            }
        }
    })
});
/*For check/uncheck all checkbox */

       </script> 
        @endsection