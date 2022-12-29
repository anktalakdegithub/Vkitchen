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
                                    <h4 class="card-title">Add Subsciption</h4>
                                    <!-- <p class="card-description">
                                        Basic form elements
                                    </p> -->
                                    <form class="forms-sample">
                                        <!-- <div class="form-group">

                                            <div class="row">
                                                <div class="col-md-10" id="faqs">
                                                    <div class="table-responsive">
                                                        <table id="faqs" class="table table-hover">
                                                           
                                                            <tbody>
                                                              <tr>
                                                              <td><input type="text" class="form-control" placeholder="Enter Menu"></td>
                                                              
                                         <td class="mt-10"><a class="badge badge-danger"><i class="bi bi-trash text-white"></i> </a></td> 
                                                              </tr> 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                <div class="text-center"><a onclick="addfaqs();" class="badge badge-success text-white"><i class="bi bi-plus text-white"></i> ADD NEW</a></div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" class="form-control" id="exampleInputName1"
                                                placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Customer Name</label>
                                            <select class="js-example-basic-single w-100">
                                                <option value="AL">Xyz</option>
                                                <option value="WWW">WWW</option>
                                                <option value="AM">CCc</option>
                                                <option value="CA">DDD</option>
                                                <option value="RU">Russia</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputName1">Description</label>
                                            <input type="text" class="form-control" id="exampleInputName1"
                                                placeholder="Description">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Category</label>
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                                Regular Package
                                                                <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                                Breakfast
                                                                <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                                Lunch Packags
                                                                <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                                Dinner Package
                                                                <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Quantity</label>
                                                    <input type="text" class="form-control" id="exampleInputName1"
                                                        placeholder="Quantity">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Date</label>
                                                    <!-- <input type="Date" class="form-control" id="exampleInputName1"
                                                        placeholder="Date"> -->
                                                        <input type="text" name="daterange" >
                                                </div>
                                            </div>
                                        </div>




                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @endsection
        @section('scripts')
        <script>
        var faqs_row = 0;

        function addfaqs() {
            html = '<tr id="faqs-row' + faqs_row + '">';
            html += '<td><input type="text" class="form-control" placeholder="Enter name"></td>';
            html += '<td class="mt-10"><a class="badge badge-danger text-white" onclick="$(\'#faqs-row' + faqs_row +
                '\').remove();"><i class="bi bi-trash"></i> </a></td>';

            html += '</tr>';

            $('#faqs tbody').append(html);

            faqs_row++;
        }
        
        </script>
        <script>
            $(function() {
    $('input[name="daterange"]').daterangepicker();
    $('input[name="daterange"]').change(function(){
      $(this).val();
      console.log($(this).val());
    });
});
        </script>
        @endsection