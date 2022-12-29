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
                                    <h4 class="card-title">Add Payment</h4>
                                    <!-- <p class="card-description">
                                        Basic form elements
                                    </p> -->
                                    <form class="forms-sample">
                                        <div class="form-group">
                                         
                                        <label for="exampleSelectGender">Customer Name </label>
                                            <select class="js-example-basic-single w-100" id="cust_name">
                                                @foreach ($customerArr as $cust)
                                                <option value="{{$cust->customer_name}}">{{$cust->customer_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="paymenttype">Payment Type </label>
                                            <select class="form-control form-select-lg" id="paymenttype">
                                                <option value="Cash">Cash</option>
                                                <option value="Credit">Credit</option>
                                                <option value="Bank">Bank</option>

                                            </select>
                                        </div>
                                      

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="remainamount">Remaining Amount</label>
                                                    <input type="text" class="form-control" id="remainamount"
                                                        placeholder="Enter Amount">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="amountpaid">Amount Paid</label>
                                                    <input type="text" class="form-control" id="amountpaid"
                                                        placeholder="Enter Amount Paid">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="balanceamount">Balance Due</label>
                                                    <input type="text" class="form-control" id="balanceamount"
                                                        placeholder="Enter Balance Due">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="paymentstatus">Payment Status </label>
                                            <select class="form-control form-select-lg" id="paymentstatus">
                                                <option value="Process">Process</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Completed">Completed</option>

                                            </select>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="paymentdate">Payment Date</label>
                                            <input type="date" class="form-control" id="paymentdate" placeholder="Description">
                                        </div>


                                        <button type="button" class="btn btn-primary mr-2 addpayment">Submit</button>

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
           
//add payment
$('body').on('click', '.addpayment', function() {
    var cust_name = $('#cust_name').val();
    var paymenttype = $('#paymenttype').val();
    var remainamount = $('#remainamount').val();
    var amountpaid = $('#amountpaid').val();
    var balanceamount = $('#balanceamount').val();
    var paymentstatus = $('#paymentstatus').val();
    var paymentdate = $('#paymentdate').val();
    var ENDPOINT = "{{ url('/') }}";
    $.ajax({
        url: ENDPOINT +"/paymentstore",
        data: {
            "_token": "{{ csrf_token() }}",
            cust_name: cust_name,
            paymenttype: paymenttype,
            remainamount: remainamount,
            amountpaid: amountpaid,
            balanceamount:balanceamount,
            paymentstatus:paymentstatus,
            paymentdate:paymentdate
        },
        type: 'post',
        dataType: "json",
        beforeSend: function() {
                        $('.addpayment').addClass('disabled');
                    },

        success: function(response) {

            if (response.code=="404") {
              ;
                 $('.addpayment').removeClass('disabled').text('Submit');
                 $('#msg').html('<div class="alert alert-danger alert-dismissible fade show" id="smsg" role="alert">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $('.addpayment').removeClass('disabled').text('Submit');
                $('#msg').html('<div class="alert alert-success alert-dismissible fade show" id="smsg" role="alert">Payment Data added successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                window.location.href="payment";
            }
        }
    })
});

       </script> 
        @endsection