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
                                    <h4 class="card-title">Add Cash</h4>
                                    <!-- <p class="card-description">
                                        Basic form elements
                                    </p> -->
                                    <form class="forms-sample">
                                     

                                        <div class="form-group">
                                            <label for="exampleSelectGender">Adjustment </label>
                                            <select class="form-control" id="adjustment">
                                                <option>Add Cash</option>
                                                <option value="">Reduce Cash</option>
                                               

                                            </select>
                                        </div>
                        
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Enter Amount</label>
                                                    <input type="text" class="form-control" id="amount"
                                                        placeholder="Enter Amount">
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Description</label>
                                            <!-- <input type="text" class="form-control" id="exampleInputName1"
                                                placeholder="Description"> -->
                                                <textarea name="" class="form-control" id="description" cols="30" rows="10" placeholder="Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Date</label>
                                            <input type="date" class="form-control" id="date" placeholder="date">
                                        </div>


                                        <button type="button" class="btn btn-primary mr-2 addcash">Submit</button>
                                    @csrf
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 
<script>
       $(document).ready(function(){
       
            $(document).on('click', '.addcash', function() {
                var ENDPOINT = "{{ url('/') }}";
            var formData = new FormData();
        formData.append('adjustment', $('#adjustment').val());
        formData.append('amount', $('#amount').val());
        formData.append('description', $('#description').val());
        formData.append('date', $('#date').val());
     
        $.ajax({
            method: "POST",
            url: ENDPOINT + '/storecash',
            data: formData,
            headers: {
                'IsAjax': 'true'
            },
            processData: false,
            contentType: false,
            dataType: 'json',

            success: function(data) {
                if (data.code == "404") {
                    $('#msg').html('<p class="text-danger">' + data.msg + '</p>');
                 
                } else {
                    alert('success');
                    $('#msg').html('<p class="text-success">' + data.msg + '</p>');
               
                }


            }
        });
        
    });
       });
</script>