@extends('layouts.main')
@section('main-container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Invoice</h4>
                            </div>
                            <div class="col-md-6">
                                <!-- <a href="add_cash.php"
                                    class="btn btn-primary mb-2 float-right">Adjust Cash</a> -->
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #759bff, #843cf6);">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Total Orders</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #fc5286, #fbaaa2);">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">cancelled Orders</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #ffc480, #ff763b);">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Total Earnings</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="fromDate"
                                                placeholder="Enter From Date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="toDate"
                                                placeholder="Enter To Date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search"
                                            aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary" type="button">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Amount
                                        </th>


                                        <th>
                                            Action
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
                                        <td>1-29-2000</td>

                                        <td>₹ 7007.99</td>


                                        <td>
                                            <a href="{{url('invoice_details')}}">
                                                <i class="bi bi-printer text-warning booticon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are Sure You Want Delete?
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        @endsection