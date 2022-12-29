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
                                <h4 class="card-title">Order List</h4>
                            </div>
                            <div class="col-md-6">
                                <!-- <a href="add_cash.php"
                                    class="btn btn-primary mb-2 float-right">Adjust Cash</a> -->
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-5">

                            </div>
                            <div class="col-md-4">

                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" class="form-control ml-auto" id="dates"
                                            placeholder="select date range">
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary search_payment_go">GO</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <!-- <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search"
                                            aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary" type="button">Search</button>
                                        </div>
                                    </div>
                                </div> -->
                                <input type="text" class="form-control" id="exam_search"  placeholder="Search for...">
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                           Order ID
                                        </th>
                                        <th>
                                            Customer Name
                                        </th>
                                        <th>
                                            Contact Number
                                        </th>
                                        <th>
                                            Customer Address
                                        </th>
                                        <!-- <th>
                                            Tax
                                        </th> -->
                                        <th>
                                            Total
                                        </th>
                                        <th>
                                            Remaining Amount
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>Date</th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="data_order"> 
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection
        @section('scripts')
        <script>
        $('body').on('click', '.orderdelete', function() {
            //debugger
            var products_id = $(this).val();
            $.ajax({

                url: "destroy_po",
                data: {
                    'products_id': products_id,
                    _token: '{{ csrf_token() }}'
                },
                type: 'post',
                success: function(response) {
                    location.reload();
                    // LoadData();
                }
            })
        })
        </script>
        <script>
            $(document).ready(function(){
        var ENDPOINT = "{{ url('/') }}";
      function fetch_data(search="",dates="",from_date="",to_date="") {
        $.ajax({
           url:ENDPOINT+"/order_list_ajax?search="+search+"&dates="+dates+"&from_date="+from_date+"&to_date="+to_date,
           success:function(data){
            $('.data_order').html(data);
           }
        })
       }
   
       $(document).on('keyup', '#exam_search', function(){
          var search = $('#exam_search').val();
          var dates = ($("#dates").val());
          var from_date = '';
            var to_date = '';
            if (dates != '') {
                dates = dates.split('To');
                from_date = dates[0];
                to_date = dates[1];
            }
          fetch_data(search,dates,from_date,to_date);
       });
       $(".search_payment_go").on('click', function() {
        //    alert();
        var dates = ($("#dates").val());
        var search = $('#exam_search').val();
            var from_date = '';
            var to_date = '';
            if (dates != '') {
                dates = dates.split('To');
                from_date = dates[0];
                to_date = dates[1];
            }
            fetch_data(search,dates,from_date,to_date);
        });
   
      });
        </script>
        <script>
        $('body').on('click', '.payddetails', function() {
            //debugger
            var orderid =  $(this).val();
            // var orderid =  $("#orderid").val();
            var pay =  $("#pay_"+ orderid).val();
            var paystatus = $('#paystatus_'+ orderid).val();
            var remainamount = $('#remainamount_'+ orderid).val();
            var paidamount = $('#paidamount_'+ orderid).val();
            var paymethod = $('#paymethod_'+ orderid).val();
        //    alert(paidamount);
            // var custid = $(this).attr('data_cust');
            var custid = $("#custid_"+ orderid).val();
            $.ajax({

                url: "order_payment",
                data: {
                    'pay': pay,
                    'orderid': orderid,
                    'custid': custid,
                    'paystatus': paystatus,
                    'remainamount': remainamount,
                    'paidamount': paidamount,
                    'paymethod': paymethod,
                    _token: '{{ csrf_token() }}'
                },
                type: 'post',
                dataType: "json",
                beforeSend: function() {
                        $('.payddetails').addClass('disabled');
                    },

                success: function(response) {
                    // alert();
                    if (response.code=="404") {
              
                 $('.payddetails').removeClass('disabled').text('Submit');
                 $('#msglist').html('<div class="alert alert-danger alert-dismissible fade show" id="smsg" role="alert">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $('.payddetails').removeClass('disabled').text('Submit');
                $('#msglist').html('<div class="alert alert-success alert-dismissible fade show" id="smsg" role="alert">Data added successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                // window.location.href="customer";
            }
                }
            })
        })
        </script>
        @endsection