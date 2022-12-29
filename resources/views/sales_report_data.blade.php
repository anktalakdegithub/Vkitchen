<?php 
                                            $i=1;
                                            $quantity=0;
                                            $amount=0;
                                            $price=0;
                                        ?>
                                            @foreach($ordersArr as $order)
                                            <tr>
                                            <!-- <tr> -->
                                            <td>
                                                {{$i++}}
                                            </td> 
                                            <td>
                                                {{$order->menu_name}}
                                            </td> 
                                            <td>
                                                {{$order->vendor_name}}
                                            </td>
                                            

                                            <td>₹{{$order->menu_price}}</td>
                                            <td>₹{{$order->vendor_commission}}</td>
                                            <td>
                                            <?php $quantity+=$order->quantity; ?>    
                                                {{$order->quantity}}
                                            </td>
                                            <td>
                                            <?php $price+=($order->quantity)*($order->menu_price); ?>        
                                            ₹{{($order->quantity)*($order->menu_price)}}</td>
                                            <td>
                                            <?php $amount+=(($order->quantity)*($order->vendor_commission)); ?>
                                                
                                            ₹{{($order->quantity)*($order->vendor_commission)}}</td>
                                            <!-- <td>₹ <input type="number" class="p_price" name="snack_price" readonly value="{{$order->menu_price}}"></td> -->
                                            
                                            <!-- <td><input type="number" class="total_price" name="total_price" readonly value="{{$order->menu_price}}" id="total_price_{{$order->menu_id}}"></td> -->
                                            <td>
                                                {{$order->order_date}}
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
                                            <tr class="exam_pagin_link">
                                                <td colspan="6" align="center">{{$ordersArr->links()}}</td>
                                            </tr>