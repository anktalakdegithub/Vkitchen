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
                                                    <input type="text" class="form-control" id="vendor_name" placeholder="Enter Name">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Mobile Number</label>
                                                    <input type="tel" class="form-control" id="vendor_number" placeholder="Enter Mobile Number">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Whatsapp No</label>
                                                    <input type="text" class="form-control" id="whatsapp_no" placeholder="Enter Whatsapp No.">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Email-ID</label>
                                                    <input type="email" class="form-control" id="vendor_email" placeholder="Enter Email-ID">
                                                </div>
                                            </div>

                                        </div>
                                      
                                        <!-- <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Pin Code</label>
                                                    <input type="text" class="form-control" id="customer_pin" placeholder="Enter Pin Code">
                                                </div>
                                            </div>
                                        </div> -->

                                        <button type="button" class="btn btn-primary mr-2 btncustomer">Submit</button>
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
$('body').on('click', '.btncustomer', function() {
    var vendor_name = $('#vendor_name').val();
    var vendor_number = $('#vendor_number').val();
    var vendor_email = $('#vendor_email').val();
    var whatsapp_no = $('#whatsapp_no').val();
    // var customer_pin = $('#customer_pin').val();
   
    $.ajax({
        url: "addvendorstore",
        data: {
            "_token": "{{ csrf_token() }}",
            vendor_name: vendor_name,
            vendor_number: vendor_number,
            vendor_email: vendor_email,
            // customer_address: customer_address,
            whatsapp_no:whatsapp_no
        },
        type: 'post',
        dataType: "json",
        beforeSend: function() {
                        $('.btncustomer').addClass('disabled');
                    },

        success: function(response) {

            if (response.code=="404") {
            //   ;
                 $('.btncustomer').removeClass('disabled').text('Submit');
                 $('#msg').html('<div class="alert alert-danger alert-dismissible fade show" id="smsg" role="alert">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $('.btncustomer').removeClass('disabled').text('Submit');
                $('#msg').html('<div class="alert alert-success alert-dismissible fade show" id="smsg" role="alert">Vendor added successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                window.location.href="vendor_list";
            }
        }
    })
});
/*For check/uncheck all checkbox */

       </script> 
        @endsection