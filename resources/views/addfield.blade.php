@extends('layouts.main')
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@section('main-container')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="page-content page-container" id="page-content">
     <div class="padding">
         <div class="row container d-flex justify-content-center">
             <div class="col-lg-8 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title text-center">Add and remove row in table using jquery</h4>
                         <hr>
                         <div class="table-responsive">
                             <table id="faqs" class="table table-hover">
                                 <thead>
                                     <tr>
                                         <th>User</th>
                                         <th>Product</th>
                                         <th>Sale</th>
                                         <th>Status</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                         <td><input type="text" class="form-control" placeholder="User name"></td>
                                         <td><input type="text" placeholder="Product name" class="form-control"></td>
                                         <td class="text-warning mt-10"> 18.76% <i class="fa fa-arrow-up"></i></td>
                                         <td class="mt-10"><button class="badge badge-danger"><i class="fa fa-trash text-white"></i> Delete</button></td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                         <div class="text-center"><button onclick="addfaqs();" class="badge badge-success"><i class="fa fa-plus"></i> ADD NEW</button></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection
<script>
var faqs_row = 0;
function addfaqs() {
html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<td><input type="text" class="form-control" placeholder="User name"></td>';
    html += '<td><input type="text" placeholder="Product name" class="form-control"></td>';
    html += '<td class="text-danger mt-10"> 18.76% <i class="fa fa-arrow-down"></i></td>';
    html += '<td class="mt-10"><button class="badge badge-danger " onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';

    html += '</tr>';

$('#faqs tbody').append(html);

faqs_row++;
}
</script>