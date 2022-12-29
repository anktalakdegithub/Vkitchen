                            <?php $i=1;?>
                                @foreach ($menus as $expenses) 
                                    <tr>
                                        <td>
                                            {{$i++}}
                                        </td>

                                        <td>
                                            {{$expenses->menu_name}}
                                        </td>
                                        

                                        <td>₹{{$expenses->menu_price}}</td>
                                        <td>{{$expenses->quantity}}</td>
                                        <td>₹{{($expenses->quantity)*($expenses->menu_price)}}</td>
                                        <!-- <td>₹ <input type="number" class="p_price" name="snack_price" readonly value="{{$expenses->menu_price}}"></td> -->
                                        
                                        <!-- <td><input type="number" class="total_price" name="total_price" readonly value="{{$expenses->menu_price}}" id="total_price_{{$expenses->menu_id}}"></td> -->
                                        <td>
                                            <input type="number" class="p_quantity" name="quantity" id="quantity" value="1" data_price="{{$expenses->menu_price}}" data_id="{{$expenses->menu_id}}">
                                            <!-- <div class="number d-flex">
                                                <span class="minus" id="minus" data_price="{{$expenses->menu_price}}" data_id="{{$expenses->menu_id}}">-</span>
                                                    <input type="text" id="input" class="form-control quantity tabledemo mx-1" data_price="{{$expenses->menu_price}}" data_id="{{$expenses->menu_id}}" value="1" name="quantity"/>
                                                <span class="plus" id="plus" data_price="{{$expenses->menu_price}}" data_id="{{$expenses->menu_id}}">+</span>
                                            </div> -->
                                        </td>
                                        <td>
                                            <!-- <a href="edit_expenses/id={{$expenses->menu_id}}">
                                                <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                            </a>
                                            
                                            <i class="bi bi-printer text-warning booticon"></i> -->
                                            <button class="btn btn-dark" data-toggle="modal" data-target="#expenses_{{$expenses->menu_id}}">ADD Order</button>
                                                <!-- Modal -->
                                                    <div class="modal fade snacks_model" id="expenses_{{$expenses->menu_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Are Sure You Want Add?
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                                    <form class="add_snacks">
                                                                        @csrf
                                                                        <input type="hidden" name="total_price" id="totalprice_{{$expenses->menu_id}}" value="{{$expenses->menu_price}}">
                                                                        <input type="hidden" name="quanty" id="quanty_{{$expenses->menu_id}}"  value="1">
                                                                        <input type="hidden" name="price" id="prise"  value="{{$expenses->menu_price}}">
                                                                        <input type="hidden" name="menu" id="id"  value="{{$expenses->menu_id}}">
                                                                        <button type="submit" class="btn btn-primary expensesbtn" value="{{$expenses->menu_id}}">Add</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--  -->
                                        </td>
                                    </tr>
                                @endforeach
                                  

