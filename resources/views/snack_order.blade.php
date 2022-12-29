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
                                <h4 class="card-title">Snacks</h4>
                            </div>
                            <!-- <div class="col-md-6"> <a href="{{--url('add_expenses')--}}"
                                    class="btn btn-primary mb-2 float-right">Add Expenses</a></div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                        
                                            <input type="date" class="form-control" id="dates" value="{{date('d-M-Y')}}" >
                                        </div>
                                        <!-- <div class="col-md-3">
                                        <button class="btn btn-primary search_payment_go">GO</button>
                                        </div> -->
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Snacks
                                        </th>
                                       
                                        <th>
                                            Price
                                        </th> 
                                        <th>
                                            Total Sale
                                        </th>
                                        <th>
                                            Total amount
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        
                                        <th>
                                            Action
                                            <input type="hidden" value="0" id="page" />
                                        </th>
                                    </tr>
                                </thead >
                                <tbody id="order_data" class="order_data">
                                <?php $i=1;?>
                                @foreach ($menus as $expenses) 
                                    <tr>
                                        <td>
                                            {{$i++}}
                                        </td>

                                        <td>
                                            {{$expenses->menu_name}}
                                        </td>
                                        

                                        <td>₹{{$expenses->menu_price}}</td>
                                        <td>{{$expenses->quantity}}</td>
                                        <td>₹{{($expenses->quantity)*($expenses->menu_price)}}</td>
                                        <!-- <td>₹ <input type="number" class="p_price" name="snack_price" readonly value="{{$expenses->menu_price}}"></td> -->
                                        
                                        <!-- <td><input type="number" class="total_price" name="total_price" readonly value="{{$expenses->menu_price}}" id="total_price_{{$expenses->menu_id}}"></td> -->
                                        <td>
                                            <input type="number" class="p_quantity" name="quantity" id="quantity" value="1" data_price="{{$expenses->menu_price}}" data_id="{{$expenses->menu_id}}">
                                            <!-- <div class="number d-flex">
                                                <span class="minus" id="minus" data_price="{{$expenses->menu_price}}" data_id="{{$expenses->menu_id}}">-</span>
                                                    <input type="text" id="input" class="form-control quantity tabledemo mx-1" data_price="{{$expenses->menu_price}}" data_id="{{$expenses->menu_id}}" value="1" name="quantity"/>
                                                <span class="plus" id="plus" data_price="{{$expenses->menu_price}}" data_id="{{$expenses->menu_id}}">+</span>
                                            </div> -->
                                        </td>
                                        <td>
                                            <!-- <a href="edit_expenses/id={{$expenses->menu_id}}">
                                                <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                            </a>
                                            
                                            <i class="bi bi-printer text-warning booticon"></i> -->
                                            <button class="btn btn-dark" data-toggle="modal" data-target="#expenses_{{$expenses->menu_id}}">ADD Order</button>
                                                <!-- Modal -->
                                                    <div class="modal fade snacks_model" id="expenses_{{$expenses->menu_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Are Sure You Want Add?
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                                    <form class="add_snacks" value="{{$expenses->menu_id}}">
                                                                        @csrf
                                                                        <!-- <input type="hidden" name="total_price" id="totalprice_{{$expenses->menu_id}}" value="{{$expenses->menu_price}}"> -->
                                                                        <input type="hidden" name="quanty" id="quanty_{{$expenses->menu_id}}"  value="1">
                                                                        <!-- <input type="hidden" name="price" id="prise"  value="{{$expenses->menu_price}}"> -->
                                                                        <input type="hidden" name="menu" id="id"  value="{{$expenses->menu_id}}">
                                                                        <input type="hidden" name="order_date" id="dat" class="order_date"  value="{{date('Y-m-d')}}">
                                                                        <button type="submit" class="btn btn-primary expensesbtn" value="{{$expenses->menu_id}}">Add</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--  -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 @endsection
 @section('scripts')
        <script>

$('.p_quantity').change(function() {
   
    var data_price = $(this).attr('data_price');
    
    var snacksmenu = $(this).attr('data_id');

    var quantity = $(this).val(); 
    var tot = data_price * quantity;
    // $('#total_price_' + snacksmenu).val(tot); 
    // $('#totalprice_' + snacksmenu).val(tot);
    $('#quanty_' + snacksmenu).val(quantity);

   
});
$('#dates').change(function() {
   
    var date = $(this).val();
   
    var ENDPOINT = "{{ url('/') }}";
    // function fetch_data(search="",order_status="",dates="",from_date="",to_date="") {
        $.ajax({
        url:ENDPOINT+"/snacks_order?date="+date,
        success:function(data){
            
            $('.order_date').val(date);
            $('.order_data').html(data);
        }
        })
    // }
  
});

$('.add_snacks').on('submit', function(event){
    event.preventDefault();
    // var id = $(this).val();
    // alert(id);
    $('.snacks_model').modal('hide');
    var form_data = $(this).serialize();
    // console.log(JSON.parse(form_data));
    $.ajax({
        url:"add_snacks",
        method:"POST",
        data:form_data,
        dataType:"json",
        success:function(data)
        {
           
                location.reload();
            // alert(data);
            
        }
    })
});

        </script>
        <!--  -->
       

        @endsection