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
                                    <h4 class="card-title">Add Customer Details</h4>
                                   
                                    <form class="forms-sample">


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Name </label>
                                                    <input type="hidden" id="customer_id" class="form-control" value="{{$customer_editArr[0]->customer_id}}">
                                                    <input type="text" class="form-control" id="customer_name" placeholder="Enter Name" value="{{$customer_editArr[0]->customer_name}}">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Mobile Number</label>
                                                    <input type="tel" class="form-control" id="customer_number" placeholder="Enter Mobile Number" value="{{$customer_editArr[0]->customer_contactnum}}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Email-ID</label>
                                                    <input type="email" class="form-control" id="customer_email" placeholder="Enter Email-ID" value="{{$customer_editArr[0]->customer_emailid}}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Address</label>
                                                    <input type="text" class="form-control" id="customer_address" placeholder="Enter Address" value="{{$customer_editArr[0]->customer_address}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Pin Code</label>
                                                    <input type="text" class="form-control" id="customer_pin" placeholder="Enter Pin Code" value="{{$customer_editArr[0]->customer_pincode}}">
                                                </div>
                                            </div>
                                        </div>

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
    var customer_id = $('#customer_id').val();
    var customer_name = $('#customer_name').val();
    var customer_number = $('#customer_number').val();
    var customer_email = $('#customer_email').val();
    var customer_address = $('#customer_address').val();
    var customer_pin = $('#customer_pin').val();
   
    $.ajax({
        url: ENDPOINT + "/updatecustomer",
        data: {
            "_token": "{{ csrf_token() }}",
            customer_id: customer_id,
            customer_name: customer_name,
            customer_number: customer_number,
            customer_email: customer_email,
            customer_address: customer_address,
            customer_pin:customer_pin
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
                $('#msg').html('<div class="alert alert-success alert-dismissible fade show" id="smsg" role="alert">Customer Updated successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                window.location.href=ENDPOINT +"/customer";
            }
        }
    })
});
/*For check/uncheck all checkbox */

       </script> 
        @endsection