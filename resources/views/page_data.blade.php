                                            <?php $i=1;?>
                                            @foreach($ordersbankArr as $bankorder)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$bankorder->order_id}}</td>
                                                <td>{{$bankorder->customer_name}}</td>
                                                <td>{{$bankorder->amount_paid}}</td>
                                                <td>{{$bankorder->payment_method}}</td>
                                                <td>
                                                {{ date('j F Y', strtotime($bankorder->order_date)) }}
                                                </td>
                                                <td>
                                                    <i class="bi bi-trash text-danger booticon" data-toggle="modal"
                                                        data-target="#payment_{{$bankorder->payment_id}}"></i>
                                                    <!-- Modal -->
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
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr class="exam_pagin_link">
  <td colspan="6" align="center">{{$ordersbankArr->links()}}</td>
</tr>