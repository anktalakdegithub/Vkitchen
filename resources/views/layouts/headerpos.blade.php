<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <!-- <link rel="shortcut icon" href="{{asset('web/')}}/images/favicon.png" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
</head>

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <!-- <a class="navbar-brand brand-logo" href="index.php"><img src="images/logo.svg" alt="logo"/></a> -->
                <a class="navbar-brand brand-logo text-primary" href="index.php">Kitchen</a>
                <a class="navbar-brand brand-logo-mini" href="index.php"><img src="{{asset('web/')}}/images/logo-mini.svg"
                        alt="logo" /></a>
                <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button"
                    data-toggle="minimize">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mr-lg-2">

                </ul>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item dropdown  d-flex">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                            id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="typcn typcn-bell mr-0"></i>
                            <span class="count bg-danger">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
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
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown"
                            id="profileDropdown">
                            <i class="typcn typcn-user-outline mr-0"></i>
                            <span class="nav-profile-name">User Name</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="typcn typcn-cog text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item">
                                <i class="typcn typcn-power text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar" style="display:none;">
                <ul class="nav">
                    <li class="nav-item">
                        <div class="d-flex sidebar-profile">
                            <div class="sidebar-profile-image">
                                <img src="images/faces/face29.png" alt="image">
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
                        </div>
                        <p class="sidebar-menu-title">Dash menu</p>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">
                            <i class="typcn typcn-device-desktop menu-icon"></i>
                            <span class="menu-title">Dashboard <span class="badge badge-primary ml-3">New</span></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/order')}}">
                            <i class="typcn typcn-device-desktop menu-icon"></i>
                            <span class="menu-title">Order</span>
                        </a>
                    </li>
                </ul>
            </nav>