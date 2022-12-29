


                                    <div class="row my-2">
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
                                                    <h2 class="text-white">₹{{number_format(round($total_snack))}}</h2>
                                                </div>
                                            </div>
                                        </div>
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
                                                    <h2 class="text-white">₹{{number_format(round($remaingamtc['remainingamountcash']))}}
                                                    </h2>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="card" style="background-image: linear-gradient(230deg, #759bff, #843cf6);">
                                                <div class="card-body">
                                                    <h3 class="card-title text-white">Total Amount</h3>
                                                    <h2 class="text-white">₹ {{$sum=$totalcash['paidcash']+$total_snack}}
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
                                                <tbody class="data_payment1">
                                                    
                                                <?php $i=1;?>
                                                {{--dd($ordersArr)--}}
                                            @foreach($ordersArr as $payment)
                                            <tr>
                                               
                                                <td>{{$i++}}</td>
                                                <td>{{$payment->order_id}}</td>
                                                <td>{{$payment->customer_name}}</td>
                                                <td>{{$payment->amount_paid}}</td>
                                                <td>{{$payment->payment_method}}</td>
                                                <td>
                                                {{ date('j F Y', strtotime($payment->order_date)) }}
                                                </td>
                                                <!-- <td>
                                                {{$payment->order_date}}
                                                </td> -->
                                                <td>
                                                <!-- <button id="testButton" type="button">Click me</button> -->
                                                    <!-- <i  type="button" class="bi bi-trash text-danger booticon" data-toggle="modal"
                                                        data-target="#paymentpage_'{{$payment->payment_id}}"></i>
                                                       -->
                                                    <!-- Modal -->
                                                    <!-- <div class="modal fade" id="paymentpage_'{{$payment->payment_id}}"
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
                                                                        value="{{$payment->payment_id}}">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <i class="bi bi-trash text-danger booticon" data-toggle="modal"
                                                        data-target="#paymentpage_{{$payment->payment_id}}"></i>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="paymentpage_{{$payment->payment_id}}"
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
                                                                    <!-- <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button> -->
                                                                    <button type="button" class="btn btn-primary paymentdelete"
                                                                        value="{{$payment->payment_id}}">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr class="exam_pagin_link">
                                                <td colspan="7" align="center">{{$ordersArr->links()}}</td>
                                            </tr>

                                                    
                                            
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
