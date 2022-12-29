<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kitchen POS Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('web/')}}/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="{{asset('web/')}}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('web/')}}/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="{{asset('web/')}}/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('web/')}}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('web/')}}/images/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <!-- <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"> -->

    <style>
        .tab-content {
            border: 1px solid #e8eff9;
            border-top: 0;
            padding: 0rem 0rem;
            text-align: justify;
        }
        .btn-block {
            /* display: block; */
            width: 100%;
            /* height: 67px; */
        }
        .table th, .table td {
        /* #td { */
            padding: 0.25rem 0.9375rem;
            vertical-align: middle;
            border-top: 1px solid #e8eff9;
        }
        .form-group {
            margin-bottom: 0.5rem;
        }
        /* .h-100 {
            height: 50% !important;
        } */
        .img-fluid {
            max-width: 100%;
            /* height: auto; */
        }
    .tabledemo {
        width: 7em;
    }
    .btn-warning:hover{
        /* border-color:black!important; */
        box-shadow: none;
        background-color: #eae4dd;
    }
    .btn-warning {
        color: #212529;
        background-color: #b1aeab;
        border-color: #0a00ff;
    }
    .active:focus,.btn:hover,.btn:focus {
        border-color:black!important;
        box-shadow: none;
    }
    .btn-warning:not(:disabled):not(.disabled):active, .btn-warning:not(:disabled):not(.disabled).active, .show > .btn-warning.dropdown-toggle {
        color: #000;
        background-color: #ff0000;
        /* border-color: 2px solid #f2125e!important; */
        box-shadow: none;
        border: 2px solid #f2125e;
    }
        span {cursor:pointer; }
		/* .number{
			margin:100px;
		} */
		.minus, .plus{
			width:20px;
			height:34px;
			background:#f2f2f2;
			border-radius:4px;
			padding:8px 5px 8px 5px;
			border:1px solid #ddd;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
		}
		#input{
			height:34px;
            width: 65px;
            text-align: center;
            /* font-size: 26px; */
			border:1px solid #ddd;
			border-radius:4px;
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>

