@extends('layouts.main')
@section('main-container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            @foreach($order_detailsArr as $order)
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class=" text-center">Order Details</h3>
                            </div>
                            <div class="col-md-6">
                                <?php $paid_amount1=0;?>
                                @foreach($payment as $bankorder)
                                <?php $paid_amount1+=$bankorder->amount_paid; ?>
                                @endforeach
                                @if($total['paid'] > $paid_amount1)
                                <h3 class=" text-right"> <a class=" btn btn-success" data-toggle="modal" data-target="#editModal_{{--$dinner->menu_id--}}">Pay Now</a></h3>
                               @endif
                                            <div class="modal fade" id="editModal_{{--$dinner->menu_id--}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel">Pay Now
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>

                                                        </div>
                                                        <div id="msglist"></div>
                                                        <div class="modal-body">
                                                            
                                                            <!--                                                             
                                                              <label>Paid Amount</label>
        
                                                                <input type="text"
                                                                    class="form-control priceb menu_price"
                                                                    id="priceb_1" placeholder="Enter price"
                                                                    value=" {{--$dinner->menu_price--}}" /> -->
                                                                    <div class="form-group row">
                                                                    <label for="inputAmountpaid"
                                                                        class="col-sm-3 col-form-label">Amount Paid</label>
                                                                    <div class="col-sm-9">
                                                                    <!-- <input type="text" class="form-control paidamount" id="paidamount" value=""> -->
                                                                    <input type="text" class="form-control paidamount" id="paidamount" value="{{$total['paid']-$paid_amount1}}" placeholder="Enter Amount">
                                                                    <input type="hidden" class="form-control paidamount" id="order_id" value="{{$order->order_id}}" >
                                                                    <input type="hidden" class="form-control paidamount" id="customer_id" value="{{$order->customer_id}}" >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPayment"
                                                                        class="col-sm-3 col-form-label">Payment Method</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control form-control-lg" id="paymethod">
                                                                            <option value="Cash">Cash</option>
                                                                            <option Value="Bank">Bank</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <!-- <button type="button"
                                                                class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button> -->
                                                            <button type="button"
                                                                class="btn btn-primary payddetails"
                                                                value="{{--$menu->menu_date--}}">Pay</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end Modal -->
                            </div>
                           
                        </div>
                        <div class="row my-3">
                            <div class="col-md-6">
                                <h4>Customer Name:  @if($order->name !='')
                                                {{$order->name}}
                                            @else
                                                {{$order->customer_name}}
                                            @endif{{--$order->customer_name--}}</h4>
                                <p><strong>Address: </strong> @if($order->address !='')
                                                {{$order->address}}
                                            @else
                                            {{$order->customer_address}}
                                               
                                            @endif{{--$order->customer_address--}}</p>
                                <p>
                                    <strong>Mobile Number:</strong> {{$order->phone_no}}
                                </p>
                            </div>
                            <div class="col-md-6 justify-content-end" style="display:grid;">
                              
                                <p>
                                    <strong>Order date:</strong>{{$order->order_date}}
                                </p>
                                <p>
                                    <strong>Status: </strong>
                                <!-- <span class="badge badge-success">Success</span> -->
                                @if($order->status=='Completed')
                                                <span class="badge badge-success ">{{$order->status}}</span>
                                            
                                            @elseif($order->status=='Pending')
                                            
                                                <span class="badge badge-danger ">{{$order->status}}</span>
                                            @else($order->status=='In Process')
                                            
                                                <span class="badge badge-warning text-white ">{{$order->status}}</span>
                                            @endif
                                </p>
                            </div>
                        </div>
                         <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Qty
                                        </th>
                                        <th>
                                            Unit Price
                                        </th>
                                        <th>
                                            Amount
                                        </th>
                                    </tr>
                                </thead>
                                <?php $i=1;?>
                                <tbody>
                                    @foreach($order_singleArr as $orders)
                                    <tr>
                                        <td>
                                           {{$i++}}
                                        </td>

                                        <td>
                                        {{$orders->order_name}}
                                        </td>
                                        <td>{{$orders->order_quantity}}</td>

                                        <td>₹ {{$orders->order_price}}</td>
                                        <td>₹{{$orders->order_quantity * $orders->order_price }}</td>
                                  
                                    </tr>
                                    @endforeach
                                  
                                </tbody>
                            </table>
                        
                        </div>
                        <div class="row my-3">
                                <div class="col-md-6">
                                    <!-- <p>Lorem ipsum dolor sit amet consectetur.</p> -->
                                </div>
                                <div class="col-md-6 text-center">
                                    <h4>Subtotal: ₹{{number_format(round($total['paid']))}}</h4>
                                    <h4 class="mt-3">Tax({{$order->tax}}%): ₹ {{$total['paid'] * ($order->tax/100) }}</h4>
                                    <h3 class="mt-3">Total: ₹ {{$total['paid'] + $orders->total_amount * ($order->tax/100) }}</h3>
                                </div>
                            </div>
                    </div>
                </div>
   @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            @foreach($payment as $pay)
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class=" text-center">Payment Details</h3>
                            </div>
                            
                        </div>
                        <!-- <div class="row my-3">
                            <div class="col-md-6">
                                <h4>Customer Name:  @if($order->name !='')
                                                {{$order->name}}
                                            @else
                                                {{$order->customer_name}}
                                            @endif{{--$order->customer_name--}}</h4>
                                <p><strong>Address: </strong> @if($order->address !='')
                                                {{$order->address}}
                                            @else
                                            {{$order->customer_address}}
                                               
                                            @endif{{--$order->customer_address--}}</p>
                                <p>
                                    <strong>Mobile Number:</strong> {{$order->phone_no}}
                                </p>
                            </div>
                            <div class="col-md-6 justify-content-end" style="display:grid;">
                              
                                <p>
                                    <strong>Order date:</strong>{{$order->order_date}}
                                </p>
                                <p>
                                    <strong>Status: </strong>
                                <!-- <span class="badge badge-success">Success</span> --
                                @if($order->status=='Completed')
                                                <span class="badge badge-success ">{{$order->status}}</span>
                                            
                                            @elseif($order->status=='Pending')
                                            
                                                <span class="badge badge-danger ">{{$order->status}}</span>
                                            @else($order->status=='In Process')
                                            
                                                <span class="badge badge-warning text-white ">{{$order->status}}</span>
                                            @endif
                                </p>
                            </div>
                        </div> -->
                         <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-dark">
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
                                        </th> -->

                                        <th>
                                            Date
                                        </th>

                                        <!-- <th>
                                            Action
                                            <input type="hidden" value="0" id="page" />
                                        </th> -->
                                    </tr>
                                </thead>
                                <?php $i=1;?>
                                <tbody>
                                <?php $paid_amount=0;?>
                                            @foreach($payment as $bankorder)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$bankorder->order_id}}</td>
                                                <td>{{$bankorder->customer_name}}</td>
                                                <td>
                                                <?php $paid_amount+=$bankorder->amount_paid; ?>    
                                                {{$bankorder->amount_paid}}</td>
                                                <!-- <td>{{$bankorder->payment_method}}</td> -->
                                                <td>
                                                {{ date('j F Y', strtotime($bankorder->order_date)) }}
                                                </td>
                                                <!-- <td>
                                                    <i class="bi bi-trash text-danger booticon" data-toggle="modal"
                                                        data-target="#payment_{{$bankorder->payment_id}}"></i>
                                                    <!-- Modal --
                                                    <div class="modal fade" id="payment_'{{$bankorder->payment_id}}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Are
                                                                        Sure You
                                                                        Want Delete?
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button"
                                                                        class="btn btn-primary paymentdelete"
                                                                        value="{{$bankorder->payment_id}}">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td> -->
                                            </tr>
                                            @endforeach
                                         
                                </tbody>
                            </table>
                        
                        </div>
                        <div class="row my-3">
                            <div class="col-md-6">
                                <!-- <p>Lorem ipsum dolor sit amet consectetur.</p> -->
                            </div>
                            <div class="col-md-6 text-center">
                                <h4>Total Amount Paid: ₹{{number_format(round($paid_amount))}}</h4>
                                <h4 class="mt-3">Remaining Amount: ₹ {{$total['paid'] - ($paid_amount) }}</h4>
                                <!-- <h3 class="mt-3">Total: ₹ {{$total['paid'] + $orders->total_amount * ($order->tax/100) }}</h3> -->
                            </div>
                        </div>
                    </div>
                </div>
   @endforeach
            </div>
        </div>
        @endsection
        @section('scripts')
        <script>
        $('body').on('click', '.payddetails', function() {
            //debugger
            var ENDPOINT = "{{ url('/') }}";

            // var orderid =  $(this).val();
            var orderid =  $("#order_id").val();
            // var pay =  $("#pay_"+ orderid).val();
            // var paystatus = $('#paystatus_'+ orderid).val();
            // var remainamount = $('#remainamount_'+ orderid).val();
            var paidamount = $('#paidamount').val();
            var paymethod = $('#paymethod').val();
            //    alert(paidamount);
            // var custid = $(this).attr('data_cust');
            var custid = $("#customer_id").val();
            $.ajax({

                url: "{{url('order_payment')}}",
                data: {
                    // 'pay': pay,
                    'orderid': orderid,
                    'custid': custid,
                    // 'paystatus': paystatus,
                    // 'remainamount': remainamount,
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