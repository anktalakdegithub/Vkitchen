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
                                <h4 class="card-title">Bank Details</h4>
                            </div>
                            <div class="col-md-6"> <a href="{{url('add_bank')}}" class="btn btn-primary mb-2 float-right">Add
                                    Bank Details</a></div>
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
                                            Bank Name
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

                                        <td>XYZ</td>

                                        <td>
                                            <a href="edit_bank.php">
                                                <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                            </a>
                                            <i class="bi bi-trash text-danger booticon" data-toggle="modal"
                                                data-target="#exampleModal"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>

                                        <td>
                                            Lorem
                                        </td>
                                        <td>1-29-2000</td>

                                        <td>XYZ</td>

                                        <td>
                                            <a href="edit_bank.php">
                                                <i class="bi bi-pencil-square text-success px-2 booticon"
                                                    data-toggle="modal" data-target="#exampleModal"></i>
                                            </a>
                                            <i class="bi bi-trash text-danger booticon" data-toggle="modal"
                                                data-target="#exampleModal"></i>
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