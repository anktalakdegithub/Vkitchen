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

                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="js-example-basic-single w-100"
                                        name="order_status" id="order_status">
                                        <option value="">Select Status Type</option>
                                        <option value="Pending">Pending</option>
                                        <option value="In Process">In Process</option>
                                        <option Value="Completed">Completed</option>
                                                                  
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="js-example-basic-single w-100"
                                        name="order_payment" id="order_payment">
                                        <option value="">Select Payment Type</option>
                                        <option value="paid">Paid</option>
                                        <option value="remaining">Remaining</option>
                                        <!-- <option Value="Completed">Completed</option> -->
                                                                  
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="row">
                                    <!-- <div class="col-md-9">
                                        <input type="text" class="form-control ml-auto" id="dates"
                                            placeholder="select date range">
                                    </div> -->
                                    
                                        <input type="text" class="form-control ml-auto" id="dates" placeholder="select date range">
                                    
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                       <input type="text" class="form-control" id="exam_search"  placeholder="Search for...">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary search_payment_go" >Search</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-9"> -->
                                    <!-- <input type="text" class="form-control" id="exam_search"  placeholder="Search for..."> -->
                                <!-- </div>
                                <div class="col-md-3"> -->
                                    <!-- <button class="btn btn-primary search_payment_go">GO</button> -->
                                <!-- </div> -->
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <!-- <th> Order ID </th> -->
                                        <th> Customer Name </th>
                                        <th> Contact Number </th>
                                        <th> Customer Address </th>
                                        <th> Total </th>
                                        <th> Paid Amount </th>
                                        <th> Remaining Amount </th>
                                        <th> Status </th>
                                        <th> Pickup Type</th>
                                        <th> Payment Type</th>
                                        <th> Date</th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody class="data_order"> 
                                    <?php $i=1;?>
                                    {{--dd($addorderArr)--}}
                                    @foreach ($addorderArr as $addorder)
                                    <tr>
                                        <td>
                                            {{$i++}}
                                        </td>
                                        <!-- <td>
                                            <a href="order_details/id={{$addorder->order_id}}" class="text-dark">
                                            {{$addorder->order_id}}
                                            </a>
                                        </td> -->
                                        <td>
                                            @if($addorder->name !='')
                                                {{$addorder->name}}
                                            @else
                                                {{$addorder->customer_name}}
                                            @endif 
                                        </td>
                                        <td>
                                            {{$addorder->phone_no}}
                                        </td>
                                        <td> @if($addorder->address !='')
                                                {{$addorder->address}}
                                            @else
                                            {{$addorder->customer_address}}
                                               
                                            @endif </td>
                                        <!-- <td>
                                            {{$addorder->tax}}
                                        </td> -->
                                        <td>
                                            ₹ {{number_format(round($addorder->grandtotal),2)}}
                                        </td>
                                        <td>
                                            <?php $paid_amount = 0; ?>
                                            @foreach($payment as $pay)
                                                @if($pay->order_id == $addorder->order_id)
                                                <?php $paid_amount+= $pay->amount_paid; ?>
                                                @endif
                                            @endforeach
                                            ₹ {{number_format(round($paid_amount),2)}}
                                        </td>
                                        <td>
                                            <!-- ₹ {{$addorder->remain_amount}} -->
                                            <!-- ₹ {{number_format(round($addorder->grandtotal),2)}} -->
                                            <!-- <input type="text" > -->
                                         {{--number_format(round($addorder->remain_amount),2)--}}
                                          ₹ {{number_format(round($addorder->grandtotal - $paid_amount),2)}}
                                         
                                         
                                      </td>
                                        <td>
                                            @if($addorder->status=='Completed')
                                                <span class="badge badge-success ">{{$addorder->status}}</span>
                                            
                                            @elseif($addorder->status=='Pending')
                                            
                                                <span class="badge badge-danger ">{{$addorder->status}}</span>
                                            @else($addorder->status=='In Process')
                                            
                                                <span class="badge badge-warning text-white ">{{$addorder->status}}</span>
                                            @endif
                                        </td>
                                        <td> {{$addorder->pick_type}}</td>
                                        <td> {{$addorder->pay_method}}</td>
                                        <td> {{$addorder->order_date}}</td>
                                        <td class="d-flex">
                                            <a href="order_details/id={{$addorder->order_id}}">View<i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <i class="bi bi-wallet-fill text-success px-2 booticon" data-toggle="modal"
                                                data-target="#addorder_{{$addorder->order_id}}"></i>
                                            <!--modal start  -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="addorder_{{$addorder->order_id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Payment
                                                                Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="forms-sample">
                                                                <div class="form-group row">
                                                               
                                                                   <label for="staticEmail" class="col-sm-3 col-form-label">Order Status</label>
                                                                   <div class="col-sm-9">
                                                                      <select class="form-control form-control-lg" id="paystatus_{{$addorder->order_id}}">
                                                                           <option value="Pending">Pending</option>
                                                                           <option value="In Process">In Process</option>
                                                                           <option Value="Completed">Completed</option>
                                                                       </select>
                                                                   </div>
                                                               </div>
                                                               @if($addorder->pay_method=='Pay Later')
                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-3 col-form-label">Remaing Amount</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="remainamount_{{$addorder->order_id}}" value="{{$addorder->remain_amount}}">
                                                                       
                                                                        <input type="hidden" id="custid_{{$addorder->order_id}}" value="{{$addorder->customer_id}}" >
                                                                        <!-- <input type="hidden" id="pay_{{$addorder->order_id}}" value=""> -->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputAmountpaid"
                                                                        class="col-sm-3 col-form-label">Amount Paid</label>
                                                                    <div class="col-sm-9">
                                                                    <!-- <input type="text" class="form-control paidamount" id="paidamount" value=""> -->
                                                                    <input type="text" class="form-control paidamount" id="paidamount_{{$addorder->order_id}}" value="" placeholder="Enter Amount">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPayment"
                                                                        class="col-sm-3 col-form-label">Payment Method</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control form-control-lg" id="paymethod_{{$addorder->order_id}}">
                                                                            <option value="Cash">Cash</option>
                                                                            <option Value="Bank">Bank</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                <button type="button" class="btn btn-primary payddetails" id="orderid" value="{{$addorder->order_id}}">Submit</button>
                                                                <div id="msglist" class="mt-2"></div>
                                                                @csrf
                                                            </form>
                                                           
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal end -->
                                            
                                             <i type="button" class="bi bi-trash text-danger booticon" data-toggle="modal" data-target="#order_{{$addorder->order_id}}"></i> 
                                            
                                            <div class="modal fade" id="order_{{$addorder->order_id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are Sure You
                                                                Want Delete?</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    <div class="msgdelete"></div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary orderdelete" value="{{$addorder->order_id}}">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             
                                        </td>
                                    </tr>
                                    @endforeach
                                    <!-- <div  class="card-footer clearfix" data-page="{{$addorderArr->currentPage()}}" id="event_pagination">
                                        {{ $addorderArr->links() }}
                                    </div> -->
                                    <tr class="exam_pagin_link">
                                        <td colspan="6" align="center">{{$addorderArr->links()}}</td>
                                    </tr>
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
                success: function(data) {
                    if (data.code == "404") {
                        $('.msgdelete').html('<div class="alert alert-danger">' + data.msg + '</div>');
                        
                    } else {
                        $('.msgdelete').html('<div class="alert alert-success">Order Deleted successfully!.</div>');
                         location.reload();
                    }
                    // location.reload();
                    // LoadData();
                    
                }
            })
        })
        </script>
        <script>
    $(document).ready(function(){
            var ENDPOINT = "{{ url('/') }}";
            function fetch_data(search="",order_status="",order_payment="",dates="",from_date="",to_date="") {
                $.ajax({
                    url:ENDPOINT+"/order_list_ajax?search="+search+"&order_status="+order_status+"&order_payment="+order_payment+"&dates="+dates+"&from_date="+from_date+"&to_date="+to_date,
                    success:function(data){
                        $('.data_order').html(data);
                    }
                })
            }
   
        $(document).on('keyup', '#exam_search', function(){
            var order_status = $('#order_status').val();
            var search = $('#exam_search').val();
            var dates = ($("#dates").val());
            var from_date = '';
            var to_date = '';
            if (dates != '') {
                dates = dates.split('To');
                from_date = dates[0];
                to_date = dates[1];
            }
            //   fetch_data(search,dates,from_date,to_date);
            fetch_data(search,order_status,dates,from_date,to_date);

        });
        $(document).on('change', '#order_status', function(){
            var search = $('#exam_search').val();
            var order_status = $('#order_status').val();
            var dates = ($("#dates").val());
            var from_date = '';
            var to_date = '';
            if (dates != '') {
                dates = dates.split('To');
                from_date = dates[0];
                to_date = dates[1];
            }
            fetch_data(search,order_status,dates,from_date,to_date);
        });
        $(document).on('change', '#order_payment', function(){
            var search = $('#exam_search').val();
            var order_status = $('#order_status').val();
            var order_payment = $('#order_payment').val();
            var dates = ($("#dates").val());
            var from_date = '';
            var to_date = '';
            if (dates != '') {
                dates = dates.split('To');
                from_date = dates[0];
                to_date = dates[1];
            }
            fetch_data(search,order_status,order_payment,dates,from_date,to_date);
        });
        $(".search_payment_go").on('click', function() {
        //    alert();
            var order_status = $('#order_status').val();
            var dates = ($("#dates").val());
            var search = $('#exam_search').val();
            var from_date = '';
            var to_date = '';
            if (dates != '') {
                dates = dates.split(' To ');
                from_date = dates[0];
                to_date = dates[1];
            }
            // console.log(dates);
            // console.log(to_date);
            // console.log(from_date);
            // console.log(dates);
            // fetch_data(search,dates,from_date,to_date);
            fetch_data(search,order_status,dates,from_date,to_date);

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
            //  alert(paidamount);
            // var custid = $(this).attr('data_cust');
            var custid = $("#custid_"+ orderid).val();
            $.ajax({

                url: "order_status",
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
                         location.reload();
                    }
                }
            })
        })
        </script>
        @endsection