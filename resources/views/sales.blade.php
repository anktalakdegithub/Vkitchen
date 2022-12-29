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
                                <h4 class="card-title">Sales Report</h4>
                            </div>
                            <div class="col-md-6"> 
                                <!-- <a href="add_cash.php"
                                    class="btn btn-primary mb-2 float-right">Adjust Cash</a> -->
                                </div>
                        </div>
                        <div class="row my-2">
                            <!-- <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #759bff, #843cf6);">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Total Orders</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #fc5286, #fbaaa2);">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">cancelled Orders</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #ffc480, #ff763b);">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Total Earnings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                          
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="fromDate"
                                                placeholder="Enter From Date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="toDate"
                                                placeholder="Enter To Date">
                                        </div>
                                    </div> -->
                                    <div class="col-md-12">
                                        <input type="text" class="form-control ml-auto" id="dates" placeholder="select date range">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search"
                                            aria-label="Search"  id="exam_search">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary search_payment_go" type="button">Search</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped">
                            <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Snacks
                                        </th>
                                        <th>
                                            Vendor Name
                                        </th>
                                       
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Vendor Commission
                                        </th> 
                                        <th>
                                            Total Sale
                                        </th>
                                        <th>
                                            Total amount
                                        </th>
                                        <th>
                                            Total Commission
                                        </th>
                                        <!-- <th>
                                            Quantity
                                        </th> -->
                                        
                                        <th>
                                            Date
                                            <input type="hidden" value="0" id="page" />
                                        </th>
                                    </tr>
                                </thead >
                                <tbody id="data_order" class="data_order">
                                <?php 
                                    $i=1;
                                    $quantity=0;
                                    $amount=0;
                                    $price=0;
                                ?>
                                @foreach ($addorderArr as $expenses) 
                                    <tr>
                                        <td>
                                            {{$i++}}
                                        </td>

                                        <td>
                                            {{$expenses->menu_name}}
                                        </td> 
                                        <td>
                                            {{$expenses->vendor_name}}
                                        </td>
                                        

                                        <td>₹{{$expenses->menu_price}}</td>
                                        <td>₹{{$expenses->vendor_commission}}</td>
                                        <td>
                                        <?php $quantity+=$expenses->quantity; ?>    
                                            {{$expenses->quantity}}</td>
                                        <td>
                                        <?php $price+=($expenses->quantity)*($expenses->menu_price); ?>          
                                        ₹{{($expenses->quantity)*($expenses->menu_price)}}</td>
                                        <td>
                                        <?php $amount+=($expenses->quantity)*($expenses->vendor_commission); ?>
                                            ₹{{($expenses->quantity)*($expenses->vendor_commission)}}</td>
                                        <!-- <td>₹ <input type="number" class="p_price" name="snack_price" readonly value="{{$expenses->menu_price}}"></td> -->
                                        
                                        <!-- <td><input type="number" class="total_price" name="total_price" readonly value="{{$expenses->menu_price}}" id="total_price_{{$expenses->menu_id}}"></td> -->
                                        <td>
                                        {{$expenses->order_date}}
                                        </td>
                                    </tr>
                                    
                                @endforeach
                                    <tr>
                                        <td colspan="5">Total Data</td>
                                        <td >{{$quantity}}</td>
                                        <td >₹{{$price}}</td>
                                        <td >₹{{$amount}}</td>
                                        <td ></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div  class="card-footer clearfix" data-page="{{$addorderArr->currentPage()}}" id="event_pagination">
                                {{ $addorderArr->links() }}
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are Sure You Want Delete?
                        </h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
   @endsection
   @section('scripts')
        <script>
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
        $(document).ready(function(){
            var ENDPOINT = "{{ url('/') }}";
            function fetch_data(search="",dates="",from_date="",to_date="") {
                $.ajax({
                    url:ENDPOINT+"/salesreport_list_ajax?search="+search+"&dates="+dates+"&from_date="+from_date+"&to_date="+to_date,
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
 @endsection