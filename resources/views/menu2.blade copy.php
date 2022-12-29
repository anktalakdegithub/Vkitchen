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
                                <h4 class="card-title">Menu List</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('add_menu2')}}" class="btn btn-primary mb-2 float-right">Add
                                    Menu</a>
                            </div>
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

                        <div class="row ">
                            @foreach ($menulist as $menu)
                            <div class="col-lg-3 col-md-4 my-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul>
                                                    <h4>
                                                    <img src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg" alt="image" width="25px"
                                                height="25px" />   Breakfast
                                                    </h4>
                                                    @if($menu->menu_type=='Breakfast')
                                                    <li>
                                                        <p>{{$menu->menu_name}}</p>
                                                    </li>
                                                    @endif
                                                    <h4>
                                                    <img src="{{asset('web/')}}/images/kitchen/item-60fbc8a3c195e.jpeg" alt="image" width="25px"
                                                height="25px" />   Lunch
                                                    </h4>
                                                    @if($menu->menu_type=='Lunch')
                                                    <li>
                                                        <p>{{$menu->menu_name}}</p>
                                                    </li>
                                                    @endif
                                                    <h4>
                                                    <img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg" alt="image" width="25px"
                                                height="25px" />  Dinner
                                                    </h4>
                                                    @if($menu->menu_type=='Dinner')
                                                    <li>
                                                        <p>{{$menu->menu_name}}</p>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between">
                                            <img class="mb-2" src="{{url('upload/'.$menu->file_upload)}}" alt="image"
                                                width="36px" height="36px" style="border-radius: 20px;" />
                                            <h4 class="card-title mb-3">{{$menu->menu_name}}</h4>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- <div class="d-flex justify-content-between mb-4"> -->
                                                        <div class="mb-4">
                                                            <div>{{$menu->menu_type}}</div>
                                                            <!-- <div class="text-muted">₹{{$menu->menu_price}}</div> -->
                                                            <a class="text-danger" data-toggle="modal"
                                                                data-target="#deleteModal_{{$menu->menu_id}}">
                                                                <i
                                                                    class="bi bi-trash text-danger float-right px-2 booticon"></i>

                                                            </a>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModal_{{$menu->menu_id}}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Are Sure
                                                                                You Want Delete?
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="button"
                                                                                class="btn btn-primary menu_del"
                                                                                value="{{$menu->menu_id}}">Delete</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end Modal -->
                                                            <a href="edit_menu/menu_id={{$menu->menu_id}}">
                                                                <!-- <a href="edit_menu"> -->
                                                                <i
                                                                    class="bi bi-pencil-square text-success float-right booticon"></i>
                                                            </a>

                                                        </div>



                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection
        @section('scripts')
        <script>
        $('body').on('click', '.menu_del', function() {
            //debugger
            var menu_id = $(this).val();
            $.ajax({

                url: "destroy_menu",
                data: {
                    'menu_id': menu_id,
                    _token: '{{ csrf_token() }}'
                },
                type: 'post',
                success: function(response) {
                    location.reload();
                }
            })
        })
        </script>
        @endsection