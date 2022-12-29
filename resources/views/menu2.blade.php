@extends('layouts.main')
@section('main-container')
<style>
    .switchicon {
  position: relative;
  display: inline-block;
  /* width: 60px;
  height: 34px; */
  width: 45px;
    height: 20px;
}

.switchicon input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slidericon {
    border-radius: 20px;
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slidericon:before {
    position: absolute;
    content: "";
    height: 19px;
    width: 17px;
    border-radius: 15px;
    top: 0px;
    left: 0px;
    bottom: 2px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked + .slidericon {
  background-color: #2196F3;
}

input:focus + .slidericon {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slidericon:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slidericon.round {
  border-radius: 34px;
}

.slidericon.round:before {
  border-radius: 50%;
}
</style>
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
                        <!-- <div class="row">
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
                        </div> -->
                        <div class="row">
                            <?php $i=0; ?>
                            {{--@foreach ($menulist as $menu)--}}
                            <div class="col-lg-12 col-md- my-4">
                               
                                <div class="card h-100">
                                    <div class="bg-warning text-white card-header"><img src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg"
                                                            alt="image" width="22px" height="22px" />Breakfast</div>
                                    <div class="card-body">
                                    <!-- <h5 class="float-end mb-4"><i class="bi bi-calendar-week"></i> Date:  {{--$menu->menu_date--}}  <a class="text-danger" data-toggle="modal"
                                                                data-target="#deleteModal_{{--$menu->menu_date--}}"><i class="bi bi-trash float-right text-danger" ></i></a></h5> -->
                                    <!-- Modal -->
                                   
                                        <!-- <h3 class="bg-warning text-white card-title"><img src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg"
                                                            alt="image" width="22px" height="22px" /> Breakfast</h3> -->
                                        <!-- <ul>
                                        @foreach($breakArr[$i] as $break)
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                    {{$break->menu_name}}
                                                    </div>
                                                    <div class="col-md-2">
                                                    @if($break->status==1)

                                                    <!-- <input type='checkbox' class='form-control-input' checked id='customclass_{{$break->menu_id}}' value="{{$break->menu_id}}"> --
                                                    <label class="switchicon float-right">
                                                    <input type="checkbox" checked class="custom-control-input" id='customclass_{{$break->menu_id}}' value="{{$break->menu_id}}" data_status="{{$break->status}}">
                                                    <span class="slidericon"></span>
                                                    </label>
                                                    @else
                                                    <!-- <input type='checkbox' class='form-control-input' id='customclass_{{$break->menu_id}}' value="{{$break->menu_id}}"> --
                                                    <label class="switchicon float-right">
                                                    <input type="checkbox" class="custom-control-input" id='customclass_{{$break->menu_id}}' value="{{$break->menu_id}}" data_status="{{$break->status}}">
                                                    <span class="slidericon"></span>
                                                    </label>
                                                    @endif
                                                    </div>
                                                    <div class="col-md-2">
                                                    <a class="text-danger" data-toggle="modal" data-target="#editModal_{{$break->menu_id}}"> <i class="bi bi-pencil-square float-right text-success px-2 "></i></a>
                                            
                                                    </div>
                                                </div>
                                           

                                           
                                           <div class="modal fade" id="editModal_{{$break->menu_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel">Edit Menu
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>

                                                        </div>
                                                    <form method="post" action="{{route('update.menu')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label  class="col-sm-3 col-form-label pr-0">Menu Name</label>
                                                                    
                                                                <select id="Menu Name" name="menu_name"  class="form-control">
                                                                        @foreach ($breakArr[$i] as $menu)
                                                                            @if($menu->menu_name == $break->menu_name)
                                                                            <option selected>{{$menu->menu_name}}</option>
                                                                            @else
                                                                            <option>{{$menu->menu_name}}</option>
                                                                            @endif
                                                                        
                                                                        @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-sm-3 col-form-label pr-0">Menu Price</label>
                                                                <input type="text"
                                                                    class="form-control priceb menu_price"
                                                                    id="menu_price" placeholder="Enter price" name="menu_price"
                                                                    value=" {{$break->menu_price}}" />
                                                                    <input type="hidden" name="menu_id" value="{{$break->menu_id}}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-sm-3 col-form-label pr-0">Menu Image</label>
                                                                <input type="file"
                                                                    class="form-control priceb menu_price" name="menu_image"
                                                                    id="menu_price" 
                                                                    value=" {{$break->file_upload}}" />

                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <!-- <button type="button"
                                                                class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button> --
                                                            <button type="submit"
                                                                class="btn btn-primary menu_del"
                                                                value="{{--$menu->menu_date--}}">Update</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end Modal --
                                            </li>
                                           @endforeach
                                        </ul> -->
                                        <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                       
                                        <th>
                                            Menu Name
                                        </th>
                                        <th>
                                            Menu Price
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                       
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="data_order"> 
                                    <?php $j=1;?>
                                    @foreach($breakArr[$i] as $dinner)
                                    <tr>
                                        <td>
                                            {{$j++}}
                                        </td>
                                        <td>
                                            {{$dinner->menu_name}}
                                        </td>
                                        <td>
                                            {{$dinner->menu_price}}
                                        </td>
                                        <td>
                                        @if($dinner->status==1)

                                            <!-- <input type='checkbox' class='form-control-input' checked id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> -->
                                            <label class="switchicon float-right">
                                            <input type="checkbox" checked class="custom-control-input" id='customclass_{{$dinner->menu_id}}' data_status="{{$dinner->status}}" value="{{$dinner->menu_id}}">
                                            <span class="slidericon"></span>
                                            </label>
                                            @else
                                            <!-- <input type='checkbox' class='form-control-input' id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> -->
                                            <label class="switchicon float-right">
                                            <input type="checkbox" class="custom-control-input" id='customclass_{{$dinner->menu_id}}' data_status="{{$dinner->status}}" value="{{$dinner->menu_id}}">
                                            <span class="slidericon"></span>
                                            </label>
                                            @endif
                                        </td>
                                        <td>
                                        <a class="text-danger" data-toggle="modal" data-target="#editModal_{{$dinner->menu_id}}"> <i class="bi bi-pencil-square float-right text-success px-2 "></i></a>
                                        <div class="modal fade" id="editModal_{{$dinner->menu_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">Edit Menu
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>

                                                                    </div>
                                                                    <form method="post" action="{{route('update.menu')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                    
                                                                    <div class="modal-body">
                                                                        
                                                                        
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Name</label>
                                                                                
                                                                            <!-- <select id="Menu Name"  class="form-control" name="menu_name">
                                                                                    @foreach ($dinnerArr[$i] as $menu)
                                                                                        @if($menu->menu_name == $dinner->menu_name)
                                                                                        <option selected>{{$menu->menu_name}}</option>
                                                                                        @else
                                                                                        <option>{{$menu->menu_name}}</option>
                                                                                        @endif
                                                                                    
                                                                                    @endforeach
                                                                            </select> -->
                                                                            <input type="text"
                                                                                class="form-control priceb menu_name"
                                                                                id="menu_name" placeholder="Enter Menu Name" name="menu_name"
                                                                                value=" {{$dinner->menu_name}}" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Price</label>
                                                                            <input type="text"
                                                                                class="form-control priceb menu_price"
                                                                                id="menu_price" placeholder="Enter price" name="menu_price"
                                                                                value=" {{$dinner->menu_price}}" />
                                                                                <input type="hidden" name="menu_id" value="{{$dinner->menu_id}}">

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Image</label>
                                                                            <input type="file"
                                                                                class="form-control priceb menu_price"
                                                                                id="menu_price" name="menu_image"
                                                                                value=" {{--$dinner->file_upload--}}" />

                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <!-- <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button> -->
                                                                        <button type="submit"
                                                                            class="btn btn-primary menu_del"
                                                                            value="{{--$menu->menu_date--}}">Update</button>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                        </td>
                                        
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                        <!-- <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbc8a3c195e.jpeg"
                                                            alt="image" width="22px" height="22px" /> Lunch</h3>
                                        <ul>
                                                @foreach($lunchArr[$i] as $lunch)
                                                    <li>
                                                        {{$lunch->menu_name}}
                                                    </li>
                                                    @endforeach
                                          
                                        </ul>
                                        <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                            alt="image" width="22px" height="22px" /> Dinner</h3>
                                        <ul>
                                                  @foreach($dinnerArr[$i] as $dinner)
                                                      <li>
                                                        {{$dinner->menu_name}}
                                                    </li>
                                                    @endforeach
                                           
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                            {{--@endforeach--}}
                            <div class="col-lg-12 col-md- my-4">
                               
                               <div class="card h-100">
                               <div class="bg-warning text-white card-header"><img src="{{asset('web/')}}/images/kitchen/item-60fbc8a3c195e.jpeg"
                                                           alt="image" width="22px" height="22px" /> Lunch</div>
                                   <div class="card-body">
                                   <!-- <h5 class="float-end mb-4"><i class="bi bi-calendar-week"></i> Date:  {{--$menu->menu_date--}} <a class="text-danger" data-toggle="modal"
                                                               data-target="#deleteModal_{{--$menu->menu_date--}}"><i class="bi bi-trash float-right text-danger" ></i></a></h5> -->
                                   <!-- Modal -->
                                   <!-- <div class="modal fade" id="deleteModal_{{--$menu->menu_date--}}"
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
                                                        value="{{--$menu->menu_date--}}">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                                           <!-- end Modal -->
                                       <!-- <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg"
                                                           alt="image" width="22px" height="22px" /> Breakfast</h3>
                                       <ul>
                                       @foreach($breakArr[$i] as $break)
                                           <li>
                                           {{$break->menu_name}}
                                           </li>
                                          @endforeach
                                       </ul> -->
                                       <!-- <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbc8a3c195e.jpeg"
                                                           alt="image" width="22px" height="22px" /> Lunch</h3> -->
                                       <!-- <ul>
                                               @foreach($lunchArr[$i] as $lunch)
                                                   <li>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                        {{$lunch->menu_name}}
                                                        </div>
                                                        <div class="col-md-2">
                                                        @if($lunch->status==1)

                                                        <!-- <input type='checkbox' class='form-control-input' checked id='customclass_{{$lunch->menu_id}}' value="{{$lunch->menu_id}}"> --
                                                        <label class="switchicon float-right">
                                                        <input type="checkbox" checked class="custom-control-input" id='customclass_{{$lunch->menu_id}}' value="{{$lunch->menu_id}}">
                                                        <span class="slidericon"></span>
                                                        </label>
                                                        @else
                                                        <!-- <input type='checkbox' class='form-control-input' id='customclass_{{$lunch->menu_id}}' value="{{$lunch->menu_id}}"> --
                                                        <label class="switchicon float-right">
                                                        <input type="checkbox" class="custom-control-input" id='customclass_{{$lunch->menu_id}}' value="{{$lunch->menu_id}}" >
                                                        <span class="slidericon"></span>
                                                        </label>
                                                        @endif
                                                        </div> 
                                                        <div class="col-md-2">
                                                        <a class="text-danger" data-toggle="modal" data-target="#editModal_{{$lunch->menu_id}}"> <i class="bi bi-pencil-square float-right text-success px-2 "></i></a>
                                                        </div>
                                                    </div>
                                                      
                                                      
                                            <div class="modal fade" id="editModal_{{$lunch->menu_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel">Edit Menu
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>

                                                        </div>
                                                    <form id="edit_role_model">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label  class="col-sm-3 col-form-label pr-0">Menu Name</label>
                                                                    
                                                                <select id="Menu Name"  class="form-control">
                                                                        @foreach ($lunchArr[$i] as $menu)
                                                                            @if($menu->menu_name == $lunch->menu_name)
                                                                            <option selected>{{$menu->menu_name}}</option>
                                                                            @else
                                                                            <option>{{$menu->menu_name}}</option>
                                                                            @endif
                                                                        
                                                                        @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-sm-3 col-form-label pr-0">Menu Price</label>
                                                                <input type="text"
                                                                    class="form-control priceb menu_price"
                                                                    id="menu_price" placeholder="Enter price"
                                                                    value=" {{$lunch->menu_price}}" />
                                                                    <input type="hidden" name="menu_id" value="{{$break->menu_id}}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-sm-3 col-form-label pr-0">Menu Image</label>
                                                                <input type="file"
                                                                    class="form-control priceb menu_price"
                                                                    id="menu_price" 
                                                                    value=" {{$lunch->file_upload}}" />

                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <!-- <button type="button"
                                                                class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button> --
                                                            <button type="button"
                                                                class="btn btn-primary menu_del"
                                                                value="{{--$menu->menu_date--}}">Update</button>
                                                        </div>
                                                    
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- end Modal --
                                                   </li>
                                                   @endforeach
                                         
                                       </ul> -->
                                       <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                       
                                        <th>
                                            Menu Name
                                        </th>
                                        <th>
                                            Menu Price
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                       
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="data_order"> 
                                    <?php $k=1;?>
                                    @foreach($lunchArr[$i] as $dinner)
                                    <tr>
                                        <td>
                                            {{$k++}}
                                        </td>
                                        <td>
                                            {{$dinner->menu_name}}
                                        </td>
                                        <td>
                                            {{$dinner->menu_price}}
                                        </td>
                                        <td>
                                        @if($dinner->status==1)

                                            <!-- <input type='checkbox' class='form-control-input' checked id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> -->
                                            <label class="switchicon float-right">
                                                <input type="checkbox" checked class="custom-control-input" id='customclass_{{$dinner->menu_id}}' data_status="{{$dinner->status}}" value="{{$dinner->menu_id}}">
                                                <span class="slidericon"></span>
                                            </label>
                                            @else
                                            <!-- <input type='checkbox' class='form-control-input' id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> -->
                                            <label class="switchicon float-right">
                                                <input type="checkbox" class="custom-control-input" id='customclass_{{$dinner->menu_id}}' data_status="{{$dinner->status}}" value="{{$dinner->menu_id}}">
                                                <span class="slidericon"></span>
                                            </label>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="text-danger" data-toggle="modal" data-target="#editModal_{{$dinner->menu_id}}"> <i class="bi bi-pencil-square float-right text-success px-2 "></i></a>
                                                <div class="modal fade" id="editModal_{{$dinner->menu_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">Edit Menu
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>

                                                                    </div>
                                                                    <form method="post" action="{{route('update.menu')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                    
                                                                    <div class="modal-body">
                                                                        
                                                                        
                                                                    <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Name</label>
                                                                                
                                                                            <!-- <select id="Menu Name"  class="form-control" name="menu_name">
                                                                                    @foreach ($dinnerArr[$i] as $menu)
                                                                                        @if($menu->menu_name == $dinner->menu_name)
                                                                                        <option selected>{{$menu->menu_name}}</option>
                                                                                        @else
                                                                                        <option>{{$menu->menu_name}}</option>
                                                                                        @endif
                                                                                    
                                                                                    @endforeach
                                                                            </select> -->
                                                                            <input type="text"
                                                                                class="form-control priceb menu_name"
                                                                                id="menu_name" placeholder="Enter Menu Name" name="menu_name"
                                                                                value=" {{$dinner->menu_name}}" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Price</label>
                                                                            <input type="text"
                                                                                class="form-control priceb menu_price"
                                                                                id="menu_price" placeholder="Enter price" name="menu_price"
                                                                                value=" {{$dinner->menu_price}}" />
                                                                                <input type="hidden" name="menu_id" value="{{$dinner->menu_id}}">

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Image</label>
                                                                            <input type="file"
                                                                                class="form-control priceb menu_price" name="menu_image"
                                                                                id="menu_price" 
                                                                                value=" {{$dinner->file_upload}}" />

                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <!-- <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button> -->
                                                                        <button type="button"
                                                                            class="btn btn-primary menu_del"
                                                                            value="{{--$menu->menu_date--}}">Update</button>
                                                                    </div>
</form>
                                                                </div>
                                                            </div>
                                                        </div>
                                        </td>
                                        
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                       <!-- <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                           alt="image" width="22px" height="22px" /> Dinner</h3>
                                       <ul>
                                                 @foreach($dinnerArr[$i] as $dinner)
                                                     <li>
                                                       {{$dinner->menu_name}}
                                                   </li>
                                                   @endforeach
                                          
                                       </ul> -->
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-12 col-md-3 my-4">
                               
                               <div class="card h-100">
                               <div class="bg-warning text-white card-header"><img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                           alt="image" width="22px" height="22px" /> Dinner</div>
                                   <div class="card-body">
                                   <!-- <h5 class="float-end mb-4"><i class="bi bi-calendar-week"></i> Date:  {{--$menu->menu_date--}} <a class="text-danger" data-toggle="modal"
                                                               data-target="#deleteModal_{{--$menu->menu_date--}}"><i class="bi bi-trash float-right text-danger" ></i></a></h5> -->
                                   <!-- Modal -->
                                   <!-- <div class="modal fade" id="deleteModal_{{--$menu->menu_date--}}"
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
                                                                               value="{{--$menu->menu_date--}}">Delete</button>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </div> -->
                                                           <!-- end Modal -->
                                       <!-- <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg"
                                                           alt="image" width="22px" height="22px" /> Breakfast</h3>
                                       <ul>
                                       @foreach($breakArr[$i] as $break)
                                           <li>
                                           {{$break->menu_name}}
                                           </li>
                                          @endforeach
                                       </ul>
                                       <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbc8a3c195e.jpeg"
                                                           alt="image" width="22px" height="22px" /> Lunch</h3>
                                       <ul>
                                               @foreach($lunchArr[$i] as $lunch)
                                                   <li>
                                                       {{$lunch->menu_name}}
                                                   </li>
                                                   @endforeach
                                         
                                       </ul> -->
                                       <!-- <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                           alt="image" width="22px" height="22px" /> Dinner</h3> -->
                                       <!-- <ul>
                                                 @foreach($dinnerArr[$i] as $dinner)
                                                     <li>
                                                     <div class="row">
                                                        <div class="col-md-8">
                                                        {{$dinner->menu_name}}
                                                        </div>
                                                        <div class="col-md-2">
                                                        @if($dinner->status==1)

                                                        <!-- <input type='checkbox' class='form-control-input' checked id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> --
                                                        <label class="switchicon float-right">
                                                        <input type="checkbox" checked class="custom-control-input" id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}">
                                                        <span class="slidericon"></span>
                                                        </label>
                                                        @else
                                                        <!-- <input type='checkbox' class='form-control-input' id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> --
                                                        <label class="switchicon float-right">
                                                        <input type="checkbox" class="custom-control-input" id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}">
                                                        <span class="slidericon"></span>
                                                        </label>
                                                        @endif
                                                        </div> 
                                                        <div class="col-md-2">
                                                        <a class="text-danger" data-toggle="modal" data-target="#editModal_{{$dinner->menu_id}}"> <i class="bi bi-pencil-square float-right text-success px-2 "></i></a>
                                                        </div>
                                                    </div>
                                                      
                                                      
                                            <div class="modal fade" id="editModal_{{$dinner->menu_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel">Edit Menu
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>

                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                        <div class="form-group">
                                                                <label  class="col-sm-3 col-form-label pr-0">Menu Name</label>
                                                                    
                                                                <select id="Menu Name"  class="form-control">
                                                                        @foreach ($dinnerArr[$i] as $menu)
                                                                            @if($menu->menu_name == $dinner->menu_name)
                                                                            <option selected>{{$menu->menu_name}}</option>
                                                                            @else
                                                                            <option>{{$menu->menu_name}}</option>
                                                                            @endif
                                                                        
                                                                        @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-sm-3 col-form-label pr-0">Menu Price</label>
                                                                <input type="text"
                                                                    class="form-control priceb menu_price"
                                                                    id="menu_price" placeholder="Enter price"
                                                                    value=" {{$dinner->menu_price}}" />
                                                                    <input type="hidden" name="menu_id" value="{{$break->menu_id}}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-sm-3 col-form-label pr-0">Menu Image</label>
                                                                <input type="file"
                                                                    class="form-control priceb menu_price"
                                                                    id="menu_price" 
                                                                    value=" {{$dinner->file_upload}}" />

                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <!-- <button type="button"
                                                                class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button> --
                                                            <button type="button"
                                                                class="btn btn-primary menu_del"
                                                                value="{{--$menu->menu_date--}}">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end Modal --
                                                   </li>
                                                   @endforeach
                                          
                                       </ul> -->
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <!-- <th>
                                           Order ID
                                        </th> -->
                                        <th>
                                            Menu Name
                                        </th>
                                        <th>
                                            Menu Price
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                       
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="data_order"> 
                                    <?php $l=1;?>
                                    @foreach($dinnerArr[$i] as $dinner)
                                    <tr>
                                        <td>
                                            {{$l++}}
                                        </td>
                                        <td>
                                            {{$dinner->menu_name}}
                                        </td>
                                        <td>
                                            {{$dinner->menu_price}}
                                        </td>
                                        <td>
                                        @if($dinner->status==1)

                                            <!-- <input type='checkbox' class='form-control-input' checked id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> -->
                                            <label class="switchicon float-right">
                                            <input type="checkbox" checked class="custom-control-input" id='customclass_{{$dinner->menu_id}}' data_status="{{$dinner->status}}" value="{{$dinner->menu_id}}">
                                            <span class="slidericon"></span>
                                            </label>
                                            @else
                                            <!-- <input type='checkbox' class='form-control-input' id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> -->
                                            <label class="switchicon float-right">
                                            <input type="checkbox" class="custom-control-input" id='customclass_{{$dinner->menu_id}}' data_status="{{$dinner->status}}" value="{{$dinner->menu_id}}">
                                            <span class="slidericon"></span>
                                            </label>
                                            @endif
                                        </td>
                                        <td>
                                        <a class="text-danger" data-toggle="modal" data-target="#editModal_{{$dinner->menu_id}}"> <i class="bi bi-pencil-square float-right text-success px-2 "></i></a>
                                        <div class="modal fade" id="editModal_{{$dinner->menu_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">Edit Menu
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>

                                                                    </div>
                                                                <form method="post" action="{{route('update.menu')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                    
                                                                    <div class="modal-body">
                                                                        
                                                                        
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Name</label>
                                                                                
                                                                            <!-- <select id="Menu Name"  class="form-control" name="menu_name">
                                                                                    @foreach ($dinnerArr[$i] as $menu)
                                                                                        @if($menu->menu_name == $dinner->menu_name)
                                                                                        <option selected>{{$menu->menu_name}}</option>
                                                                                        @else
                                                                                        <option>{{$menu->menu_name}}</option>
                                                                                        @endif
                                                                                    
                                                                                    @endforeach
                                                                            </select> -->
                                                                            <input type="text"
                                                                                class="form-control priceb menu_name"
                                                                                id="menu_name" placeholder="Enter Menu Name" name="menu_name"
                                                                                value=" {{$dinner->menu_name}}" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Price</label>
                                                                            <input type="text"
                                                                                class="form-control priceb menu_price"
                                                                                id="menu_price" placeholder="Enter price" name="menu_price"
                                                                                value=" {{$dinner->menu_price}}" />
                                                                                <input type="hidden" name="menu_id" value="{{$dinner->menu_id}}">

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Image</label>
                                                                            <input type="file"
                                                                                class="form-control priceb menu_price"name="menu_image"
                                                                                id="menu_price" 
                                                                                value=" {{$dinner->file_upload}}" />

                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <!-- <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button> -->
                                                                        <button type="button"
                                                                            class="btn btn-primary menu_del"
                                                                            value="{{--$menu->menu_date--}}">Update</button>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                        </td>
                                        
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-12 col-md-3. my-4">
                               
                               <div class="card h-100">
                               <div class="bg-warning text-white card-header"><img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                           alt="image" width="22px" height="22px" /> Snacks</div>
                                   <div class="card-body">
                                   <!-- <h5 class="float-end mb-4"><i class="bi bi-calendar-week"></i> Date:  {{--$menu->menu_date--}} <a class="text-danger" data-toggle="modal"
                                                               data-target="#deleteModal_{{--$menu->menu_date--}}"><i class="bi bi-trash float-right text-danger" ></i></a></h5> -->
                                   <!-- Modal -->
                                   <!-- <div class="modal fade" id="deleteModal_{{--$menu->menu_date--}}"
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
                                                                               value="{{--$menu->menu_date--}}">Delete</button>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </div> -->
                                                           <!-- end Modal -->
                                       <!-- <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg"
                                                           alt="image" width="22px" height="22px" /> Breakfast</h3>
                                       <ul>
                                       @foreach($breakArr[$i] as $break)
                                           <li>
                                           {{$break->menu_name}}
                                           </li>
                                          @endforeach
                                       </ul>
                                       <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbc8a3c195e.jpeg"
                                                           alt="image" width="22px" height="22px" /> Lunch</h3>
                                       <ul>
                                               @foreach($lunchArr[$i] as $lunch)
                                                   <li>
                                                       {{$lunch->menu_name}}
                                                   </li>
                                                   @endforeach
                                         
                                       </ul> -->
                                       <!-- <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                           alt="image" width="22px" height="22px" /> Dinner</h3> -->
                                        <!-- <ul>
                                            @foreach($dinnerArr[$i] as $dinner)
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            {{$dinner->menu_name}}
                                                        </div>
                                                        <div class="col-md-2">
                                                            @if($dinner->status==1)

                                                            <!-- <input type='checkbox' class='form-control-input' checked id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> --
                                                            <label class="switchicon float-right">
                                                            <input type="checkbox" checked class="custom-control-input" id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}">
                                                            <span class="slidericon"></span>
                                                            </label>
                                                            @else
                                                            <!-- <input type='checkbox' class='form-control-input' id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> --
                                                            <label class="switchicon float-right">
                                                            <input type="checkbox" class="custom-control-input" id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}">
                                                            <span class="slidericon"></span>
                                                            </label>
                                                            @endif
                                                        </div> 
                                                        <div class="col-md-2">
                                                            <a class="text-danger" data-toggle="modal" data-target="#editModal_{{$dinner->menu_id}}"> <i class="bi bi-pencil-square float-right text-success px-2 "></i></a>
                                                        </div>
                                                    </div>
                                                      
                                                      
                                                        <div class="modal fade" id="editModal_{{$dinner->menu_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">Edit Menu
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>

                                                                    </div>
                                                                    <div class="modal-body">
                                                                        
                                                                        
                                                                    <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Name</label>
                                                                                
                                                                            <select id="Menu Name"  class="form-control">
                                                                                    @foreach ($dinnerArr[$i] as $menu)
                                                                                        @if($menu->menu_name == $dinner->menu_name)
                                                                                        <option selected>{{$menu->menu_name}}</option>
                                                                                        @else
                                                                                        <option>{{$menu->menu_name}}</option>
                                                                                        @endif
                                                                                    
                                                                                    @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Price</label>
                                                                            <input type="text"
                                                                                class="form-control priceb menu_price"
                                                                                id="menu_price" placeholder="Enter price"
                                                                                value=" {{$dinner->menu_price}}" />
                                                                                <input type="hidden" name="menu_id" value="{{$break->menu_id}}">

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Image</label>
                                                                            <input type="file"
                                                                                class="form-control priceb menu_price"
                                                                                id="menu_price" 
                                                                                value=" {{$dinner->file_upload}}" />

                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <!-- <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button> --
                                                                        <button type="button"
                                                                            class="btn btn-primary menu_del"
                                                                            value="{{--$menu->menu_date--}}">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end Modal --
                                                </li>
                                            @endforeach
                                          
                                        </ul> -->
                                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <!-- <th>
                                           Order ID
                                        </th> -->
                                        <th>
                                            Menu Name
                                        </th>
                                        <th>
                                            Menu Price
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                       
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="data_order"> 
                                    <?php $m=1;?>
                                    @foreach($snacksArr[$i] as $dinner)
                                    <tr>
                                        <td>
                                            {{$m++}}
                                        </td>
                                        <td>
                                            {{$dinner->menu_name}}
                                        </td>
                                        <td>
                                            {{$dinner->menu_price}}
                                        </td>
                                        <td>
                                        @if($dinner->status==1)

                                            <!-- <input type='checkbox' class='form-control-input' checked id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> -->
                                            <label class="switchicon float-right">
                                            <input type="checkbox" checked class="custom-control-input" id='customclass_{{$dinner->menu_id}}' data_status="{{$dinner->status}}" value="{{$dinner->menu_id}}">
                                            <span class="slidericon"></span>
                                            </label>
                                            @else
                                            <!-- <input type='checkbox' class='form-control-input' id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> -->
                                            <label class="switchicon float-right">
                                            <input type="checkbox" class="custom-control-input" id='customclass_{{$dinner->menu_id}}' data_status="{{$dinner->status}}" value="{{$dinner->menu_id}}">
                                            <span class="slidericon"></span>
                                            </label>
                                            @endif
                                        </td>
                                        <td>
                                        <a class="text-danger" data-toggle="modal" data-target="#editModal_{{$dinner->menu_id}}"> <i class="bi bi-pencil-square float-right text-success px-2 "></i></a>
                                        <div class="modal fade" id="editModal_{{$dinner->menu_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">Edit Menu
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>

                                                                    </div>
                                                                    <form method="post" action="{{route('update.menu')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                    
                                                                    <div class="modal-body">
                                                                        
                                                                        
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Name</label>
                                                                                
                                                                            <!-- <select id="Menu Name" name="menu_menu"  class="form-control">
                                                                                    @foreach ($dinnerArr[$i] as $menu)
                                                                                        @if($menu->menu_name == $dinner->menu_name)
                                                                                        <option selected>{{$menu->menu_name}}</option>
                                                                                        @else
                                                                                        <option>{{$menu->menu_name}}</option>
                                                                                        @endif
                                                                                    
                                                                                    @endforeach
                                                                            </select> -->
                                                                            <input type="text"
                                                                                class="form-control priceb menu_name"
                                                                                id="menu_name" placeholder="Enter Menu Name" name="menu_name"
                                                                                value=" {{$dinner->menu_name}}" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Price</label>
                                                                            <input type="text"
                                                                                class="form-control priceb menu_price"
                                                                                id="menu_price" placeholder="Enter price" name="menu_price"
                                                                                value=" {{$dinner->menu_price}}" />
                                                                                <input type="hidden" name="menu_id" value="{{$dinner->menu_id}}">

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Image</label>
                                                                            <input type="file"
                                                                                class="form-control priceb menu_price" name="menu_image"
                                                                                id="menu_price" 
                                                                                value=" {{$dinner->file_upload}}" />

                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <!-- <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button> -->
                                                                        <button type="button"
                                                                            class="btn btn-primary menu_del"
                                                                            value="{{--$menu->menu_date--}}">Update</button>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                        </td>
                                        
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                                   </div>
                               </div>
                           </div>
                            <!-- <div class="col-lg-4 col-md-4">
                                <h5 class="float-end">Date: 22 May 2022</h5>
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg"
                                                            alt="image" width="22px" height="22px" /> Breakfast</h3>
                                        <ul>
                                            <li>
                                                Breakfast1
                                            </li>
                                            <li>
                                                Breakfast2
                                            </li>
                                        </ul>
                                        <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbc8a3c195e.jpeg"
                                                            alt="image" width="22px" height="22px" /> Lunch</h3>
                                        <ul>
                                            <li>
                                                Lunch1
                                            </li>
                                            <li>
                                                Lunch2
                                            </li>
                                        </ul>
                                        <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                            alt="image" width="22px" height="22px" /> Dinner</h3>
                                        <ul>
                                            <li>
                                                Dinner1
                                            </li>
                                            <li>
                                                Dinner2
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <h5 class="float-end">Date: 21 May 2022</h5>
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg"
                                                            alt="image" width="22px" height="22px" /> Breakfast</h3>
                                        <ul>
                                            <li>
                                                Breakfast1
                                            </li>
                                            <li>
                                                Breakfast2
                                            </li>
                                        </ul>
                                        <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbc8a3c195e.jpeg"
                                                            alt="image" width="22px" height="22px" /> Lunch</h3>
                                        <ul>
                                            <li>
                                                Lunch1
                                            </li>
                                            <li>
                                                Lunch2
                                            </li>
                                        </ul>
                                        <h3 class="bg-warning text-white"><img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                            alt="image" width="22px" height="22px" /> Dinner</h3>
                                        <ul>
                                            <li>
                                                Dinner1
                                            </li>
                                            <li>
                                                Dinner2
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>

        @endsection
        @section('scripts')
        <script>
        // $('body').on('click', '.menu_del', function() {
        //     //debugger
        //     var menu_date = $(this).val();
        //     $.ajax({

        //         url: "destroy_menu",
        //         data: {
        //             'menu_date': menu_date,
        //             _token: '{{ csrf_token() }}'
        //         },
        //         type: 'post',
        //         success: function(response) {
        //             location.reload();
        //         }
        //     })
        // })
        $('body').on('click', '.custom-control-input', function(){

            // alert("hii");
            var menue_id=$(this).val();
            
            var data_status = $(this).attr('data_status');
            // alert(slider_id);
            $.ajax({
                url: "change_status",
                type  : "POST",
                data  : { 
                    "_token": "{{ csrf_token() }}",
                    menue_id: menue_id,menu_status: data_status
                }, 
                
                success: function(data){
                    alert(data);
                    //window.location.reload(true); 

                }
            });
        });
        // $('body').on('click', '.update', function(){

        //     // alert("hii");
        //     // var menue_id=$(this).val();

        //     // var data_status = $(this).attr('data_status');
        //     // alert(slider_id);
        //     // var menu_name=$('.menu_name').val();
        //     // var    menu_price=$('.menu_price').val();
        //     // var    menu_type=$('.menu_type').val();
        //     //     // menuimg.push($('.menu_image').eq(i).val());
        //     //     // menuimg.push($('#breakimage_'+(i + 1)).get(0).files[i]);
        //     //     var image=$('#multiFiles').get(0).files[0];
        //     let form = document.querySelector('#edit_menu_model');
        //     let data = new FormData(form);
        //     $.ajax({
        //         url: "update_menu",
        //         type  : "POST",
        //         data: data,
        //         processData: false,
        //         contentType: false,
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
                
        //         success: function(data){
        //             alert(data);
        //             //window.location.reload(true); 

        //         }
        //     });
        // });
        </script>
        @endsection