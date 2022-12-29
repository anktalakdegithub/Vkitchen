
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
                                                                      
                                                                    </tr>
                                                                {{--@else--}}
                                                              
                                                                @endif
                                                                   
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                          
                                                        </div>
                                                     
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
                                            </a>
                                            <i class="bi bi-trash text-danger booticon" data-toggle="modal"
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
                                                                            <input type="number" class="form-control" name="commission" id="vendor_number" placeholder="">
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
                                    <tr class="exam_pagin_link">
                                        <td colspan="6" align="center">{{$vendorArr->links()}}</td>
                                    </tr>

