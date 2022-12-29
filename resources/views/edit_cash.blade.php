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
                                    <h4 class="card-title">Update Cash</h4>
                                    <!-- <p class="card-description">
                                        Basic form elements
                                    </p> -->
                                    <form class="forms-sample">
                                     

                                        <div class="form-group">
                                            <label for="exampleSelectGender">Adjustment </label>
                                            <select class="form-control" id="exampleSelectGender">
                                                <option>Add Cash</option>
                                                <option value="">Reduce Cash</option>
                                               

                                            </select>
                                        </div>
                        
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Enter Amount</label>
                                                    <input type="text" class="form-control" id="exampleInputName1"
                                                        placeholder="Enter Amount">
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Description</label>
                                            <!-- <input type="text" class="form-control" id="exampleInputName1"
                                                placeholder="Description"> -->
                                                <textarea name="" class="form-control" id="" cols="30" rows="10" placeholder="Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Date</label>
                                            <input type="date" class="form-control" id="exampleInputName1"
                                                placeholder="Description">
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