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
                                <h4 class="card-title">Payment List</h4>
                            </div>
                            <!-- <div class="col-md-6"> <a href="{{url('/add_payment')}}"
                                    class="btn btn-primary mb-2 float-right">Add Payment</a></div> -->
                        </div>
                       
                        
                        <div class="row">
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9 px-0">
                                        <input type="text" class="form-control ml-auto" id="dates" placeholder="select date range">
                                    </div>
                                    <div class="col-md-3 px-0">
                                        <button class="btn btn-primary search_payment_go">GO</button>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-3">
                            <input type="text" class="form-control" id="exam_search"  placeholder="Search for...">
<!-- 
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="search" id="payment_search"
                                        placeholder="Payment Details">
                                    <div class="input-group-append">
                                        <button class="search_payment_data btn btn-primary" type="button"
                                            name="button"><i class="bi bi-search"></i></button>

                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <!-- <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-cash-tab" data-toggle="tab" href="#nav-cash"
                                    role="tab" aria-controls="nav-cash" aria-selected="true">
                                 <h4 class="my-0"> <i class="bi bi-cash-stack mr-2"></i> Cash</h4>
                                </a>
                                <a class="nav-item nav-link" id="nav-bank-tab" data-toggle="tab" href="#nav-bank"
                                    role="tab" aria-controls="nav-bank" aria-selected="false"><h4 class="my-0"><i class="bi bi-bank2 mr-2"></i>Bank </h4></a>

                            </div>
                        </nav> -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active data_payment" id="nav-cash" role="tabpanel" aria-labelledby="nav-cash-tab">
                                @include('pagination_data')    
                            <!-- <div class="row my-2">
                                    {{--@if($paymentArr->payment_method="Cash")--}}
                                        <div class="col-md-3 col-sm-6">
                                            <div class="card" style="background-image: linear-gradient(230deg, #c9d32d, #bd154b);">
                                                <div class="card-body">
                                                    <h3 class="card-title text-white">Snacks Amount</h3>
                                                    <?php $total_snack = 0; ?>
                                                        @foreach($snacks as $snack)
                                                            <?php
                                                                $total_snack += $snack->menu_price*$snack->quantity;
                                                            ?>
                                                        @endforeach
                                                    <h2 class="text-white">???{{number_format(round($total_snack))}}</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="card" style="background-image: linear-gradient(230deg, #086c18, #15bd57);">
                                                <div class="card-body">
                                                    <h3 class="card-title text-white">Paid Amount</h3>
                                                    <h2 class="text-white">???{{number_format(round($total['paid']))}}</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="card" style="background-image: linear-gradient(230deg, #eab60a, #938416);">
                                                <div class="card-body">
                                                    <h3 class="card-title text-white">Remaining Amount</h3>
                                                    <h2 class="text-white">???{{number_format(round($remaingamtc['remainingamountcash']))}}
                                                    </h2>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="card" style="background-image: linear-gradient(230deg, #759bff, #843cf6);">
                                                <div class="card-body">
                                                    <h3 class="card-title text-white">Total Amount</h3>
                                                    <h2 class="text-white">??? {{$sum=$totalcash['paidcash']+$total_snack}}
                                                    </h2>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">

                                        </div>
                                    {{--@endif--}}
                                </div>
                                <div class="table-responsive">
                                    <div class="x_content">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Sr.No.
                                                    </th>
                                                    <th>
                                                    Order ID
                                                    </th>
                                                    <th>
                                                        Party Name
                                                    </th>

                                                    <th>
                                                        Amount
                                                    </th>
                                                    <th>
                                                        Payment Method
                                                    </th>

                                                    <th>
                                                        Date
                                                    </th>

                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="data_payment">
                                                
                                            
                                                
                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div> -->
                                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                            </div>
                            <!--  -->
                        <!-- <div class="tab-pane fade" id="nav-bank" role="tabpanel" aria-labelledby="nav-bank-tab">
                            <div class="row my-2">
                            @if($paymentArr->payment_method="Bank")
                            <!-- <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #086c18, #15bd57);">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Paid Amount</h3>
                                        <h2 class="text-white">???{{number_format(round($total['paid']))}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #eab60a, #938416);">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Remaining Amount</h3>
                                        <h2 class="text-white">???{{number_format(round($remaingamt['remainingamount']))}}
                                        </h2>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #759bff, #843cf6);">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Total Amount</h3>
                                        <h2 class="text-white">??? {{$sum=$total['paid']+$remaingamt['remainingamount']}}
                                        </h2>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">

                            </div> --
                            @endif
                            </div>
                            <!-- <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                  Order ID
                                                </th>
                                                <th>
                                                    Party Name
                                                </th>

                                                <th>
                                                    Amount
                                                </th>
                                                <!-- <th>
                                                    Bank Method
                                                </th> --

                                                <th>
                                                    Date
                                                </th>

                                                <th>
                                                    Action
                                                    <input type="hidden" value="0" id="page" />
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="data_payment">
                                           {{--@include('page_data')--}}

                                        </tbody>
                                    </table>
                                </div>
                            </div> -->
                            <!--  --
                        </div> -->

                    </div>
                </div>
            </div>
        </div>


        @endsection
        @section('scripts')
        <script>
        $(document).on('click', '.paymentdelete', function () {
        // alert();
        var payment_id = $(this).val();
            $.ajax({

                url: "destroy_payment",
                data: {
                    'payment_id': payment_id,
                    _token: '{{ csrf_token() }}'
                },
                type: 'post',
                success: function(response) {
                    location.reload();
                    // LoadData();
                }
            })
        });
                    // $(".paymentdelete").on('click', function() {
        // $('body').on('click', '.paymentdelete', function() {
        //     $('.paymentdelete').click(function(){
        //         alert();
        //     //debugger
        //     var payment_id = $(this).val();
        //     $.ajax({

        //         url: "destroy_payment",
        //         data: {
        //             'payment_id': payment_id,
        //             _token: '{{ csrf_token() }}'
        //         },
        //         type: 'post',
        //         success: function(response) {
        //             location.reload();
        //             // LoadData();
        //         }
        //     })
        // })
        </script>
        <script>
        // $('#dates').datepicker({
        //     format: 'mm/dd/yyyy',
        //     startDate: '-3d'
        // });
        </script>
        <script>
        var ENDPOINT = "{{ url('/') }}";
        $('#dates').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('#dates').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' To ' + picker.endDate.format('YYYY-MM-DD'));
            $('#page').val('0');
            $("#data-wrapper").html('');
        });

        $('#dates').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            $('#page').val('0');
            $("#data-wrapper").html('');
        });

        // $(".search_payment_data").on('click', function() {
        $('body').on('click', '.search_payment_data', function() {
         
            // infinteLoadMore();
        });
       
        $(function() {
            var dateFormat = "yy-mm-dd",
                from = $("#from")
                .datepicker({
                    dateFormat: 'yy-mm-dd',
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2
                })
                .on("change", function() {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#to").datepicker({
                    dateFormat: 'yy-mm-dd',
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2
                })
                .on("change", function() {
                    from.datepicker("option", "maxDate", getDate(this));
                });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });

        infinteLoadMore();

        function infinteLoadMore() {

            var page = parseInt($("#page").val());
            // var date_range=$('#dates').val();

            var payment_search = ($("#payment_search").val());
            var dates = ($("#dates").val());
            var from_date = '';
            var to_date = '';
            if (dates != '') {
                dates = dates.split('To');
                from_date = dates[0];
                to_date = dates[1];
            }

            $.ajax({
                    url: "get_payment",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        page: page,
                        payment_search: payment_search,
                        dates: dates,
                        from_date: from_date,
                        to_date: to_date
                    },
                    dataType: "json",
                    type: "post",

                })
                .done(function(response) {

                    if (response.length == 0) {
                        $('.auto-load').html("We don't have more data to display :(");
                        return;
                    }
                    if (response.output != '') {

                        status == "inactive";
                    }
                    $('.auto-load').hide();
                    // $("#payment").html(response.output);
                    $("#payment").append(response.output);
                    // $("#total_amount").html(response.total_amount);
                    // $('#page').val(page+parseInt(response.count));
                    console.log(page);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }
        </script>
        <script>
     $(document).ready(function(){
        var ENDPOINT = "{{ url('/') }}";
      function fetch_data(search="",dates="",from_date="",to_date="") {
        $.ajax({
           url:ENDPOINT+"/exam_manage_ajax?search="+search+"&dates="+dates+"&from_date="+from_date+"&to_date="+to_date,
           success:function(data){
            console.log(data);
            $('.data_payment').html(data);
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
        @endsection