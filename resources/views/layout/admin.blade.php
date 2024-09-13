<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

        @yield('style')
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Right navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>                   
                </ul>
                <div class="navbar-nav pl-2">
                    <!-- <ol class="breadcrumb p-0 m-0 bg-white">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->
                </div>
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
                            <img src="{{ asset('uploads/avatar.png') }}" class='img-circle elevation-2' width="40" height="40" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                            <h4 class="h4 mb-0 text-capitalze"><strong>{{ Auth::guard('admin')->user()->name }}</strong></h4>
                            <div class="mb-3">{{ Auth::guard('admin')->user()->email }}</div>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-lock mr-2"></i> Change Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('admin.logout') }}" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout                         
                            </a>                            
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="#" class="brand-link">
                    <img src="{{ asset('uploads/small-logo.png') }}" alt="AdminLTE Logo" class="brand-image">
                    <span class="brand-text font-weight-light">Visit Website</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>                                                                
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('restaurants.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Restaurant</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('foods.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Food</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.orders.pending') }}" class="nav-link">
                                    <i class="nav-icon fas fa-shopping-bag"></i>
                                    <p>Orders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.users') }}" class="nav-link">
                                    <i class="nav-icon  fas fa-users"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            @yield('content')
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                
                <strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
            </footer>
            
        </div>
        <!-- ./wrapper -->
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('assets/js/demo.js') }}"></script>

        @yield('script')
    </body>
</html>