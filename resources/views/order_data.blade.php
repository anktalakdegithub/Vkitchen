<?php $i=1;?>
                                    @foreach($ordersArr as $addorder)
                                    
                                         @if($payment_type == 'remaining')
                                         <?php $pay_amount = 0; ?>
                                            @foreach($payment as $pay)
                                                @if($pay->order_id == $addorder->order_id)
                                                <?php $pay_amount+= $pay->amount_paid; ?>
                                                @endif
                                            @endforeach
                                            @if($addorder->grandtotal > $pay_amount)
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
                                            @endif
                                        @elseif($payment_type == 'paid')
                                        <?php $pay_amount = 0; ?>
                                            @foreach($payment as $pay)
                                                @if($pay->order_id == $addorder->order_id)
                                                <?php $pay_amount+= $pay->amount_paid; ?>
                                                @endif
                                            @endforeach
                                            @if($addorder->grandtotal == $pay_amount)
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
                                            @endif
                                        @else
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
                                        @endif 
                                       
                                            @endforeach
                                            <tr class="exam_pagin_link">
                                                <td colspan="6" align="center">{{$ordersArr->links()}}</td>
                                            </tr>

