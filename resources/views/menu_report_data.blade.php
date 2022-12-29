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
                                                    {{$order->order_quantity * $order->vendor_commission}}    
                                                </td>
                                                
                                                <td>
                                                    <?php $amount+=$order->total_amount; ?>
                                                    {{$order->total_amount}}    
                                                </td>
                                                <td>
                                        {{$order->menu_date}}  
                                        </td>

                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="4">Total Data</td>
                                                <td >{{$quantity}}</td>
                                                <td >{{--$price--}}</td>
                                                <td >{{--$price--}}</td>
                                                <td >{{--$price--}}</td>
                                                <td >₹{{$amount}}</td>
                                            </tr>
                                            <tr class="exam_pagin_link">
                                                <td colspan="6" align="center">{{$ordersArr->links()}}</td>
                                            </tr>