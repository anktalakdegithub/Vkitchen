@extends('layouts.main')
@section('main-container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Bank Account</h4>
                                    <!-- <p class="card-description">
                                        Basic form elements
                                    </p> -->
                                    <form class="forms-sample">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Account Name</label>
                                                    <input type="text" class="form-control" id="exampleInputName1"
                                                        placeholder="Account Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Opening Balance</label>
                                                    <input type="text" class="form-control" id="exampleInputName1"
                                                        placeholder="Opening Balance">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Enter Date</label>
                                                    <input type="date" class="form-control" id="exampleInputName1"
                                                        placeholder="Enter Date">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Account Number</label>
                                                    <input type="text" class="form-control" id="exampleInputName1"
                                                        placeholder="Account Number">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">IFSC Code</label>
                                                    <input type="text" class="form-control" id="exampleInputName1"
                                                        placeholder="IFSC Code">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Bank Name</label>
                                                    <input type="text" class="form-control" id="exampleInputName1"
                                                        placeholder="Bank Name">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Account Holder Name</label>
                                                    <input type="text" class="form-control" id="exampleInputName1"
                                                        placeholder="Account Holder Name">
                                                </div>
                                            </div>
                                        
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Update</button>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

   @endsection