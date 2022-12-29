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
                                <h4 class="card-title">Expenses</h4>
                            </div>
                            <div class="col-md-6"> <a href="{{url('add_expenses')}}"
                                    class="btn btn-primary mb-2 float-right">Add Expenses</a></div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-3 col-sm-6">
                                <div class="card" style="background-image: linear-gradient(230deg, #759bff, #843cf6);">
                                    <div class="card-body">
                                    <h3 class="card-title text-white">Total Expance</h3>
                                    <h2 class="text-white" id="total_paid" >₹{{number_format(round($total['paid']))}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                  <!-- <div class="card" style="background-image: linear-gradient(230deg, #fc5286, #fbaaa2);">
                                    <div class="card-body">
                                    <h3 class="card-title text-white">cancelled Orders</h3>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <!-- <div class="card" style="background-image: linear-gradient(230deg, #ffc480, #ff763b);">
                                    <div class="card-body">
                                    <h3 class="card-title text-white">Total Earnings</h3>
                                    </div>
                                </div>-->
                            </div> 
                            <div class="col-md-3 col-sm-6">
                          
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                       
                                    <input type="text" class="form-control ml-auto expense_search" id="dates" placeholder="select date range">
                                    </div>
                                 
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" id="expense_search"
                                            aria-label="Search">
                                        <div class="input-group-append">
                                            <!-- <button class="search_expense_data btn btn-sm btn-primary" type="button">Search</button> -->
                                            <button type="button" class="btn btn-primary expense_search_go">GO</button>
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
                                            Title
                                        </th>
                                       
                                        <th>
                                            Amount
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Action
                                            <input type="hidden" value="0" id="page" />
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="data_expenses">
                                    <?php $i=1; ?>
                                    @foreach ($expensesArr as $expenses)
                                        
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$expenses->expense_Name}}</td>
                                        <td>{{$expenses->expenses_amount}}</td>
                                        <td>{{$expenses->expense_date}}</td>
                                        <td>
                                        <a href="edit_expenses/id={{$expenses->expenses_id}}">
                                            <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                        </a>
                                        <i class="bi bi-trash text-danger booticon" data-toggle="modal"
                                            data-target="#expenses_{{$expenses->expenses_id}}"></i>
                                        <!-- Modal -->
                                        <div class="modal fade" id="expenses_{{$expenses->expenses_id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are Sure You
                                                            Want Delete?
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary expensesbtn"
                                                            value="{{$expenses->expenses_id}}">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tr class="exam_pagin_link">
                                    <td colspan="5" align="right">{{$expensesArr->links()}}</td>
                                </tr>
                            </table>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
 @endsection
 @section('scripts')
        <script>
        $('body').on('click', '.expensesbtn', function() {
            //debugger
            var expenses_id = $(this).val();
            $.ajax({

                url: "destroy_expenses",
                data: {
                    'expenses_id': expenses_id,
                    _token: '{{ csrf_token() }}'
                },
                type: 'post',
                success: function(response) {
                    location.reload();
                    // LoadData();
                }
            })
        })
        </script>
        <!--  -->
        <!--  -->
        <script>
      $('#dates').daterangepicker(
        {
            autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
        }
    );
    $("#checkall").change(function () {
    $("input:checkbox").prop('checked', this.checked);
    $('.odelete').css({"display":"inline-block"});
});
$(document).on('change', 'input[name="chkboxplat[]"]', function() {

$('.odelete').css({"display":"flex"});
});
    $('#dates').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' To ' + picker.endDate.format('YYYY-MM-DD'));
      $('#page').val('0');
      $("#data-wrapper").html('');
     
    });

  $('#dates').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
      $('#page').val('0');
      $("#data-wrapper").html('');
      
  });
  $(".expense_search_go").on('click', function() {
    // alert();
    $("#data_expenses").html('');
    $('#page').val("0");
            status=="inactive";
            infinteLoadMore();
});
$(".search_expense_data").on('click', function() {
    // alert();
    $("#data_expenses").html('');
    $('#page').val("0");
            status=="inactive";
            infinteLoadMore();
});
$(function() {
    var dateFormat = "dd/mm/yy",
        from = $("#from")
        .datepicker({
            dateFormat: 'yy-mm-dd',
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
        }),
        to = $("#to").datepicker({

            dateFormat: 'yy-mm-dd',
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change", function() {
            from.datepicker("option", "maxDate", getDate(this));
        });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }
});


//for datatable
//  $(document).ready(function() {
//     $('#order_listing').DataTable();
// } );
</script>
<script>
var ENDPOINT = "{{ url('/') }}";
// var page = 0;
status = "inactive";
// infinteLoadMore(page);
function infinteLoadMore() {
    status = "active";
    var page = parseInt($("#page").val());
    var expense_search=($("#expense_search").val());
    var dates=($("#dates").val());
    var from_date='';
    var to_date='';
    if(dates!=''){
        dates = dates.split(' To ');
        from_date=dates[0];
        to_date=dates[1];
    }
    $.ajax({
        url: ENDPOINT + "/expenses_search_details",
        data: {
            "_token": "{{ csrf_token() }}",
            expense_search:expense_search,
            dates:dates,
            from_date: from_date,
            to_date: to_date
        },
        dataType: "json",
        type: "post",

    })
    .done(function(response) {

        if (response.length == 0) {
            $('.auto-load').hide("We don't have more data to display :(");
            return;
        }
        if (response.page > 0) {

            status = "inactive";
        }
        $('.auto-load').hide();
        $("#data_expenses").append(response.output);
        $("#total_paid").html(response.paid);
        $('#page').val(page + parseInt(response.page));
        console.log(page);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log('Server error occured');
    });
}
</script>

        @endsection