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
                                <h4 class="card-title">Customer</h4>
                            </div>
                            <div class="col-md-6"> <a href="{{url('add_customer')}}"
                                    class="btn btn-primary mb-2 float-right">Add Customer</a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-4">
                                <!-- <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" class="form-control ml-auto" id="dates" placeholder="select date range">
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search"
                                            aria-label="Search" id="exam_search">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary search_payment_go" type="button">Search</button>
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
                                            Contact Number
                                        </th>
                                        <th>
                                            Email Id
                                        </th>

                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="data_order">
                                    <?php $i=1;?>
                                    @foreach ($customerArr as $customer)
                                    <tr>
                                        <td>
                                            {{$i++;}}
                                        </td>

                                        <td>
                                            {{$customer->customer_name}}
                                        </td>
                                        <td>{{$customer->customer_contactnum}}</td>

                                        <td>{{$customer->customer_emailid}}</td>

                                        <td>
                                            <a href="edit_customer/id={{$customer->customer_id}}">
                                                <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                            </a>
                                            <i class="bi bi-trash text-danger booticon" data-toggle="modal"
                                                data-target="#customer_{{$customer->customer_id}}"></i>
                                            <!-- Modal -->
                                            <div class="modal fade" id="customer_{{$customer->customer_id}}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <button type="button" class="btn btn-primary custmer_del"
                                                                value="{{$customer->customer_id}}">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="exam_pagin_link">
                                    <td colspan="5" align="right">{{$customerArr->links()}}</td>
                                </tr>
                                </tbody>
                               
                            </table>
                            <!-- <div  class="card-footer clearfix" data-page="{{$customerArr->currentPage()}}" id="event_pagination">
                                {{ $customerArr->links() }}
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @endsection
        @section('scripts')
        <script>
        $('#dates').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
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
        $('body').on('click', '.custmer_del', function() {
            //debugger
            var cust_id = $(this).val();
            $.ajax({

                url: "destroy_customer",
                data: {
                    'cust_id': cust_id,
                    _token: '{{ csrf_token() }}'
                },
                type: 'post',
                success: function(response) {
                    location.reload();
                    // LoadData();
                }
            })
        });
    $(document).ready(function(){
            var ENDPOINT = "{{ url('/') }}";
            function fetch_data(search="",dates="",from_date="",to_date="") {
                $.ajax({
                url:ENDPOINT+"/customer_list_ajax?search="+search+"&dates="+dates+"&from_date="+from_date+"&to_date="+to_date,
                success:function(data){
                    $('.data_order').html(data);
                }
                })
            }
   
       $(document).on('keyup', '#exam_search', function(){
            var search = $('#exam_search').val();
            var dates = ($("#dates").val());
            var from_date = '';
            var to_date = '';
            // if (dates != '') {
            //     dates = dates.split('To');
            //     from_date = dates[0];
            //     to_date = dates[1];
            // }
            fetch_data(search,dates,from_date,to_date);
       });
       $(".search_payment_go").on('click', function() {
            //    alert();
            var dates = ($("#dates").val());
            var search = $('#exam_search').val();
            var from_date = '';
            var to_date = '';
            // if (dates != '') {
            //     dates = dates.split('To');
            //     from_date = dates[0];
            //     to_date = dates[1];
            // }
            fetch_data(search,dates,from_date,to_date);
        });
   
    });
        </script>
        @endsection