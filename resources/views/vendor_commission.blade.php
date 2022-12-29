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
                                <h4 class="card-title">Vendor</h4>
                            </div>
                            <!-- <div class="col-md-6"> <a href="{{url('addvendor')}}"
                                    class="btn btn-primary mb-2 float-right">Add Vendor</a></div> -->
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-4">
                                <!-- <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" class="form-control ml-auto" id="dates" placeholder="select date range">
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search"
                                            aria-label="Search" id="exam_search">
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
                                            Name
                                        </th>
                                        <th>
                                            Contact Number
                                        </th>
                                        <th>
                                            Email Id
                                        </th>
                                        <!-- <th>
                                            Menus
                                        </th> -->
                                        <th>
                                            Total commission
                                        </th>
                                        <th>
                                            Total Paid
                                        </th>
                                        <th>
                                            Total Remaining
                                        </th>

                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="data_order">
                                    <?php $i=1;?>
                                    @foreach ($vendorArr as $customer)
                                    <tr>
                                        <td>
                                            {{$i++;}}
                                        </td>

                                        <td>
                                            {{$customer->vendor_name}}
                                        </td>
                                        <td>{{$customer->vendor_contactnum}}</td>

                                        <td>{{$customer->vendor_emailid}}</td>
                                        <!-- <td>  <i class="bi bi-eye-fill text-secondary booticon" data-toggle="modal"
                                                data-target="#vendormenu_{{$customer->vendor_id}}"></i>
                                          
                                            <div class="modal fade vendor_model" id="vendormenu_{{$customer->vendor_id}}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Vendor Menu List
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                      
                                                        <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            #
                                                                        </th>
                                                                        <th>
                                                                            Menu Name
                                                                        </th>
                                                                         <th>
                                                                            Date
                                                                        </th> --
                                                                        <th>
                                                                            Amount
                                                                        </th>
                                                                        <th>
                                                                            Commission
                                                                        </th>

                                                                       
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $j=1; ?>
                                                                @foreach($vendor_menu as $dinner)
                                                                @if($dinner->vendor_id == $customer->vendor_id)
                                                                    <tr>
                                                                        <td>
                                                                        {{$j++}}
                                                                        </td>

                                                                        <td>
                                                                        {{$dinner->menu_name}}
                                                                        </td>
                                                                        <td>{{$dinner->menu_price}}</td>

                                                                        <td>{{$dinner->vendor_commission}}</td>
                                                                       
                                                                        <-- <td>
                                                                        <span class="badge badge-success">Success</span>
                                                                        </td>

                                                                        <td>
                                                                            <a href="edit_cash.php">    
                                                                        <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                                                            </a>
                                                                            <i class="bi bi-printer text-warning booticon"></i>
                                                                            <i class="bi bi-trash text-danger booticon" data-toggle="modal" data-target="#exampleModal"></i>
                                                                        </td> --
                                                                    </tr>
                                                                {{--@else--}}
                                                             
                                                                @endif
                                                                   
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                       - <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button> --
                                                            -- <button type="submit" class="btn btn-primary "
                                                                value="{{$customer->vendor_id}}">Add Commission</button> --
                                                        </div>
                                                        -- </form> --
                                                    </div>
                                                </div>
                                            </div>
                               </td> -->
                                        <td>
                                            <?php $total_commission = 0; ?>
                                            @foreach($total_orders as $order)
                                                @if($order->vendor_id == $customer->vendor_id)
                                                   <?php
                                                        $total_commission += $order->vendor_commission*$order->order_quantity;
                                                    ?>
                                                @endif  
                                            @endforeach
                                            @foreach($total_snacks as $snack)
                                                @if($snack->vendor_id == $customer->vendor_id)
                                                   <?php
                                                        $total_commission += $snack->vendor_commission*$snack->quantity;
                                                    ?>
                                                @endif  
                                            @endforeach
                                          
                                            {{$total_commission}}
                                            <?php $tottal= $total_commission; ?>
                                        </td>
                                        <td>
                                            <?php $t_paid = 0; ?>
                                            @foreach($total_paid as $paid)
                                                @if($paid->customer_id == $customer->vendor_id)
                                                   <?php
                                                        $t_paid += $paid->expenses_amount;
                                                    ?>
                                                @endif  
                                            @endforeach
                                              
                                            {{$t_paid}}
                                            <?php $pay= $t_paid; ?>
                                        </td>

                                        <td>
                                        <?php $remain = $tottal-$pay; ?>    
                                        {{$remain}}</td>

                                        <td>
                                            <!-- <a href="edit_vendor/id={{$customer->vendor_id}}">
                                                <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                            </a> -->
                                            <!-- <i class="bi bi-trash text-danger booticon" data-toggle="modal"
                                                data-target="#customer_{{$customer->vendor_id}}"></i> -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="customer_{{$customer->vendor_id}}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are Sure You
                                                                Want Delete?
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary custmer_del"
                                                                value="{{$customer->vendor_id}}">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="text-white btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#vendor_{{$customer->vendor_id}}">Pay</button>
                                            <!-- Modal -->
                                            <div class="modal fade vendor_model" id="vendor_{{$customer->vendor_id}}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Paid Amount
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form class="forms-sample add_commission" id="add_commission">
                                                            <div class="modal-body">
                                                                @csrf


                                                                <!-- <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleTextarea1">Select Menue </label>
                                                                            <select id="Menu Name" name="menu_id"  class="form-control">
                                                                                    @foreach ($menus as $menu)
                                                                                       
                                                                                        <option value="{{$menu->menu_id}}">{{$menu->menu_name}}</option>
                                                                                      
                                                                                    @endforeach
                                                                            </select>
                                                                            <!-- <input type="text" class="form-control" id="vendor_name" placeholder="Enter Name"> --
                                                                        </div>
                                                                    </div>

                                                                </div> -->
                                                                <!-- <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="expenses_category">Expance Type </label>
                                                                            <select class="form-control" id="expenses_category" name="expanse_type">
                                                                                <option value="Cash">Cash</option>
                                                                                <option value="Credit">Credit</option>
                                                                                <option value="Bank">Bank</option>
                                                                                <option value="Cheque">Cheque</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <!-- <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleTextarea1">Amount</label>
                                                                            <input type="text" class="form-control" id="expenses_amount" placeholder="Enter Amount">
                                                                        </div>
                                                                    </div>
                                                                </div> -->

                                                                <div class="form-group">
                                                                    <label for="expenses_payment">Payment Type </label>
                                                                    <select class="form-control" id="expenses_payment" name="payment_type">
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="Credit">Credit</option>
                                                                        <option value="Bank">Bank</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                    </select>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleTextarea1">Pay Commission Amount</label>
                                                                            <input type="hidden" name="vendor_id" value="{{$customer->vendor_id}}">
                                                                            <input type="number" class="form-control" name="commission" id="vendor_number" value="{{$remain}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                                <!-- <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button> -->
                                                                <button type="submit" class="btn btn-primary "
                                                                    value="{{$customer->vendor_id}}">pay</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div  class="card-footer clearfix" data-page="{{$vendorArr->currentPage()}}" id="event_pagination">
                                {{ $vendorArr->links() }}
                            </div> 
                        </div>

                    </div>
                </div>
            </div>
        </div>

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
        $('body').on('click', '.custmer_del', function() {
            //debugger
            var cust_id = $(this).val();
            $.ajax({

                url: "destroy_vendor",
                data: {
                    'vendor_id': cust_id,
                    _token: '{{ csrf_token() }}'
                },
                type: 'post',
                success: function(response) {
                    location.reload();
                    // LoadData();
                }
            })
        });
    $(document).ready(function(){
        var ENDPOINT = "{{ url('/') }}";
        function fetch_data(search="",dates="",from_date="",to_date="") {
            $.ajax({
            url:ENDPOINT+"/vendor_commission_ajax?search="+search+"&dates="+dates+"&from_date="+from_date+"&to_date="+to_date,
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
            // if (dates != '') {
            //     dates = dates.split('To');
            //     from_date = dates[0];
            //     to_date = dates[1];
            // }
            fetch_data(search,dates,from_date,to_date);
        });
        $(".search_payment_go").on('click', function() {
            //    alert();
            var dates = ($("#dates").val());
            var search = $('#exam_search').val();
            var from_date = '';
            var to_date = '';
            // if (dates != '') {
            //     dates = dates.split('To');
            //     from_date = dates[0];
            //     to_date = dates[1];
            // }
            fetch_data(search,dates,from_date,to_date);
        });
   
    });
    $('.add_commission').on('submit', function(event){
        event.preventDefault();
        $('.vendor_model').modal('hide');
        var form_data = $(this).serialize();
        $.ajax({
            url:"vendor_payment",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                if (data.code == "404") {
                    $('#msginsert').html('<div class="alert alert-danger">' + data.msg + '</div>');
                    
                } else {
                    $('#msginsert').html('<div class="alert alert-success">Commission Paid successfully!.</div>');
                     location.reload();
                }
                // alert('Commission Add Successfully');
                // if(data.error.length > 0)
                // {
                //     var error_html = '';
                //     for(var count = 0; count < data.error.length; count++)
                //     {
                //         error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                //     }
                //     $('#form_output').html(error_html);
                // }
                // else
                // {
                //     $('#form_output').html(data.success);
                //     $('#student_form')[0].reset();
                //     $('#action').val('Add');
                //     $('.modal-title').text('Add Data');
                //     $('#button_action').val('insert');
                //     $('#student_table').DataTable().ajax.reload();
                // }
            }
        })
    });
    </script>
    @endsection