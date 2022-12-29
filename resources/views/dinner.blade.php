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
                        <div id="msginsert">
                        </div>
                        <div class="row">
                            <?php $i=0; ?>
                            {{--@foreach ($menulist as $menu)--}}
                            <div class="col-lg-12 col-md- my-4">
                               
                                <div class="card h-100">
                                    <div class="bg-warning text-white card-header"><img src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg"
                                                            alt="image" class="px-1" width="25px" height="22px" />Dinner</div>
                                    <div class="card-body">
                                   
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
                                            Vendor Name
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
                                    @foreach($menu as $dinner)
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
                                            
                                            @if($dinner->vendor_name != null)
                                                {{$dinner->vendor_name}}
                                            @else
                                                <?php echo 'Owned'; ?> 
                                            @endif
                                        </td>
                                        <td>
                                        @if($dinner->status==1)

                                            <!-- <input type='checkbox' class='form-control-input' checked id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> -->
                                            <label class="switchicon">
                                            <input type="checkbox" checked class="custom-control-input" id='customclass_{{$dinner->menu_id}}' data_status="{{$dinner->status}}" value="{{$dinner->menu_id}}">
                                            <span class="slidericon"></span>
                                            </label>
                                            @else
                                            <!-- <input type='checkbox' class='form-control-input' id='customclass_{{$dinner->menu_id}}' value="{{$dinner->menu_id}}"> -->
                                            <label class="switchicon">
                                            <input type="checkbox" class="custom-control-input" id='customclass_{{$dinner->menu_id}}' data_status="{{$dinner->status}}" value="{{$dinner->menu_id}}">
                                            <span class="slidericon"></span>
                                            </label>
                                            @endif
                                        </td>
                                        <td>
                                        <a class="text-danger" data-toggle="modal" data-target="#editModal_{{$dinner->menu_id}}"> <i class="bi bi-pencil-square  text-success px-2 "></i></a>
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
                                                                    <form method="post" action="{{route('update.dinner')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                    
                                                                    <div class="modal-body">
                                                                        
                                                                        
                                                                        <div class="form-group">
                                                                            <label  class="col-sm-3 col-form-label pr-0">Menu Name</label>
                                                                            
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
                            <div  class="card-footer clearfix" data-page="{{$menu->currentPage()}}" id="event_pagination">
                                {{ $menu->links() }}
                            </div>
                                    </div>
                                </div>
                            </div>
                           
                                   </div>
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
                    if (data.code == "404") {
                        setTimeout(function() {
                            $('#msginsert').html('<div class="alert alert-danger">' + data.msg + '</div>');
                        },5000);
                        
                    } else {
                        setTimeout(function() {
                            $('#msginsert').html('<div class="alert alert-success">Menu Updated Successfully</div>');
                        },5000);
                    }
                    // alert(data);
                    //window.location.reload(true); 

                }
            });
        });
       
        </script>
        @endsection