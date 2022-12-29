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
                                <h4 class="card-title">Report Details</h4>
                            </div>
                            <!-- <div class="col-md-6"> <a href="add_bank.php" class="btn btn-primary mb-2 float-right">Add
                                    Bank Details</a></div> -->
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
                                            ID
                                        </th>
                                        <th>
                                            Menu Name
                                        </th> 
                                        <th>
                                            Vendor Name
                                        </th>
                                        <th>
                                            Menu Type
                                        </th>
                                        <th>
                                            Order Quantity
                                        </th>
                                        <th>
                                            Order Price
                                        </th>
                                        <th>
                                            Vendor Commission
                                        </th>
                                        <th>
                                            Total Commission
                                        </th>
                                        <th>
                                            Total Price
                                        </th>
<th>Date</th>
                                        <!-- <th>
                                            Action
                                        </th> -->
                                    </tr>
                                </thead>
                                <tbody class="data_order">
                                    <?php
                                      $quantity=0;
                                      $amount=0;
                                      $price=0;
                                      $commission=0;
                                    ?>
                                @if(!empty($addorderArr) && $addorderArr->count())
                                    @foreach($addorderArr as $order)
                                    <tr>
                                        <td>
                                            {{$order->product_id}}
                                        </td>
                                        <td>
                                            {{$order->menu_name}}
                                        </td>
                                        <td>
                                            {{$order->vendor_name}}
                                        </td>
                                        <td>            
                                            {{$order->menu_type}}
                                        </td>

                                        <td>
                                            <?php $quantity+=$order->order_quantity; ?>
                                            {{$order->order_quantity}}    
                                        </td>
                                        <td>
                                            <?php $price+=$order->order_price; ?>
                                            {{$order->order_price}}    
                                        </td>
                                        <td>
                                            {{$order->vendor_commission}}    
                                        </td>
                                        <td>
                                        <?php $commission+=$order->order_quantity * $order->vendor_commission; ?>
                                            {{$order->order_quantity * $order->vendor_commission}}    
                                        </td>
                                        
                                        <td>
                                            <?php $amount+=$order->total_amount; ?>
                                            {{$order->total_amount}}    
                                        </td>
                                        <td>
                                        {{$order->menu_date}}  
                                        </td>
                                        <!-- <td>
                                            <a href="{{url('edit_bank')}}">
                                                <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                            </a>
                                            <i class="bi bi-trash text-danger booticon" data-toggle="modal"
                                                data-target="#exampleModal"></i>
                                        </td> -->
                                    </tr>
                                  @endforeach
                                        <tr>
                                            <td colspan="4">Total Data</td>
                                            <td >{{$quantity}}</td>
                                            <td >{{--$price--}}</td>
                                            <td >{{--$price--}}</td>
                                            <td >₹{{$commission}}</td>
                                            <td >₹{{$amount}}</td>
                                        </tr>
                                @else
                                    <tr>
                                        <td colspan="10">There are no data.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div  class="card-footer clearfix" data-page="{{$addorderArr->currentPage()}}" id="event_pagination">
                                {{ $addorderArr->links() }}
                            </div> 
                        </div>
                        <br>
                      {{--
                        {!! $addorderArr->links() !!}
                        
                        --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are Sure You Want Delete?
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                url:ENDPOINT+"/report_list_ajax?search="+search+"&dates="+dates+"&from_date="+from_date+"&to_date="+to_date,
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