<body id="myvideo">
<div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <!-- <a class="navbar-brand brand-logo" href="index.php"><img src="{{asset('web/')}}/images/logo.svg" alt="logo"/></a> -->
          <a class="navbar-brand brand-logo text-primary" href="{{url('/')}}">Kitchen</a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="{{asset('web/')}}/images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
          <a onclick="openFullscreen();"><i class="bi bi-fullscreen"></i></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <ul class="navbar-nav mr-lg-2">
  
          </ul>
          <ul class="navbar-nav navbar-nav-right">
           
          
           
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
                <i class="typcn typcn-user-outline mr-0"></i>
                <span class="nav-profile-name">{{ auth()->user()->name }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <!-- <a class="dropdown-item">
                <i class="typcn typcn-cog text-primary"></i>
                Settings
                </a> -->
                <a class="dropdown-item" href="{{url('logout')}}">
                <i class="typcn typcn-power text-primary"></i>
                Logout
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <!-- <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div> -->
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close typcn typcn-delete-outline"></i>
        
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
         
            <p class="sidebar-menu-title">Dash menu</p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard </span>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui_order" aria-expanded="false" aria-controls="ui_order">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Order</span>
              <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="ui_order">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/order')}}">Add Order</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="{{url('/snack_order')}}">Add Snack Order</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="{{url('/order_list')}}">Order List</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="">Cheques</a></li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu_order" aria-expanded="false" aria-controls="menu_order">
            <!-- <a class="nav-link" href="#menu_order"> -->
            <!-- <a class="nav-link" href="{{url('/menu2')}}"> -->
              <i class="typcn typcn-compass menu-icon"></i>
              <span class="menu-title">Menus</span>
              <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="menu_order">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/breakfast')}}">Brekfast</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/lunch')}}">Lunch</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/dinner')}}">Dinner</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/snacks')}}">Snacks</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/customer')}}">
              <i class="typcn typcn-user menu-icon"></i>
              <span class="menu-title">Customer </span>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="{{url('/payment')}}">
              <i class="typcn typcn-chart-pie-outline menu-icon"></i>
              <span class="menu-title">Payment </span>
            </a>
          </li>
          
        
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#vendor_order" aria-expanded="false" aria-controls="vendor_order">
            <!-- <a class="nav-link" href="#menu_order"> -->
            <!-- <a class="nav-link" href="{{url('/menu2')}}"> -->
            <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Vendor</span>
              <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="vendor_order">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/vendor_list')}}">Vendor List</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/vendor_commission')}}">Vendor Commission</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="{{url('/dinner')}}">Dinner</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/snacks')}}">Snacks</a></li> -->
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{url('/expense')}}">
              <i class="typcn typcn-chart-pie-outline menu-icon"></i>
              <span class="menu-title">Expenses </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
              <i class="typcn typcn-briefcase menu-icon"></i>
              <span class="menu-title">Report</span>
              <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <!-- <li class="nav-item"> <a class="nav-link" href="{{url('/report')}}">Report</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="{{url('/menu_report')}}">Menu Report</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/sales')}}">Sale Report</a></li>
              </ul>
            </div>
          </li>
      </nav>
      <div class="container-fluid">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-order-tab" data-toggle="pill" data-target="#pills-order" type="button" role="tab" aria-controls="pills-order" aria-selected="true">Orders</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-snacks-tab" data-toggle="pill" data-target="#pills-snacks" type="button" role="tab" aria-controls="pills-snacks" aria-selected="false">Snacks Order</button>
            </li>
            <!-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
            </li> -->
        </ul>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab">
                <div class="row">
                    <!-- <div class="content-wrapper"> -->
                        <div class="row">
                            <div class="col-lg-7 col-md-12 col-sm-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-light btn-block text-left"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapseOne" aria-expanded="true"
                                                                    aria-controls="collapseOne">
                                                                    Breakfast
                                                                    <i class="bi bi-chevron-down float-right"></i>
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show"
                                                            aria-labelledby="headingOne" >
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @foreach ($menuArr as $menu)
                                                                    <div class="col-md-3 mt-3">
                                                                        <div class="card h-100">
                                                                            <div class="card-body p-2 containercart">
                                                                                <input type="hidden" class="breakfast"
                                                                                    value="{{$menu->menu_id}}">
                                                                                <img src="{{url('upload/'.$menu->file_upload)}}"
                                                                                    alt="" height="145px"
                                                                                    class="img-fluid imagecart">
                                                                                <div class="overlaycart">
                                                                                    <a href="#"
                                                                                        class="carticon cartitem"
                                                                                        title="User Profile"
                                                                                        data-id="{{$menu->menu_id}}">
                                                                                        <i class="bi bi-cart4"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="card-title my-2">
                                                                                    {{$menu->menu_name}}</h5>
                                                                                <h5 class="card-text">
                                                                                    ₹{{$menu->menu_price}}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-light btn-block text-left"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapseOnee" aria-expanded="true"
                                                                    aria-controls="collapseOnee">
                                                                    Regular Item <i
                                                                        class="bi bi-chevron-down float-right"></i>
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOnee" class="collapse"
                                                            aria-labelledby="headingOne"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @foreach ($menuArray as $menuo)
                                                                    <div class="col-md-3 mt-3">
                                                                        <div class="card h-100">
                                                                            <div class="card-body p-2 containercart">
                                                                                <input type="hidden" class="breakfast"
                                                                                    value="{{$menuo->menu_id}}">
                                                                                <img src="{{url('upload/'.$menuo->file_upload)}}"
                                                                                    alt="" height="145px"
                                                                                    class="img-fluid imagecart">
                                                                                <div class="overlaycart">
                                                                                    <a href="#"
                                                                                        class="carticon cartitem"
                                                                                        title="User Profile"
                                                                                        data-id="{{$menuo->menu_id}}">
                                                                                        <i class="bi bi-cart4"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="card-title my-2">
                                                                                    {{$menuo->menu_name}}</h5>
                                                                                <h5 class="card-text">
                                                                                    ₹{{$menuo->menu_price}}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="card">
                                                        <div class="card-header" id="headingTwo">
                                                            <h2 class="mb-0">
                                                                <button
                                                                    class="btn btn-light btn-block text-left collapsed"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapseTwo" aria-expanded="false"
                                                                    aria-controls="collapseTwo">
                                                                    Dinner <i
                                                                        class="bi bi-chevron-down float-right"></i>
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse show"
                                                            aria-labelledby="headingTwo">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @foreach ($menuArrays as $menus)
                                                                    <div class="col-md-3 mt-3">
                                                                        <div class="card h-100">
                                                                            <div class="card-body p-2 containercart">
                                                                                <input type="hidden" class="breakfast"
                                                                                    value="{{$menus->menu_id}}">
                                                                                <img src="{{url('upload/'.$menus->file_upload)}}"
                                                                                    alt="" height="145px"
                                                                                    class="img-fluid imagecart">
                                                                                <div class="overlaycart">
                                                                                    <a href="#"
                                                                                        class="carticon cartitem"
                                                                                        title="User Profile"
                                                                                        data-id="{{$menus->menu_id}}">
                                                                                        <i class="bi bi-cart4"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="card-title my-2">
                                                                                    {{$menus->menu_name}}</h5>
                                                                                <h5 class="card-text">
                                                                                    ₹{{$menus->menu_price}}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header" id="headingThree">
                                                            <h2 class="mb-0">
                                                                <button
                                                                    class="btn btn-light btn-block text-left collapsed"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapseThree" aria-expanded="false"
                                                                    aria-controls="collapseThree">
                                                                    Lunch <i class="bi bi-chevron-down float-right"></i>
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseThree" class="collapse show"
                                                            aria-labelledby="headingThree">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @foreach ($menuArrayss as $menul)
                                                                    <div class="col-md-3 mt-3">
                                                                        <div class="card h-100">
                                                                            <div class="card-body p-2 containercart">
                                                                                <input type="hidden" class="breakfast"
                                                                                    value="{{$menul->menu_id}}">
                                                                                <img src="{{url('upload/'.$menul->file_upload)}}"
                                                                                    alt="" height="145px"
                                                                                    class="img-fluid imagecart">
                                                                                <div class="overlaycart">
                                                                                    <a href="#"
                                                                                        class="carticon cartitem"
                                                                                        title="User Profile"
                                                                                        data-id="{{$menul->menu_id}}">
                                                                                        <i class="bi bi-cart4"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="card-title my-2">
                                                                                    {{$menul->menu_name}}</h5>
                                                                                <h5 class="card-text">
                                                                                    ₹{{$menul->menu_price}}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach


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
                            <div class="col-lg-5 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">


                                        <div class="row p-0">
                                            <div class="col-md-12">
                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link active" id="pills-home-tab"
                                                            data-toggle="pill" href="#pills-home" role="tab"
                                                            aria-controls="pills-home" aria-selected="true">Add
                                                            Order</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                                            href="#pills-profile" role="tab"
                                                            aria-controls="pills-profile" aria-selected="false">Active
                                                            Order</a>
                                                    </li>
                                                    <!-- <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="pills-order-tab" data-toggle="pill"
                                                            href="{{url('snack_order')}}" role="tab" aria-controls="pills-snacks"
                                                            aria-selected="false">Snacks Order</a>
                                                    </li> -->
                                                    <!-- <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="pills-order-tab" data-toggle="pill"
                                                            href="#pills-order" role="tab" aria-controls="pills-order"
                                                            aria-selected="false">Subscription Order</a>
                                                    </li> -->

                                                </ul>
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-home"
                                                        role="tabpanel" aria-labelledby="pills-home-tab">
                                                        <!--  -->
                                                        <!--  -->

                                                        
                                                        <div class="row mb-2">
                                                            <div class="table-responsive">
                                                                <table class="table table-clear" id="tbUser">
                                                                    <thead>
                                                                        <th>Item</th>
                                                                        <!-- <th>Price</th> -->
                                                                        <th>Qty</th>
                                                                        <th>Total</th>
                                                                        <th>Action</th>
                                                                    </thead>
                                                                    <tbody class="carttable">

                                                                        <!-- <tr>
                                                        <td class="left pl-0">

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                                        width="60px" height="60px" alt="">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <strong>Lorem ipsum dolor sit, </strong>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="left px-0">
                                                            <strong>₹ 300</strong>
                                                        </td>
                                                        <td class="left px-0">
                                                            <div class="col-md-12 d-flex">
                                                                <button class="btn btn-success btn-sm"
                                                                    onclick="increment()">+</button>
                                                                <input id=demoInput type=number min=1 max=110
                                                                    style="width:50px;">
                                                                <button class="btn btn-primary btn-sm"
                                                                    onclick="decrement()">-</button>

                                                            </div>
                                                         

                                                        </td>
                                                        <td class="left px-0">
                                                            <strong>₹ </strong>
                                                        </td>
                                                        <td class="right">
                                                            <i class="bi bi-trash text-primary p-2" data-toggle="modal" data-target="#exampleModal_delete"></i>
                                                        </td>
                                                    </tr> -->
                                                                        <!-- Modal -
                                                                <div class="modal fade" id="exampleModal_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Are Sure You Want Delete?
                                                                                </h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Delete</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                  -->

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <form class="forms-sample" method="postv">

                                                            @csrf

                                                            <div class="btn-group btn-group-toggle form-group text-center btn-block"
                                                                data-toggle="buttons" style="height: 66px;">
                                                                <input type="hidden" class="form-control"
                                                                    id="pick_type">
                                                                <label
                                                                    class="btn btn-primary deliveryup btn-lg  active">
                                                                    <img src="{{asset('web/')}}/images/kitchen/location.png"
                                                                        alt="location">
                                                                    <input type="radio" name="delitype"
                                                                        id="optionpickup" autocomplete="off"
                                                                        value="Pickup" checked> Pickup
                                                                </label>
                                                                <label class="btn btn-lg btn-primary deliveryp">
                                                                    <img src="{{asset('web/')}}/images/kitchen/fast-deliver.png"
                                                                        alt="">
                                                                    <input type="radio" name="delitype"
                                                                        id="optiondelivery" value="Delivery"
                                                                        autocomplete="off">
                                                                    Delivery
                                                                </label>

                                                            </div>
                                                            <div class="row">
                                                            <div class="col-lg-9 col-md-8 col-sm-12">
                                                                <form class="forms-sample">
                                                                    <div class="form-group">
                                                                        <!-- <select class="js-example-basic-single w-100"
                                                                            name="cust_order" id="cust_order">
                                                                            <option value="">Please Select </option>
                                                                            @foreach ($customerArr as $cust)
                                                                            <option value="{{$cust->customer_id}}">
                                                                                {{$cust->customer_name}}</option>
                                                                            @endforeach
                                                                        </select> -->
                                                                        <input type="text" class="form-control" id="cust_order" placeholder="Search Customer By No. " onkeyup="phoneNo()" name="cust_order">

                                                                    </div>
                                                                    <div id="suggesstion-box"></div>
                                                                    @csrf
                                                                </form>
                                                            </div>
                                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-primary "
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    +
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Add New
                                                                                    Customer
                                                                                </h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="">
                                                                                    <div class="form-group row">
                                                                                        <label
                                                                                            class="col-sm-3 col-form-label pr-0">Customer
                                                                                            Name</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text"
                                                                                                id="customer_name"
                                                                                                class="form-control" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label
                                                                                            class="col-sm-3 col-form-label pr-0">Mobile
                                                                                            Number</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text"
                                                                                                pattern="[1-9]{1}[0-9]{9}"
                                                                                                id="custmobilenum"
                                                                                                class="form-control"
                                                                                                required />

                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- <div class="form-group row">
                                                                                        <label
                                                                                            class="col-sm-3 col-form-label pr-0">Address</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text"
                                                                                                id="cust_address"
                                                                                                class="form-control" />
                                                                                        </div>
                                                                                    </div> -->

                                                                                    @csrf
                                                                                    <button type="button"
                                                                                        class="btn btn-primary float-right customerbtn">Save
                                                                                        Customer</button>
                                                                                    <div id="msgcust"></div>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--  -->
                                                            </div>
                                                        </div>
                                                            <!-- 
                                            <div class="form-group row">

                                                <div class="col-sm-12">
                                                    <input type="email" class="form-control"
                                                        placeholder="Enter Email ID" />
                                                </div>
                                            </div> --> <input type="hidden" class="customerid form-control"
                                                                id="customer_id" value="">
                                                                <!-- <div class="form-group row">

                                                                    <div class="col-sm-12">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter Mobile Number"
                                                                            id="mobile_number" value="" />
                                                                    </div> 
                                                                </div>
                                                                <div class="form-group row">

                                                                    <div class="col-sm-12">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter Name"
                                                                            id="customer_name1" value="" />
                                                                    </div>
                                                                </div> -->
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Address</button>
                                                                        <div id="demo" class="collapse">
                                                                        
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Address"
                                                                                    id="delivry_address" value="" />
                                                                        
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <!-- <div class="form-group"> -->
                                                                            <div class='input-group date' id='datetimepicker3'>
                                                                                <!-- <input type="datetime-local" class="form-control"
                                                                                    value="{{now()->toDateTimeString()}}" id="datetime" /> -->

                                                                                <input type="datetime-local" class="form-control"
                                                                                    name="datetime" id="datetime"
                                                                                    value="<?php echo date('Y-m-d').'T'.date('H:i'); ?>" />
                                                                            </div>
                                                                        <!-- </div> -->
                                                                    </div>
                                                                   
                                                                </div>
                                                            
                                                            <div class="delivry">
                                                                <!-- <div class="form-group row">

                                                                    <div class="col-sm-12">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Thane"
                                                                            id="delivry_address" value="Thane" />
                                                                    </div>
                                                                </div> -->


                                                                <!-- <select class="form-control mb-3" id="pincode">
                                                                    <!-- <option value="">Pin Code</option> --
                                                                    <option value="400601">400601</option>
                                                                    <!-- <option value=""></option> --
                                                                </select> -->
                                                                <div class="form-group row">

                                                                    <div class="col-sm-12">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="pincode"
                                                                            id="pincode" value="" />
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            

                                                            <table class="table table-clear">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="left td">
                                                                            <strong>Subtotal</strong>
                                                                        </td>
                                                                        <td class="right">
                                                                            <strong><input type="text" id="subtotal"
                                                                                    name="total_amount" disabled
                                                                                    class="subtotal form-control"
                                                                                    value=""></strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="left td">
                                                                            <strong>Tax</strong>
                                                                        </td>
                                                                        <td class="right td">
                                                                            <div class="row">
                                                                                <div class="col-md-4">

                                                                                    <div class="row">
                                                                                        <div class="col-md-9">
                                                                                            <strong><input type="text"
                                                                                                    id="tax"
                                                                                                    name="total_amount"
                                                                                                    class="subtax form-control"
                                                                                                    value="0"></strong>
                                                                                        </div>
                                                                                        <div class="col-md-1 mt-2 px-0">
                                                                                            <h2>%</h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-8">
                                                                                    <strong><input type="text" id="tax"
                                                                                            name="total_amount" disabled
                                                                                            class="subtaxx form-control"
                                                                                            value=""></strong>
                                                                                </div>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="left td">
                                                                            <strong>Discount</strong>
                                                                        </td>
                                                                        <td class="right td">
                                                                            <div class="row">
                                                                                <div
                                                                                    class="input-group select-group mb-3">
                                                                                    <input type="text"
                                                                                        class="discount form-control"
                                                                                        id="discount" placeholder=""
                                                                                        value="0" />
                                                                                    <select
                                                                                        class="form-control input-group-addon disopt"
                                                                                        id="basic-addon2">
                                                                                        <option value="₹">₹</option>
                                                                                        <option value="%">%</option>
                                                                                    </select>

                                                                                </div>
                                                                                <!-- <div class="input-group mb-3">
                                                                                    <input type="text"
                                                                                        class="discount form-control"
                                                                                        id="discount" placeholder=""
                                                                                        value="0"
                                                                                        aria-describedby="basic-addon2">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"
                                                                                            id="basic-addon2">%</span>
                                                                                            <span type="span" class="input-group-text" data-toggle="dropdown">
                                                                                                Payment Method
                                                                                            </span>
                                                                                            <div class="dropdown-menu">
                                                                                                <a class="dropdown-item rupee">₹</a>
                                                                                                <a class="dropdown-item percent">%</a>
                                                                                            </div>
                                                                                    </div>
                                                                                </div> -->
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                    <!-- <tr id="shipping_charge" style="display: none;">
                                                                        <td class="left">
                                                                            <strong>Delivery charge</strong>
                                                                        </td>
                                                                        <td class="right">
                                                                            <strong id="shipping_amount"></strong>
                                                                        </td>
                                                                    </tr> -->
                                                                    <tr>
                                                                        <td class="left td">
                                                                            <strong>Total</strong>
                                                                        </td>
                                                                        <td class="right td">

                                                                            <strong><input type="text"
                                                                                    name="total_amount" disabled
                                                                                    class="grandtotal form-control"
                                                                                    value=""></strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="left td">
                                                                            <strong>Paid Amount</strong>
                                                                        </td>
                                                                        <td class="right td">

                                                                            <strong><input type="text"
                                                                                    name="paid_amount" 
                                                                                    class="grandtotal form-control"
                                                                                    value="" id="paid_amount"></strong>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="row d-flex justify-content-center">

                                                                <!-- <div class="btn-group btn-lg btn-block" role="group"
                                                                    aria-label="Basic example"> -->
                                                                <div class="btn-group btn-group-toggle text-center"
                                                                    data-toggle="buttons">
                                                                    <label class="btn btn-warning m-2 active">
                                                                        <input type="radio" name="paym" value="Cash"
                                                                            id="Cash" autocomplete="off"> Cash
                                                                    </label>
                                                                    <label class="btn btn-warning m-2">
                                                                        <input type="radio" name="paym" value="GPay"
                                                                            id="GPay" autocomplete="off"> GPay
                                                                    </label>
                                                                    <!-- <label class="btn btn-warning m-2">
                                                                        <input type="radio" name="paym"
                                                                            value="Pay Later" id="pay_later"
                                                                            autocomplete="off"> Pay Later
                                                                    </label> -->
                                                                </div>
                                                              
                                                                <input type="hidden" class="form-control"
                                                                    id="variant_pay">
                                                                <!-- <input type="hidden" id="variant_pay" value=""> -->
                                                                <!-- <button type="button"
                                                                        class="btn btn-warning m-2">Cash</button>
                                                                    <button type="button"
                                                                        class="btn btn-warning m-2">GPay</button>
                                                                    <button type="button"
                                                                        class="btn btn-warning m-2">Pay Later</button> -->
                                                                <!-- </div> -->
                                                                </div>   
                                                                <div class="form-group row mt-3" id="remainamt">
                                                                    <div class="col-sm-12">
                                                                        <label for="remaing amount">Remaining Payment</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Please Enter Amount"
                                                                            id="remaing_amount" value="0" />
                                                                    </div>
                                                                </div>                                                               
                                                                <button type="button"
                                                                    class="btn btn-block btn btn-primary mt-2 placeorder"
                                                                    id="addorder">Place order</button>
                                                                <!-- <button
                                                                    class="btn btn-block btn btn-primary mt-2 placeorder"
                                                                    id="addorder" onclick="order()">Place
                                                                    order</button> -->
                                                            <!-- </div> -->
                                                          
                                                            <div id="msginsert">

                                                            </div>

                                                        </form>

                                                        <!--  -->
                                                        <!--  -->
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" style="height: 400px;overflow-y: scroll;">
                                                        <!--  -->
                                                        <!-- <table class="table table-striped" id="myorderTable" style="height:400px; overflow-y:scroll; display:block;">
                                                            <thead>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>Order No.</td>
                                                                    <td>Name</td>
                                                                    <td>Total</td>
                                                                    <td>Status</td>
                                                                </tr>
                                                            </thead>
                                                      
                                                      
                                <?php $i=1;?>
                                <tbody>
                                @foreach ($orderlistArr as $orderlist)
                                    <tr>
                                        <td>
                                      <input type="checkbox" id="check"  value="{{$orderlist->order_id}}"> 
                                        </td>
                                        <td>
                                        {{$i++}}
                                        </td>

                                        <td>
                                       
                                       vvy
                                        </td>
                                        <td>
                                        ₹ {{$orderlist->grandtotal}}
                                        </td>
                                       
                                        <td> 
                                        <div class="form-group" style="width: 100px;">
                                           
                                            <select class="form-control" id="paymentstatus">
                                                <option value="Process">Process</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Completed">Completed</option>

                                            </select>
                                        </div> 
                                        </td>

                                        <td>
                                          
                                            
                                        <i class="bi bi-trash text-danger booticon btnDelete" ></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> -->


                                                        @foreach ($orderlistArr as $orderlist)
                                                        @if ($orderlist->status != 'Completed')
                                                        <div class="media">

                                                            <div class="media-body">

                                                                <div class="row m-1 py-2" style=" border: 1px solid #e9e9e9;border-radius: 5px;padding: 5px;">

                                                                    <div class="col-md-10">
                                                                        <div class="row">
                                                                            <div class="col-md-1">
                                                                                <input type="checkbox" class="check"
                                                                                    name="checkbox_order"
                                                                                    value="{{$orderlist->order_id}}">
                                                                                <!-- Modal -->
                                                                                <div class="modal fade"
                                                                                    id="checkb_{{$orderlist->order_id}}"
                                                                                    tabindex="-1"
                                                                                    aria-labelledby="exampleModalLabel"
                                                                                    aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title"
                                                                                                    id="exampleModalLabel">
                                                                                                    Active Order</h5>
                                                                                                <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                                    <span
                                                                                                        aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body" >
                                                                                                <form class="forms-sample">
                                                                                                    <!-- <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-3 col-form-label">Remaing Amount</label>
                                                                    <div class="col-sm-9">
                                                                         <input type="text" class="form-control" id="remainamount_{{$orderlist->order_id}}" value="">
                                                                        <input type="hidden" id="custid_{{$orderlist->order_id}}" value="{{$orderlist->customer_id}}" >
                                                                    </div>
                                                                </div> -->
                                                                                                    <div
                                                                                                        class="form-group row">

                                                                                                        <input type="hidden" id="custid_{{$orderlist->order_id}}" value="{{$orderlist->customer_id}}">
                                                                                                        <label
                                                                                                            for="staticEmail"
                                                                                                            class="col-sm-3 col-form-label">Order
                                                                                                            Status</label>
                                                                                                        <div
                                                                                                            class="col-sm-9">
                                                                                                            <select
                                                                                                                class="form-control form-control-lg"
                                                                                                                id="paystatus_{{$orderlist->order_id}}">
                                                                                                                <option value="Pending">Pending
                                                                                                                </option>
                                                                                                                <option value="In Process"> In Process</option>
                                                                                                                <option Value="Completed"> Completed</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    @if($orderlist->pay_method=='Pay Later')
                                                                                                    <div
                                                                                                        class="form-group row">
                                                                                                        <label for="inputAmountpaid" class="col-sm-3 col-form-label">Amount Paid</label>
                                                                                                        <div
                                                                                                            class="col-sm-9">
                                                                                                            <input type="text" class="form-control paidamount" id="paidamount_{{$orderlist->order_id}}" placeholder="Enter Amount">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <?php //echo $_POST['amount']; ?>
                                                                                                    <div
                                                                                                        class="form-group row">
                                                                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Remaing Amount</label>
                                                                                                        <div class="col-sm-9">

                                                                                                            <input type="text" class="form-control remainamt" id="remainamount_{{$orderlist->order_id}}" value="{{$orderlist->remain_amount}}" disabled="disabled">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-group row">
                                                                                                        <label for="inputPayment" class="col-sm-3 col-form-label">Payment Method</label>
                                                                                                        <div
                                                                                                            class="col-sm-9">
                                                                                                            <select
                                                                                                                class="form-control form-control-lg"
                                                                                                                id="paymethod_{{$orderlist->order_id}}">
                                                                                                                <option value="Cash">Cash</option>
                                                                                                                <option Value="Bank">
                                                                                                                    Bank
                                                                                                                </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    @endif
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="btn btn-primary payddetails"
                                                                                                        value="{{$orderlist->order_id}}">Submit</button>
                                                                                                    <div id="msgpay">
                                                                                                    </div>
                                                                                                    @csrf
                                                                                                </form>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <h4><i
                                                                                        class="bi bi-person-circle mr-1"></i>
                                                                                    Name:{{$orderlist->customer_name}}
                                                                                    </h5>
                                                                                    <p class="my-0">
                                                                                    <strong> Discount:</strong>{{$orderlist->discount}}%
                                                                                    </p>
                                                                                    <p class="mt-0">₹ {{$orderlist->grandtotal}} <strong class="ml-3"><i class="bi bi-calendar-week"></i> Date:</strong> {{ date('j F Y', strtotime($orderlist->order_date)) }} </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <!-- <i
                                                                            class="bi bi-trash text-primary p-2 deleteRow"></i>
                                                                        <i class="bi bi-pencil-fill text-success"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModall"></i> -->
                                                                        <form action="">
                                                                            <!-- <div class="form-group row p-0">
                                                                        <label
                                                                            class="col-sm-12 col-form-label pt-0">Status 
                                                                                
                                                                            <span class="badge bg-danger text-white">Paid</span>
                                                                     
                                                                       
                                                                        </label>


                                                                    </div> -->
                                                                        </form>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endforeach


                                                        <!--  -->
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-order" role="tabpanel"
                                                        aria-labelledby="pills-order-tab">
                                                        <div class="media">
                                                            <img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                                class="mr-3" alt="..." height="60px" width="60px">
                                                            <div class="media-body">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <h5 class="mt-0">Order No.:1</h5>
                                                                        <h6>3*100 = 300</h6>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <i class="bi bi-trash text-primary p-2"></i>
                                                                        <i class="bi bi-pencil-fill text-success"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModall"></i>
                                                                        <!-- Modal -->
                                                                        <!-- <div class="modal fade" id="exampleModall"
                                                                            tabindex="-1"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            id="exampleModalLabel">
                                                                                            Add New
                                                                                            Order
                                                                                        </h5>
                                                                                        <button type="button"
                                                                                            class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form action="">
                                                                                            <div class="form-group row">
                                                                                                <label
                                                                                                    class="col-sm-3 col-form-label">Order
                                                                                                    Name</label>
                                                                                                <div class="col-sm-9">
                                                                                                    <input type="text"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">Close</button>
                                                                                        <button type="button"
                                                                                            class="btn btn-primary">Save
                                                                                            changes</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                                <form action="">
                                                                    <div class="form-group row p-0">
                                                                        <label
                                                                            class="col-sm-12 col-form-label pt-0">Status:
                                                                            paid</label>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="media">
                                                            <img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                                class="mr-3" alt="..." height="60px" width="60px">
                                                            <div class="media-body">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <h5 class="mt-0">Order No.:133</h5>
                                                                        <h6>3*100 =5300</h6>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <i class="bi bi-trash text-primary p-2"></i>
                                                                        <i class="bi bi-pencil-fill text-success"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModall"></i>

                                                                    </div>
                                                                </div>
                                                                <form action="">
                                                                    <div class="form-group row p-0">
                                                                        <label
                                                                            class="col-sm-12 col-form-label pt-0">Status:
                                                                            paid</label>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->




                                    </div>



                                </div>

                            </div>


                        </div>
                    <!-- </div> -->

                </div>
            </div>
            <div class="tab-pane fade" id="pills-snacks" role="tabpanel" aria-labelledby="pills-snacks-tab">
                <div class="row">
                    <div class="content-wrapper">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-light btn-block text-left"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapseOne" aria-expanded="true"
                                                                    aria-controls="collapseOne">
                                                                    Snacks
                                                                    <i class="bi bi-chevron-down float-right"></i>
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="msgsnack">

                                                        </div>
                                                        <div id="collapseOne" class="collapse show"
                                                            aria-labelledby="headingOne"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @foreach ($snacks as $menu)
                                                                    <div class="col-md-3 mt-3">
                                                                        <div class="card h-100">
                                                                            <div class="card-body p-2 containercart">
                                                                                <input type="hidden" class="breakfast"
                                                                                    value="{{$menu->menu_id}}">
                                                                                <img src="{{url('upload/'.$menu->file_upload)}}"
                                                                                    alt="" height="145px"
                                                                                    class="img-fluid imagecart">
                                                                                <div class="overlaycart">
                                                                                    <a href="#"
                                                                                        class="carticon cartitem"
                                                                                        title="User Profile"
                                                                                        data-id="{{$menu->menu_id}}">
                                                                                        <i class="bi bi-cart4"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="card-title my-2">
                                                                                    {{$menu->menu_name}}</h5>
                                                                                <h5 class="card-text">
                                                                                    ₹{{$menu->menu_price}}</h5>
                                                                              
                                                                            </div>
                                                                            <div class="number d-flex">
                                                                                <span class="minus" id="minus" data_price="{{$menu->menu_price}}" data_id="{{$menu->menu_id}}">-</span>
                                                                                    <input type="text" id="input" class="form-control p_quantity tabledemo mx-1" data_price="{{$menu->menu_price}}" data_id="{{$menu->menu_id}}" value="1" name="quantity"/>
                                                                                <span class="plus" id="plus" data_price="{{$menu->menu_price}}" data_id="{{$menu->menu_id}}">+</span>
                                                                            </div>
                                                                    <!-- <input type="number" class="p_quantity" name="quantity" id="quantity" value="1" data_price="{{$menu->menu_price}}" data_id="{{$menu->menu_id}}"> -->
                                                                                <button class="btn btn-dark" data-toggle="modal" data-target="#expenses_{{$menu->menu_id}}">ADD Order</button>
                                                                    <!-- Modal -->
                                                                        <div class="modal fade snacks_model" id="expenses_{{$menu->menu_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                        <form class="add_snacks" value="{{$menu->menu_id}}">
                                                                                            @csrf
                                                                                            <!-- <input type="hidden" name="total_price" id="totalprice_{{$menu->menu_id}}" value="{{$menu->menu_price}}"> -->
                                                                                            <input type="hidden" name="quanty" id="quanty_{{$menu->menu_id}}"  value="1">
                                                                                            <!-- <input type="hidden" name="price" id="prise"  value="{{$menu->menu_price}}"> -->
                                                                                            <input type="hidden" name="menu" id="id"  value="{{$menu->menu_id}}">
                                                                                            <input type="hidden" name="order_date" id="dat" class="order_date"  value="{{date('Y-m-d')}}">
                                                                                            <button type="submit" class="btn btn-primary expensesbtn" value="{{$menu->menu_id}}">Add</button>
                                                                                        </form>
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
                                                    <!-- <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-light btn-block text-left"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapseOnee" aria-expanded="true"
                                                                    aria-controls="collapseOnee">
                                                                    Regular Item <i
                                                                        class="bi bi-chevron-down float-right"></i>
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOnee" class="collapse"
                                                            aria-labelledby="headingOne"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @foreach ($menuArray as $menuo)
                                                                    <div class="col-md-3 mt-3">
                                                                        <div class="card h-100">
                                                                            <div class="card-body p-2 containercart">
                                                                                <input type="hidden" class="breakfast"
                                                                                    value="{{$menuo->menu_id}}">
                                                                                <img src="{{url('upload/'.$menuo->file_upload)}}"
                                                                                    alt="" height="145px"
                                                                                    class="img-fluid imagecart">
                                                                                <div class="overlaycart">
                                                                                    <a href="#"
                                                                                        class="carticon cartitem"
                                                                                        title="User Profile"
                                                                                        data-id="{{$menuo->menu_id}}">
                                                                                        <i class="bi bi-cart4"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="card-title my-2">
                                                                                    {{$menuo->menu_name}}</h5>
                                                                                <h5 class="card-text">
                                                                                    ₹{{$menuo->menu_price}}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="card">
                                                        <div class="card-header" id="headingTwo">
                                                            <h2 class="mb-0">
                                                                <button
                                                                    class="btn btn-light btn-block text-left collapsed"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapseTwo" aria-expanded="false"
                                                                    aria-controls="collapseTwo">
                                                                    Dinner <i
                                                                        class="bi bi-chevron-down float-right"></i>
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse show"
                                                            aria-labelledby="headingTwo"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @foreach ($menuArrays as $menus)
                                                                    <div class="col-md-3 mt-3">
                                                                        <div class="card h-100">
                                                                            <div class="card-body p-2 containercart">
                                                                                <input type="hidden" class="breakfast"
                                                                                    value="{{$menus->menu_id}}">
                                                                                <img src="{{url('upload/'.$menus->file_upload)}}"
                                                                                    alt="" height="145px"
                                                                                    class="img-fluid imagecart">
                                                                                <div class="overlaycart">
                                                                                    <a href="#"
                                                                                        class="carticon cartitem"
                                                                                        title="User Profile"
                                                                                        data-id="{{$menus->menu_id}}">
                                                                                        <i class="bi bi-cart4"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="card-title my-2">
                                                                                    {{$menus->menu_name}}</h5>
                                                                                <h5 class="card-text">
                                                                                    ₹{{$menus->menu_price}}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header" id="headingThree">
                                                            <h2 class="mb-0">
                                                                <button
                                                                    class="btn btn-light btn-block text-left collapsed"
                                                                    type="button" data-toggle="collapse"
                                                                    data-target="#collapseThree" aria-expanded="false"
                                                                    aria-controls="collapseThree">
                                                                    Lunch <i class="bi bi-chevron-down float-right"></i>
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseThree" class="collapse show"
                                                            aria-labelledby="headingThree"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @foreach ($menuArrayss as $menul)
                                                                    <div class="col-md-3 mt-3">
                                                                        <div class="card h-100">
                                                                            <div class="card-body p-2 containercart">
                                                                                <input type="hidden" class="breakfast"
                                                                                    value="{{$menul->menu_id}}">
                                                                                <img src="{{url('upload/'.$menul->file_upload)}}"
                                                                                    alt="" height="145px"
                                                                                    class="img-fluid imagecart">
                                                                                <div class="overlaycart">
                                                                                    <a href="#"
                                                                                        class="carticon cartitem"
                                                                                        title="User Profile"
                                                                                        data-id="{{$menul->menu_id}}">
                                                                                        <i class="bi bi-cart4"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="card-title my-2">
                                                                                    {{$menul->menu_name}}</h5>
                                                                                <h5 class="card-text">
                                                                                    ₹{{$menul->menu_price}}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            

                        </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
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
                                        <!-- <th>
                                            Quantity
                                        </th>
                                        
                                        <th>
                                            Action
                                            <input type="hidden" value="0" id="page" />
                                        </th> -->
                                    </tr>
                                </thead >
                                <tbody id="order_data" class="order_data">
                                <?php $i=1;?>
                                @foreach ($snacksord as $expenses) 
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
                                        <!-- <td>
                                            <input type="number" class="p_quantity" name="quantity" id="quantity" value="1" data_price="{{$expenses->menu_price}}" data_id="{{$expenses->menu_id}}">
                                            <!-- <div class="number d-flex">
                                                <span class="minus" id="minus" data_price="{{$expenses->menu_price}}" data_id="{{$expenses->menu_id}}">-</span>
                                                    <input type="text" id="input" class="form-control quantity tabledemo mx-1" data_price="{{$expenses->menu_price}}" data_id="{{$expenses->menu_id}}" value="1" name="quantity"/>
                                                <span class="plus" id="plus" data_price="{{$expenses->menu_price}}" data_id="{{$expenses->menu_id}}">+</span>
                                            </div> --
                                        </td> -->
                                        <!-- <td>
                                            <!-- <a href="edit_expenses/id={{$expenses->menu_id}}">
                                                <i class="bi bi-pencil-square text-success px-2 booticon"></i>
                                            </a>
                                            
                                            <i class="bi bi-printer text-warning booticon"></i> --
                                            <button class="btn btn-dark" data-toggle="modal" data-target="#expenses_{{$expenses->menu_id}}">ADD Order</button>
                                                <!-- Modal --
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
                                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --
                                                                    <form class="add_snacks" value="{{$expenses->menu_id}}">
                                                                        @csrf
                                                                        <!-- <input type="hidden" name="total_price" id="totalprice_{{$expenses->menu_id}}" value="{{$expenses->menu_price}}"> --
                                                                        <input type="hidden" name="quanty" id="quanty_{{$expenses->menu_id}}"  value="1">
                                                                        <!-- <input type="hidden" name="price" id="prise"  value="{{$expenses->menu_price}}"> --
                                                                        <input type="hidden" name="menu" id="id"  value="{{$expenses->menu_id}}">
                                                                        <input type="hidden" name="order_date" id="dat" class="order_date"  value="{{date('Y-m-d')}}">
                                                                        <button type="submit" class="btn btn-primary expensesbtn" value="{{$expenses->menu_id}}">Add</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--  --
                                        </td> -->
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>

                </div>
                </div>
                </div>
                </div>
            </div>
            <!-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">.5.6.</div> -->
        </div>
        <!-- </div>
            <div class="container-fluid"> -->
                
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="#"
                                target="_blank">Kitchen</a> 2022</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">All rights reserved by
                            <a href="#" target="_blank">Kitchen </a></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src="{{asset('web/')}}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('web/')}}/js/off-canvas.js"></script>
    <script src="{{asset('web/')}}/js/hoverable-collapse.js"></script>
    <script src="{{asset('web/')}}/js/template.js"></script>
    <script src="{{asset('web/')}}/js/settings.js"></script>
    <script src="{{asset('web/')}}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{asset('web/')}}/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{asset('web/')}}/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{asset('web/')}}/js/dashboard.js"></script>
    <!-- End custom js for this page-->
    <!-- plugin js for this page -->
    <script src="{{asset('web/')}}/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="{{asset('web/')}}/vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{asset('web/')}}/js/file-upload.js"></script>
    <script src="{{asset('web/')}}/js/typeahead.js"></script>
    <script src="{{asset('web/')}}/js/select2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
