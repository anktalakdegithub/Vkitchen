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
                                    <h4 class="card-title">Update Payment</h4>
                                    <form class="forms-sample">
                                    <input type="hidden" id="payment_id" class="form-control" value="{{$editpaymentArr[0]->payment_id}}">
                                                   
                                        <div class="form-group">
                                         
                                        <label for="exampleSelectGender">Customer Name </label>
                                            <select class="js-example-basic-single w-100" id="cust_name">
                                            <option value="" selected="selected">Select Customer </option>
                                                @foreach ($customerArr as $cust)
                                                <option value="{{ $cust->customer_name }}" <?php if($editpaymentArr[0]->customer_name==$cust->customer_name) { echo "selected"; } ?>>{{ $cust->customer_name }}
                            </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="paymenttype">Payment Type </label>
                                            <select class="form-control form-select-lg" id="paymenttype">
                                            <option value="" selected="selected">Select Payment Type </option>
                                            <option value="{{ $editpaymentArr[0]->payment_type }}" <?php if($editpaymentArr[0]->payment_type==$editpaymentArr[0]->payment_type) { echo "selected"; } ?>>{{ $editpaymentArr[0]->payment_type }}</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Credit">Credit</option>
                                                <option value="Bank">Bank</option>

                                            </select>
                                        </div>
                                      

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="remainamount">Remaining Amount</label>
                                                    <input type="text" class="form-control" id="remainamount" value="{{$editpaymentArr[0]->remaining_amount}}" placeholder="Enter Amount">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="amountpaid">Amount Paid</label>
                                                    <input type="text" class="form-control" id="amountpaid" value="{{$editpaymentArr[0]->amount_paid}}" placeholder="Enter Amount Paid">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="balanceamount">Balance Due</label>
                                                    <input type="text" class="form-control" id="balanceamount" value="{{$editpaymentArr[0]->balance_due}}" placeholder="Enter Balance Due">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="paymentstatus">Payment Status </label>
                                            <select class="form-control form-select-lg" id="paymentstatus">
                                            <option value="" selected="selected">Select Payment Status </option>
                                            <option value="{{ $editpaymentArr[0]->payment_status}}" <?php if($editpaymentArr[0]->payment_status==$editpaymentArr[0]->payment_status) { echo "selected"; } ?>>{{ $editpaymentArr[0]->payment_status }}</option>
                                              <option value="Process">Process</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Completed">Completed</option>

                                            </select>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="paymentdate">Payment Date</label>
                                            <input type="date" class="form-control" id="paymentdate" value="{{$editpaymentArr[0]->payment_date}}" placeholder="Description">
                                        </div>


                                        <button type="button" class="btn btn-primary mr-2 editpayment">Update</button>

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
           
//on create click fetch selected products & store details in database
var ENDPOINT = "{{ url('/') }}";
$('body').on('click', '.editpayment', function() {
    var payment_id = $('#payment_id').val();
    var cust_name = $('#cust_name').val();
    var paymenttype = $('#paymenttype').val();
    var remainamount = $('#remainamount').val();
    var amountpaid = $('#amountpaid').val();
    var balanceamount = $('#balanceamount').val();
    var paymentstatus = $('#paymentstatus').val();
    var paymentdate = $('#paymentdate').val();
   
    $.ajax({
        url: ENDPOINT + "/updatepayment",
        data: {
            "_token": "{{ csrf_token() }}",
            payment_id: payment_id,
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
                        $('.editpayment').addClass('disabled');
                    },

        success: function(response) {

            if (response.code=="404") {
              ;
                 $('.editpayment').removeClass('disabled').text('Update');
                 $('#msg').html('<div class="alert alert-danger alert-dismissible fade show" id="smsg" role="alert">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $('.editpayment').removeClass('disabled').text('Update');
                $('#msg').html('<div class="alert alert-success alert-dismissible fade show" id="smsg" role="alert">Payment Updated successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                window.location.href=ENDPOINT +"/payment";
            }
        }
    })
});
/*For check/uncheck all checkbox */

       </script> 
        @endsection