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
                        <div class="row my-2">
                            <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #086c18, #15bd57);">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Paid Amount</h3>
                                        <h2 class="text-white">₹{{number_format(round($total['paid']))}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #eab60a, #938416);">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Remaining Amount</h3>
                                        <h2 class="text-white">₹{{number_format(round($remaingamt['remainingamount']))}}
                                        </h2>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #759bff, #843cf6);">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Total Amount</h3>
                                        <h2 class="text-white">₹ {{$sum=$total['paid']+$remaingamt['remainingamount']}}
                                        </h2>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-9">
                                    <input type="text" class="form-control ml-auto" id="dates" placeholder="select date range">
                                    </div>
                                    <div class="col-md-3">
                                    <button class="btn btn-primary search_payment_go">GO</button>
                                    </div>
                                </div>
                               
                              
                            </div>
                            <div class="col-md-3">

                                <div class="input-group ">
                                    <input type="text" class="form-control" name="search" id="payment_search"
                                        placeholder="Payment Details">
                                    <div class="input-group-append">
                                        <button class="search_payment_data btn btn-primary" type="button"
                                            name="button"><i class="bi bi-search"></i></button>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Party Name
                                        </th>

                                        <th>
                                            Remaining Amount
                                        </th>
                                        <th>
                                            Paid Amount
                                        </th>
                                        <th>
                                            Payment Status
                                        </th>
                                        <th>
                                            Date
                                        </th>

                                        <th>
                                            Action
                                            <input type="hidden" value="0" id="page" />
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="payment">

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
        $('body').on('click', '.paymentdelete', function() {
            //debugger
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
        })
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
            // alert();
            $("#payment").html('');
            $('#page').val("0");
            status == "inactive";
            infinteLoadMore();
        });
        $(".search_payment_go").on('click', function() {
            // alert();
            // $("#totalpayhide").css("display", "none");
            $("#payment").html('');
            $('#page').val("0");
            status == "inactive";
            infinteLoadMore();
        });
        $(function() {
            var dateFormat = "mm/dd/yy",
                from = $("#from")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2
                })
                .on("change", function() {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#to").datepicker({
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
                        dates:dates,
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
        @endsection