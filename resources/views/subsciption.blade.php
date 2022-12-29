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
                                <h4 class="card-title">Subsciption List</h4>
                            </div>
                            <div class="col-md-6"> <a href="{{url('add_subsciption')}}"
                                    class="btn btn-primary mb-2 float-right">Add Subsciption</a></div>
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
                                            Menu
                                        </th>
                                        <th>
                                            Food Name
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Price
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
                                        <td class="py-1">
                                            <img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg" alt="image" width="36px"
                                                height="36px" />
                                        </td>
                                        <td>
                                            Spring Roll
                                        </td>
                                        <td>Regular</td>
                                        <!-- <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </td> -->
                                        <td>
                                            ₹ 77.99
                                        </td>
                                        <td>
                                            <a href="edit_payment.php">
                                                <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                            </a>
                                            <a data-toggle="modal" data-target="#exampleModal">
                                                <i class="bi bi-trash text-danger booticon"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td class="py-1">
                                            <img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg" alt="image" width="36px"
                                                height="36px" />
                                        </td>
                                        <td>
                                            Chilly Paneer Dry
                                        </td>
                                        <td>Lunch</td>
                                        <!-- <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </td> -->
                                        <td>
                                            ₹ 77.99
                                        </td>
                                        <td>
                                            <a href="edit_payment.php">
                                                <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                            </a>
                                            <i class="bi bi-trash text-danger booticon" data-toggle="modal" data-target="#exampleModal"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td class="py-1">
                                            <img src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg" alt="image" width="36px"
                                                height="36px" />
                                        </td>
                                        <td>
                                            Potatoes in Honey & Chilly
                                        </td>
                                        <td>Dinner</td>
                                        <!-- <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </td> -->
                                        <td>
                                            ₹ 77.99
                                        </td>
                                        <td>
                                            <a href="edit_payment.php">
                                                <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                            </a>
                                            <a data-toggle="modal" data-target="#exampleModal">
                                                <i class="bi bi-trash text-danger booticon" data-toggle="modal" data-target="#exampleModal"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td class="py-1">
                                            <img src="{{asset('web/')}}/images/kitchen/item-60fbc8a3c195e.jpeg" alt="image" width="36px"
                                                height="36px" />
                                        </td>
                                        <td>
                                            Spring Roll
                                        </td>
                                        <td>Regular</td>
                                        <!-- <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </td> -->
                                        <td>
                                            ₹ 77.99
                                        </td>
                                        <td>
                                            <a href="edit_payment.php">
                                                <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                            </a>
                                            <i class="bi bi-trash text-danger booticon" data-toggle="modal" data-target="#exampleModal"></i>
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