<!-- <script src="YourJquery source path"></script> -->
<!-- <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script> -->

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>

    var elem = document.getElementById("myvideo");
    function openFullscreen() {
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.webkitRequestFullscreen) { /* Safari */
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) { /* IE11 */
        elem.msRequestFullscreen();
      }
    }

    function phoneNo(){
        var x = document.getElementById("cust_order").value;
        $("#custmobilenum").val(x);
        // console.log(x);
    }
    $(document).ready(function() {
        $("#fromDate").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        }).on('changeDate', function(selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#toDate').datepicker('setStartDate', minDate);
        });

        $("#toDate").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        }).on('changeDate', function(selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#fromDate').datepicker('setEndDate', minDate);
        });
    });
    </script>
    <!-- End custom js for this page-->
<script>
    $(document).ready(function(){
        $("#remainamt").hide();
        $("input[type='radio']").change(function(){
            if($(this).val()=="Pay Later")
            {
                $("#remainamt").show();
                // alert('hi');
            }
            else
            {
                $("#remainamt").hide();
                // alert('hello');
            }
        });
    });
</script>
    <script>
    $("#tbUser").on('click', '.btnDelete', function() {
        $(this).closest('tr').remove();
        calculate();
    });
    </script>
    <script>
    var ENDPOINT = "{{ url('/') }}";
    $('#addorder').click(function() {
        var i = 0;
        var menuname = [];
        var menu_id = [];
        var price = [];
        var quantity = [];
        var totalamount = [];
        var status = 1;
        $('.orderproduct').each(function() {
            // cart_ids.push(this.id);
            // orderid.push($(this).attr('data_id'));
            menuname.push($('.menuname').eq(i).val());
            menu_id.push($('.menu_id').eq(i).val());
            price.push($('.price').eq(i).val());
            quantity.push($('.quantity').eq(i).val());
            totalamount.push($('.totalamount').eq(i).val());
            i++;
        })

        var variant_pay = $('#variant_pay').val();
        if ($('input[name="paym"]').is(':checked')) {
            variant_pay = $("input[name='paym']:checked").val();
        }
        var pick_type = $('#pick_type').val();
        if ($('input[name="delitype"]').is(':checked')) {
            pick_type = $("input[name='delitype']:checked").val();
        }
        // var cust_order = $('#cust_order').val();
        var optionpickup = $('#optionpickup').val();
        var optiondelivery = $('#optiondelivery').val();
        var mobile_number = $('#mobile_number').val();
        var customer_name = $('#customer_name').val();
        var delivry_address = $('#delivry_address').val();
        var customer_id = $('.customerid').val();
        var pincode = $('#pincode').val();
        var datetime = $('#datetime').val();
        var subtotal = $('#subtotal').val();
        var tax = $('#tax').val();
        var discount = $('.discount').val();
        var grandtotal = $('.grandtotal').val();
        var paid_amount = $('#paid_amount').val();
        var remaing_amount = $('#remaing_amount').val();
        var status_order = status;

        $.ajax({
            url: ENDPOINT + "/insertordersubmit",
            method: "POST",
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // }
            data: {
                "_token": "{{ csrf_token() }}",
                // 'cust_order': cust_order,
                'menuname': menuname,
                'menu_id': menu_id,
                'price': price,
                'quantity': quantity,
                'totalamount': totalamount,
                'tax': tax,
                'optionpickup': optionpickup,
                'optiondelivery': optiondelivery,
                'variant_pay': variant_pay,
                'mobile_number': mobile_number,
                'customer_name': customer_name,
                'customer_id': customer_id,
                'pick_type': pick_type,
                'delivry_address': delivry_address,
                'pincode': pincode,
                'datetime': datetime,
                'subtotal': subtotal,
                'discount': discount,
                'grandtotal': grandtotal,
                'paid_amount': paid_amount,
                'status_order': status_order,
                'remaing_amount':remaing_amount
            },
            dataType: 'json',
            success: function(data) {

                if (data.code == "404") {
                    $('#msginsert').html('<div class="alert alert-danger">' + data.msg + '</div>');
                    
                } else {
                    $('#msginsert').html('<div class="alert alert-success">Order added successfully!.</div>');
                    //  location.reload();
                }
            }
        });
    });
    </script>
    <script>
    /* On change */
    $(document).ready(function() {
        function updatePrice() {
            // var price = parseFloat($("#quantity").val());
            //  alert();

            var price = $(this).val();
            var data_price = $(this).attr('data_price');
            // alert(price);
            // alert(data_price);
            // var data-total = $(this).val();

            var breakfastmenu = $(this).attr('data_id');
            //  alert(cost);
            //  alert(breakfastmenu);
            // var total = (price + 1) * 1.05;
            var tot = data_price * price;
            $('#total-price_' + breakfastmenu).val(tot);
            calculate();
        }
        $(document).on("click", ".quantity", updatePrice);
        // $(document).on("click", ".plus", updatePrice);
        // $(document).on("click", ".minus", updatePrice);
        // });
        // $(document).ready(function() {
			// $('#minus').click(function () {
            $('body').on('click', '.minus', function() {
                // alert('hii');
				var $input = $(this).parent().find('input');
				var count = parseInt($input.val()) - 1;
				count = count < 1 ? 1 : count;
				$input.val(count);
				$input.change();
                calculate();
				// return false;
			});
            $('body').on('click', '.plus', function() {
			// $('#plus').click(function () {
                // alert('hii2');

				var $input = $(this).parent().find('input');
				$input.val(parseInt($input.val()) + 1);
				$input.change();
                var price = $input;
                var data_price = $(this).attr('data_price');
                var breakfastmenu = $(this).attr('data_id');
                // alert(price);
                // alert(data_price);
                // //  alert(cost);
                //  alert(breakfastmenu);
                // var total = (price + 1) * 1.05;
                var tot = data_price * price;
                $('#total-price_' + breakfastmenu).val(tot);
                calculate();
				// return false;
			});
		});
    </script>
    <script>
    $(".carttable").on('input', '.price', function() {
        calculate();
    });
    $(".carttable").on('input', '.totalamount', function() {
        calculate();
    });
    $('.subtax').on('input', function(e) {
        calculate();
    });
    $('.discount').on('input', function(e) {
        calculate();
    });
    $('.disopt').on('change', function(e) {
        calculate();
    });
    // $('.price').on('input', function(e) {
    // calculate();
    // });
    // $('.totalamount').on('input', function(e) {
    // calculate();
    // });

    function calculate() {
        // var subtotal = 100;
        // var subtotal = parseFloat($('.totalamount').val());
        var subtotal = 0;
        // alert(subtotal);
        var i = 0;
        $('.quantity').each(function() {
            subtotal = subtotal + (parseFloat($(this).val()) * parseFloat($('.price').eq(i).val()));
            $('.totalamount').eq(i).val(parseFloat($(this).val()) * parseFloat($('.price').eq(i).val()));
            i++;

        })

        // var taxes = ($('.totalamount').val());
        var taxes = 0;
        if ($('.subtax').val() != '') {
            taxes = taxes + (subtotal * (parseFloat($('.subtax').val()) / 100));
        }




        // $(".percent").click(function() {
        // discount = subtotal - (parseFloat($('.discount').val()));
        // };


        var disopt = ($(".disopt").val());
        if ($(".disopt").val() == '%') {
            // alert('%');
            discount = subtotal * (parseFloat($('.discount').val()) / 100);
        }
       
        if ($(".disopt").val() == '₹') {
            var discount = 0;  
            // var rup = parseFloat($('.discount').val());
            // alert(rup);
            // discount = subtotal - rup;
            // discount = subtotal * (parseFloat($('.discount').val()) / 100);
            // discount = subtotal - (discount + parseFloat($('.discount').val()));
            // alert(discount);
            discount = parseFloat($('.discount').val());
        }
       

        var amount_before_tax = subtotal - discount;
        var amount_after_tax = parseFloat(amount_before_tax) + parseFloat(taxes);
        $('.subtotal').val(subtotal);
        // alert(subtotal);
        $('.subtaxx').val(taxes);
        $('.grandtotal').val(amount_after_tax);
    }
    </script>

    <script>
    $(".delivry").hide();
    $(".deliveryp").click(function() {
        $(".delivry").show();
    });

    $(".deliveryup").click(function() {
        $(".delivry").hide();
    });
    </script>

    <script>
    function increment() {
        document.getElementById('demoInput').stepUp();
    }

    function decrement() {
        document.getElementById('demoInput').stepDown();
    }
    </script>
    <!-- <script>
    $(document).ready(function() {
        $(".cartitem").click(function() {
            var menu_id=$(this).attr('data-id');
        var menu_name="order1";
        var menu_price="5000";
        var menu_img="{{asset("web/")}}/images/kitchen/item-60fbc2e7491ac.jpg"

            $(".carttable").append(
                '<tr><td class="left px-0"><div class="row"><div class="col-md-4"><img src="'+menu_img+'" width="60px" height="60px" alt=""></div><div class="col-md-8 pt-2"><strong>'+menu_id+' </strong></div></div></td><td class="left px-0"><strong>₹ '+menu_price+'</strong></td><td class="left px-0"><div class="col-md-12 d-flex"><button class="btn btn-success btn-sm" onclick="increment()">+</button><input id="demoInput" type="number" min=1 max=110 value="1" style="width:50px;"><button class="btn btn-primary btn-sm" onclick="decrement()">-</button></div></td> <td class="left px-0"><strong>₹ '+menu_price+'</strong> </td><td class="right"><i class="bi bi-trash text-primary p-2 order_del"></i> </tr>'
                );
        });
    });
    </script> -->
    <script>
    $(document).ready(function() {
        $(".cartitem").click(function() {
            // var menu_id=$(".breakfast").val();
            var menu_id = $(this).attr('data-id');
            var ENDPOINT = "{{ url('/') }}";
            $.ajax({

                url: ENDPOINT + "/list_order",
                data: {
                    'menu_id': menu_id,
                    _token: '{{ csrf_token() }}'
                },
                type: 'post',
                success: function(response) {

                    var response = JSON.parse(response);
                    // alert(response);
                    $(".carttable").append(response.output);
                    calculate();
                    //         $("#menu_name").val(response[0].menu_name);
                    // $('#menu_price').val(response[0].menu_price);
                    // $('#menu_type').val(response[0].menu_type);
                    // $('#file_upload').val(response[0].file_upload);

                }
            });

        });
    });
    </script>
    <script>
    $('body').on('click', '.order_delete', function() {
        // var menu_id=$(this).val();
        // debugger
        var id = $(this).attr('data-id');
        // alert(id);
        $.ajax({

            url: "destroy_order",
            data: {
                'menu_id': id,
                _token: '{{ csrf_token() }}'
            },
            type: 'post',
            success: function(response) {
                // location.reload();
            }
        })
    })
    </script>

   
    <script>
    $(document).ready(function() {

        $(document).on('click', '.customerbtn', function() {
            var ENDPOINT = "{{ url('/') }}";
            var formData = new FormData();
            formData.append('customer_name', $('#customer_name').val());
            formData.append('custmobilenum', $('#custmobilenum').val());
            // formData.append('cust_address', $('#cust_address').val());
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                method: "POST",
                url: ENDPOINT + '/storecustomer',
                data: formData,
                headers: {
                    'IsAjax': 'true'
                },
                processData: false,
                contentType: false,
                dataType: 'json',

                success: function(data) {
                    if (data.code == "404") {
                        $('#msgcust').html('<p class="text-danger">' + data.msg + '</p>');

                    } else {
                        // alert('success');
                        $('#msgcust').html('<p class="text-success">' + data.msg + '</p>');
                        $("#customer_id").val(data.customer_id);
                        // document.getElementById("customer_id").readOnly = true;
                        // location.reload();
                    }


                }
            });

        });
    });
    </script>
    <script>
    $("#cust_order").on('change', function() {
        // alert('hii');
        // $('#data_seller_invoice').html('');
        var cust_order = ($("#cust_order").val());

        $.ajax({
                type: "POST",
                url: "fetch_customer2",
                data: {
                    "_token": "{{ csrf_token() }}",
                    customer_id: cust_order
                },
                dataType: "json",
                type: "post"
            })
            .done(function(response) {
                // alert(response);
                // $("#data_seller_invoice").append(response.output);
                $("#customer_id").val(response[0].customer_id);
                document.getElementById("customer_id").readOnly = true;
                $('#mobile_number').val(response[0].customer_contactnum);
                document.getElementById("mobile_number").readOnly = true;
                $('#customer_name1').val(response[0].customer_name);
                document.getElementById("customer_name1").readOnly = true;
                $('#pincode').val(response[0].customer_pincode);
                document.getElementById("pincode").readOnly = true;
                $('#delivry_address').val(response[0].customer_address);
                document.getElementById("delivry_address").readOnly = true;
                //  $('#pincode').val(response[0].customer_pincode);

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    });
    </script>
    <script>
    $(document).ready(function() {
        $("#myorderTable").on('click', '.btnDelete', function() {
            $(this).closest('tr').remove();
        });
    });
    </script>
    <script>
    $('.check').on('change', function() {
        var checked = this.checked
        var products_id = $(this).val();

        // $('span').html(checked.toString())
        //  alert();

        $('#checkb_' + products_id).modal();
    });
    </script>
    <script>
    // $('.paidamount').change(function() {

    //     $('.remainamt').val($(this).val());

    // });
    $('body').on('click', '.payddetails', function() {
        //debugger
        var orderid = $(this).val();

        // var remainamount = $('#remainamount_'+ orderid).val();
        var paystatus = $('#paystatus_' + orderid).val();
        var paidamount = $('#paidamount_' + orderid).val();
        var paymethod = $('#paymethod_' + orderid).val();

        // var custid = $(this).attr('data_cust');
        var custid = $("#custid_" + orderid).val();
        $.ajax({

            url: "order_active_payment",
            data: {
                'orderid': orderid,
                'custid': custid,
                'paystatus': paystatus,
                'paidamount': paidamount,
                'paymethod': paymethod,
                _token: '{{ csrf_token() }}'
            },
            type: 'post',
            dataType: "json",
            beforeSend: function() {
                $('.payddetails').addClass('disabled');
            },

            success: function(response) {
                if (response.code == "404") {
                    ;
                    $('.payddetails').removeClass('disabled').text('Submit');
                    $('#msgpay').html(
                        '<div class="alert alert-danger alert-dismissible fade show" id="smsg" role="alert">' +
                        response.msg +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                } else {
                    $('.payddetails').removeClass('disabled').text('Submit');
                    $('#msgpay').html(
                        '<div class="alert alert-success alert-dismissible fade show" id="smsg" role="alert">Data added successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                    // window.location.href="customer";
                }
            }
        })
    })
    

    $(document).ready(function(){

        // Initialize 
        $( "#cust_order" ).autocomplete({
            source: function( request, response ) {
                // Fetch data
                $.ajax({
                    url: "fetch_customer",
                    type: 'post',
                    dataType: "json",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                // Set selection
                // console.log(ui.item.phone);
                $('#cust_order').val(ui.item.label); // display the selected text
                //$('#userid').val(ui.item.value); // save selected id to input
                // if(ui.length === 0){

                // }
                return false;
            }
        });
       

    });
   

       
    </script>
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
            if (data.code == "404") {
                $('#msgsnack').html('<div class="alert alert-danger">' + data.msg + '</div>');
                
            } else {
                $('#msgsnack').html('<div class="alert alert-success">Order added successfully!.</div>');
                    // location.reload();
                    $('.order_data').html(data.snack);
            }
            // location.reload();
            // alert(data);
            
        }
    })
});

        </script>
</body>

</html>