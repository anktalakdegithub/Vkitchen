<?php $i=1;?>
                                            @foreach($ordersArr as $customer)
                                            <tr>
                                                <td>
                                                    {{$i++;}}
                                                </td>

                                                <td>
                                                    {{$customer->customer_name}}
                                                </td>
                                                <td>{{$customer->customer_contactnum}}</td>

                                                <td>{{$customer->customer_emailid}}</td>

                                                <td>
                                                    <a href="edit_customer/id={{$customer->customer_id}}">
                                                        <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                                    </a>
                                                    <i class="bi bi-trash text-danger booticon" data-toggle="modal"
                                                        data-target="#customer_{{$customer->customer_id}}"></i>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="customer_{{$customer->customer_id}}"
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
                                                                        value="{{$customer->customer_id}}">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                </td>
                                            </tr>
                                            @endforeach
                                            <!-- <tr class="exam_pagin_link">
  <td colspan="6" align="center">{{$ordersArr->links()}}</td>
</tr> -->
<div  class="card-footer clearfix" data-page="{{$ordersArr->currentPage()}}" id="event_pagination">
                                {{ $ordersArr->links() }}
                            </div>