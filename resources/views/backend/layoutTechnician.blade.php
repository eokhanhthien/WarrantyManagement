<?php
// echo "<pre>";
// print_r(Session::get('admin'));die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Warranty Management</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/assets/images/favicon.png')}}">
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('backend/assets/node_modules/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('backend/assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{asset('backend/assets/node_modules/c3-master/c3.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('backend/admin/css/style.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('backend/admin/css/pages/dashboard1.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('backend/admin/css/colors/default.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="/infomationTaff">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{asset('backend/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{asset('backend/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="{{asset('backend/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="{{asset('backend/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-xs-down search-box"> <a
                                class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i
                                    class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a
                                    class="srh-btn"><i class="fa fa-times"></i></a></form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#"
                                id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              
                                <?php if(Session::get('admin')['image'] != '') {
                                $img = Session::get('admin')['image'];
                                ?>
                                <img src="/uploads/avatar/{{$img}}" alt="user" class="" /> 
                            <?php } else{?>
                                <img src="{{asset('frontend/images/technician.png')}}" alt="user" class="" /> 
                               <?php }?> 
                                <span class="hidden-md-down">{{Session::get('admin')['username']}} &nbsp;</span> </a>
                                    <a href="{{route('logout')}}"><button class='btncustom m-2' style ="
                                                background-color: cornflowerblue !important;
                                                padding: 6px;
                                                border: none;
                                                border-radius: 4px;
                                                color: white;">  Đăng xuất <img style ="width: 30px;" src="{{asset('frontend/images/logout.png')}}"></button></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    
                    <ul id="sidebarnav">
                    <!-- <li > <div class='' style='background-color: #00b6cf;height: 30px;color: white;text-align: center;font-weight: 600;line-height: 30px;'>Thông tin</div></li> -->
                        <li> <a class="waves-effect waves-dark" href="{{route('infomationTaff')}} " aria-expanded="false"><img style ="width: 30px;" src="{{asset('frontend/images/infouser.png')}}"><span class="hide-menu">Thông tin cá nhân</span></a>
                        </li>

                         <!-- <li > <div class='' style='background-color: #00b6cf;height: 30px;color: white;text-align: center;font-weight: 600;line-height: 30px;'>Công việc</div></li> -->

                        <li> <a class="waves-effect waves-dark" href="{{route('employee')}} " aria-expanded="false"><img style ="width: 30px;" src="{{asset('frontend/images/fix.png')}}"><span class="hide-menu">Công việc được giao</span></a>
                        </li>

                        <!-- <li > <div class='' style='background-color: #00b6cf;height: 30px;color: white;text-align: center;font-weight: 600;line-height: 30px;'>Bản đồ</div></li> -->
                        <li> <a class="waves-effect waves-dark" href="{{route('map')}} " aria-expanded="false"><img style ="width: 30px;" src="{{asset('frontend/images/map.png')}}"><span class="hide-menu">Bản đồ khu vực</span></a>
                        </li>
                       
<!-- 
                        <li> <a class="waves-effect waves-dark" href="map-google.html" aria-expanded="false"><i
                                    class="fa fa-globe"></i><span class="hide-menu">Kích hoạt online</span></a>
                        </li> -->

                       

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">


            @yield('includeTechnicians')
           
            
         
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('backend/assets/node_modules/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('backend/assets/node_modules/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('backend/admin/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('backend/admin/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('backend/admin/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('backend/admin/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{asset('backend/assets/node_modules/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('backend/assets/node_modules/morrisjs/morris.min.js')}}"></script>
    <!--c3 JavaScript -->
    <script src="{{asset('backend/assets/node_modules/d3/d3.min.js')}}"></script>
    <script src="{{asset('backend/assets/node_modules/c3-master/c3.min.js')}}"></script>
    <!-- Chart JS -->
    <script src="{{asset('backend/admin/js/dashboard1.js')}}"></script>
</body>

</html>