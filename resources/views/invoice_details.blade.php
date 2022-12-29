@extends('layouts.main')
@section('main-container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class=" text-center">Invoice</h2>
                            </div>
                           
                        </div>
                        <div class="row my-3">
                            <div class="col-md-6">
                                <h3>Lorem ipsum dolor sit.</h3>
                                <p><strong>Address: </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, incidunt.</p>
                                <p>
                                    <strong>Mobile Number:</strong> 8888888888
                                </p>
                            </div>
                            <div class="col-md-6 justify-content-end" style="display:grid;">
                                <p>
                                    <strong>Invoice Id: </strong>#112
                                </p>
                                <p>
                                    <strong>Issue date:</strong> 12-06-2022
                                </p>
                                <p>
                                    <strong>Status: </strong>
                                <span class="badge badge-success">Success</span>
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
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>

                                        <td>
                                            Lorem
                                        </td>
                                        <td>1</td>

                                        <td>₹ 7007.99</td>
                                        <td>₹ 8007.99</td>
                                  
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>

                                        <td>
                                            Lorem
                                        </td>
                                        <td>1</td>

                                        <td>₹ 7007.99</td>
                                        <td>₹ 8007.99</td>
                                  
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>

                                        <td>
                                            Lorem
                                        </td>
                                        <td>1</td>

                                        <td>₹ 7007.99</td>
                                        <td>₹ 8007.99</td>
                                  
                                    </tr>
                                </tbody>
                            </table>
                        
                        </div>
                        <div class="row my-3">
                                <div class="col-md-6">
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <h4>Subtotal: ₹ 8007.99</h4>
                                    <h4 class="mt-3">Tax(10%): ₹ 87.99</h4>
                                    <h3 class="mt-3">Total: ₹ 8007.99</h3>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are Sure You Want Delete?
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                          
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  -->
   @endsection