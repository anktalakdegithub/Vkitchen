<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Kitchen POS Admin</title>
    <link rel="shortcut icon" href="{{asset('web/')}}/images/vk.png" />
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('web/')}}/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="{{asset('web/')}}/vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
     <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('web/')}}/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="{{asset('web/')}}/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('web/')}}/css/vertical-layout-light/style.css">
     
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
    <!-- endinject -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"/>
    <!--  -->
<style></style>
 </head>
  <body id="myvideo" >
    <!-- <div class="row" id="proBanner">
      <div class="col-12">
        <span class="d-flex align-items-center purchase-popup">
          <p>Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more!</p>
          <a href="https://www.bootstrapdash.com/product/celestial-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>
          <i class="typcn typcn-delete-outline" id="bannerClose"></i>
        </span>
      </div>
    </div> -->
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="{{url('/')}}"><img src="{{asset('web/')}}/images/vk.png" alt="logo"/></a>
          <!-- <a class="navbar-brand brand-logo text-primary" href="{{url('/')}}">Kitchen</a> -->
          <!-- <a class="navbar-brand brand-logo text-primary" href="{{url('/')}}"><img src="{{asset('web/')}}/images/vk.png" alt="logo"/></a> -->
          <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
          <a onclick="openFullscreen();"  onclick="openFullscreen();" onmouseover="openFullscreen();" oncontextmenu="openFullscreen()" ondrag="select()"><i class="bi bi-fullscreen"></i></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <ul class="navbar-nav mr-lg-2">
  
          </ul>
          <ul class="navbar-nav navbar-nav-right">
           
          
            <!-- <li class="nav-item dropdown  d-flex">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="typcn typcn-bell mr-0"></i>
                <span class="count bg-danger">2</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="typcn typcn-info-large mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Application Error</h6>
                    <p class="font-weight-light small-text mb-0">
                      Just now
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="typcn typcn-cog mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                    <p class="font-weight-light small-text mb-0">
                      Private message
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="typcn typcn-user-outline mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                    <p class="font-weight-light small-text mb-0">
                      2 days ago
                    </p>
                  </div>
                </a>
              </div>
            </li> -->
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
            <!-- <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
                <img src="{{asset('web/')}}/images/faces/face29.png" alt="image">
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
                <p class="sidebar-name">
                 XYZ
                </p>
                <p class="sidebar-designation">
                  Welcome
                </p>
              </div>
            </div> -->
            <!-- <div class="nav-search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Type to search..." aria-label="search" aria-describedby="search">
                <div class="input-group-append">
                  <span class="input-group-text" id="search">
                    <i class="typcn typcn-zoom"></i>
                  </span>
                </div>
              </div>
            </div> -->
            <!-- <p class="sidebar-menu-title">Dash menu</p> -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard </span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard <span class="badge badge-primary ml-3">New</span></span>
            </a>
          </li> -->
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
          <!-- <li class="nav-item">
            <a class="nav-link" href="{{url('/order')}}">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Order</span>
            </a>
          </li> -->
          
          <li class="nav-item">
            <a class="nav-link" href="{{url('/payment')}}">
              <i class="typcn typcn-chart-pie-outline menu-icon"></i>
              <span class="menu-title">Payment </span>
            </a>
          </li>
          
          <!-- <li class="nav-item">
            <a class="nav-link" href="{{url('/vendor_list')}}">
              <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Vendor </span>
            </a>
          </li> -->
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
          <!-- <li class="nav-item">
            <a class="nav-link" href="{{url('/subsciption')}}">
              <i class="typcn typcn-chart-pie-outline menu-icon"></i>
              <span class="menu-title">Subscription Order</span>
            </a>
          </li> -->
          
          <li class="nav-item">
            <a class="nav-link" href="{{url('/expense')}}">
              <i class="typcn typcn-chart-pie-outline menu-icon"></i>
              <span class="menu-title">Expenses </span>
            </a>
          </li>
<!-- 
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="typcn typcn-briefcase menu-icon"></i>
              <span class="menu-title">Cash & Bank</span>
              <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/bank')}}">Bank Accounts</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/cash')}}">Cash In Hands</a></li>
              </ul>
            </div>
          </li> -->
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
          <li class="nav-item">
            <a class="nav-link" href="{{url('logout')}}">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">Logout </span>
            </a>
          </li>
      
      </nav>