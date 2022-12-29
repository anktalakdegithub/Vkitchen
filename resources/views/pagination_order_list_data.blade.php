<?php $i=1;?>
                                    @foreach ($addorderArr as $addorder)
                                    <tr>
                                        <td>
                                            {{$i++}}
                                        </td>
                                        <td>
                                            {{$addorder->customer_name}}
                                        </td>
                                        <td>
                                            {{$addorder->customer_contactnum}}
                                        </td>
                                        <td> {{$addorder->customer_address}}</td>
                                        <td>
                                            {{$addorder->tax}}
                                        </td>
                                        <td>
                                            ₹ {{number_format(round($addorder->grandtotal),2)}}
                                        </td>
                                        <td> {{$addorder->order_date}}</td>
                                        <td>

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
                                                                    <label for="staticEmail" class="col-sm-3 col-form-label">Remaing Amount</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="remainamount_{{$addorder->order_id}}" value="{{$addorder->remain_amount}}">
                                                                       
                                                                        <input type="hidden" id="custid_{{$addorder->order_id}}" value="{{$addorder->customer_id}}" >
                                                                        <input type="hidden" id="pay_{{$addorder->order_id}}" value="{{$addorder->payment_id}}">
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
                                                                <button type="button" class="btn btn-primary payddetails" id="orderid" value="{{$addorder->order_id}}">Submit</button>
                                                               
                                                                @csrf
                                                            </form>
                                                            <div id="msg" class="mt-2"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal end -->
                                            <!--
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
                                              -->
                                        </td>
                                    </tr>
                                    @endforeach
                                            <tr class="exam_pagin_link">
  <td colspan="6" align="center">{{$addorderArr->links()}}</td>
</tr>