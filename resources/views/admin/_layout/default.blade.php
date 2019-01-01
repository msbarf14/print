<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PrintStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{url('template/assets/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{url('template/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('template/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('template/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('template/assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{url('template/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('template/assets/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{url('template/assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{url('template/assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{url('template/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{url('template/assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{url('template/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        @include('admin._layout.sidebar')
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="{{url('template/assets/images/author/avatar.png')}}" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- page container area end -->
    <!-- jquery latest version -->
    <script src="{{url('template/assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{url('template/assets/js/popper.min.js')}}"></script>
    <script src="{{url('template/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('template/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('template/assets/js/metisMenu.min.js')}}"></script>
    <script src="{{url('template/assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('template/assets/js/jquery.slicknav.min.js')}}"></script>


    @yield('script')
    <!-- others plugins -->
    <script src="{{url('template/assets/js/plugins.js')}}"></script>
    <script src="{{url('template/assets/js/scripts.js')}}"></script>
</body>

</html>
