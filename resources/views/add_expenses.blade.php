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
                                    <h4 class="card-title">Add Expenses</h4>
                                    <!-- <p class="card-description">
                                        Basic form elements
                                    </p> -->
                                    <form class="forms-sample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="expenses_category">Expance Title </label>
                                                    <!-- <select class="form-control" id="expenses_category">
                                                        <option value="vendor_pay">Vendor Payment</option>
                                                        <option value="Credit">Credit</option>
                                                        <option value="Bank">Bank</option>
                                                        <option value="Cheque">Cheque</option>

                                                    </select> -->
                                                    <input type="text" class="form-control" id="expenses_title" placeholder="Enter Expance Title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Amount</label>
                                                    <input type="text" class="form-control" id="expenses_amount" placeholder="Enter Amount">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="expenses_payment">Payment Type </label>
                                            <select class="form-control" id="expenses_payment">
                                                <option value="Cash">Cash</option>
                                                <option value="Credit">Credit</option>
                                                <option value="Bank">Bank</option>
                                                <option value="Cheque">Cheque</option>

                                            </select>
                                        </div>
                                     
                                        <div class="form-group">
                                            <label for="expenses_date">Date</label>
                                            <input type="date" class="form-control" id="expenses_date" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="expenses_invoice">Expence Invoice</label>
                                            <input type="file" class="form-control" id="expenses_invoice" >
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Note</label>
                                                <input type="text" class="form-control" id="expenses_note" placeholder="Enter Note">
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-primary mr-2 btnexpenses">Submit</button>

                                    </form>
                                </div>
                                <div id="msg"></div>
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
// $('body').on('click', '.btnexpenses', function() {
//     var expenses_title = $('#expenses_title').val();
//     var expenses_amount = $('#expenses_amount').val();
//     var expenses_payment = $('#expenses_payment').val();
//     var expenses_date = $('#expenses_date').val();
//     var expenses_category = $('#expenses_category').val();
//     // var expenses_invoice = $('#expenses_invoice').val();
//     // var expenses_invoice = $('#expenses_invoice').get(0).files[0];
//     var expenses_invoice =  $('#expenses_invoice').prop('files')[0]; ;
//     console.log(expenses_invoice);
//     var ENDPOINT = "{{ url('/') }}";
//     $.ajax({
//         url: ENDPOINT +"/expensesstore",
//         data: {
//             "_token": "{{ csrf_token() }}",
//             expenses_title: expenses_title,
//             expenses_amount: expenses_amount,
//             expenses_payment: expenses_payment,
//             expenses_date: expenses_date,
//             expenses_category: expenses_category,
//             expenses_invoice: expenses_invoice
//           },
//         type: 'post',
//         dataType: "json",
//         processData: false,
//         contentType: false,
//         contentType: 'multipart/form-data',
//         cache: false,
//         beforeSend: function() {
//                         $('.btnexpenses').addClass('disabled');
//                     },

//         success: function(response) {

//             if (response.code=="404") {
//               ;
//                  $('.btnexpenses').removeClass('disabled').text('Submit');
//                  $('#msg').html('<div class="alert alert-danger alert-dismissible fade show" id="smsg" role="alert">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
//             } else {
//                 $('.btnexpenses').removeClass('disabled').text('Submit');
//                 $('#msg').html('<div class="alert alert-success alert-dismissible fade show" id="smsg" role="alert">Expenses Data added successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
//                 window.location.href="expense";
//             }
//         }
//     })
// });
$('body').on('click', '.btnexpenses', function(e) {
        e.preventDefault();
        var formData = new FormData();

        var expenses_title = $('#expenses_title').val();
        var expenses_amount = $('#expenses_amount').val();
        var expenses_payment = $('#expenses_payment').val();
        var expenses_date = $('#expenses_date').val();
        // var expenses_category = $('#expenses_category').val();
        var expenses_note = $('#expenses_note').val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        var expenses_invoice = $('#expenses_invoice').prop('files')[0];   

        formData.append('expenses_invoice', expenses_invoice);
        formData.append('expenses_title', expenses_title);
        formData.append('expenses_amount', expenses_amount);
        formData.append('expenses_payment', expenses_payment);
        formData.append('expenses_date', expenses_date);
        formData.append('expenses_note', expenses_note);
        formData.append('_token', _token);
        var ENDPOINT = "{{ url('/') }}";
        $.ajax({
            url: ENDPOINT +"/expensesstore",
            type: 'POST',
            contentType: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: (response) => {
                // success
                // console.log(response);
                if (response.code=="404") {
             
                 $('.btnexpenses').removeClass('disabled').text('Submit');
                 $('#msg').html('<div class="alert alert-danger alert-dismissible fade show" id="smsg" role="alert">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $('.btnexpenses').removeClass('disabled').text('Submit');
                $('#msg').html('<div class="alert alert-success alert-dismissible fade show" id="smsg" role="alert">Expence added successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                window.location.href="expense";
            }
            },
            error: (response) => {
                console.log(response);
            }
        });
    });

       </script> 
        @endsection