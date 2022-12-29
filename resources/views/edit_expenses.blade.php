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
                                    <h4 class="card-title">Update Expenses</h4>
                                    <!-- <p class="card-description">
                                        Basic form elements
                                    </p> -->
                                    <form class="forms-sample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="expenses_category">Expance Title </label>
                                                    <!-- <select class="form-control" id="expenses_category">
                                                        <option value="Cash">Cash</option>
                                                        <option value="Credit">Credit</option>
                                                        <option value="Bank">Bank</option>
                                                        <option value="Cheque">Cheque</option>

                                                    </select> -->
                                                    <input type="text" class="form-control" id="expenses_title" value="{{$expenses_editArr[0]->expense_Name}}" placeholder="Enter Expance Title">

                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" id="expenses_id" class="form-control" value="{{$expenses_editArr[0]->expenses_id}}">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Title</label>
                                                    <input type="text" class="form-control" id="expenses_title" value="{{$expenses_editArr[0]->expense_Name}}" placeholder="Enter Title">
                                                </div>
                                            </div>
                                          
                                        </div> -->
                                        <div class="row">
                                            <div class="col-md-12">
                                            <input type="hidden" id="expenses_id" class="form-control" value="{{$expenses_editArr[0]->expenses_id}}">

                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Amount</label>
                                                    <input type="text" class="form-control" id="expenses_amount" value="{{$expenses_editArr[0]->expenses_amount}}" placeholder="Enter Amount">
                                                </div>
                                            </div>
                                          
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleSelectGender">Payment Type </label>
                                            <select class="form-control" id="expenses_payment">
                                                <option value="Cash">Cash</option>
                                                <option value="Credit">Credit</option>
                                                <option value="Bank">Bank</option>
                                                <option value="Cheque">Cheque</option>

                                            </select>
                                        </div>
                        
                                        
                                     
                                     
                                        <div class="form-group">
                                            <label for="exampleInputName1">Date</label>
                                            <input type="date" class="form-control" id="expenses_date" value="{{$expenses_editArr[0]->expense_date}}" placeholder="Description">
                                        </div>
                                        <div class="form-group">
                                            <label for="expenses_invoice">Expence Invoice</label>
                                            <img src="{{url('expence/'.$expenses_editArr[0]->invoice)}}" alt="" style="width: 100px;" height="145px" class="img-fluid imagecart">
                                            <input type="file" class="form-control" id="expenses_invoice" >
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Note</label>
                                                <input type="text" class="form-control" id="expenses_note" value="{{$expenses_editArr[0]->category}}"  placeholder="Enter Note">
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-primary mr-2 editexpense">Update</button>

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
           
//on create click fetch selected products & store details in database
var ENDPOINT = "{{ url('/') }}";
// $('body').on('click', '.editexpense', function() {
//     var expenses_id = $('#expenses_id').val();
//     var expenses_title = $('#expenses_title').val();
//     var expenses_amount = $('#expenses_amount').val();
//     var expenses_payment = $('#expenses_payment').val();
//     var expenses_date = $('#expenses_date').val();
   
   
//     $.ajax({
//         url: ENDPOINT + "/updateexpenses",
//         data: {
//             "_token": "{{ csrf_token() }}",
//             expenses_id: expenses_id,
//             expenses_title: expenses_title,
//             expenses_amount: expenses_amount,
//             expenses_payment: expenses_payment,
//             expenses_date: expenses_date
//         },
//         type: 'post',
//         dataType: "json",
//         beforeSend: function() {
//                         $('.editexpense').addClass('disabled');
//                     },

//         success: function(response) {

//             if (response.code=="404") {
//               ;
//                  $('.editexpense').removeClass('disabled').text('Update');
//                  $('#msg').html('<div class="alert alert-danger alert-dismissible fade show" id="smsg" role="alert">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
//             } else {
//                 $('.editpayment').removeClass('disabled').text('Update');
//                 $('#msg').html('<div class="alert alert-success alert-dismissible fade show" id="smsg" role="alert">Expenses Updated successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
//                 window.location.href=ENDPOINT +"/expense";
//             }
//         }
//     })
// });

    $('body').on('click', '.editexpense', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var expenses_id = $('#expenses_id').val();
        var expenses_title = $('#expenses_title').val();
        var expenses_amount = $('#expenses_amount').val();
        var expenses_payment = $('#expenses_payment').val();
        var expenses_date = $('#expenses_date').val();
        var expenses_note = $('#expenses_note').val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        var expenses_invoice = $('#expenses_invoice').prop('files')[0];   

        formData.append('expenses_id', expenses_id);
        formData.append('expenses_invoice', expenses_invoice);
        formData.append('expenses_title', expenses_title);
        formData.append('expenses_amount', expenses_amount);
        formData.append('expenses_payment', expenses_payment);
        formData.append('expenses_date', expenses_date);
        formData.append('expenses_note', expenses_note);
        formData.append('_token', _token);
        var ENDPOINT = "{{ url('/') }}";
        $.ajax({
            url: ENDPOINT +"/updateexpenses",
            type: 'POST',
            contentType: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: (response) => {
                if (response.code=="404") {              
                    $('.editexpense').removeClass('disabled').text('Update');
                    $('#msg').html('<div class="alert alert-danger alert-dismissible fade show" id="smsg" role="alert">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                } else {
                    $('.editpayment').removeClass('disabled').text('Update');
                    $('#msg').html('<div class="alert alert-success alert-dismissible fade show" id="smsg" role="alert">Expenses Updated successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    window.location.href=ENDPOINT +"/expense";
                }
            },
            error: (response) => {
                console.log(response);
            }
        });
    });

/*For check/uncheck all checkbox */

       </script> 
        @endsection