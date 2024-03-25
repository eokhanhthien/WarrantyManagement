<?php
// echo "<pre>";
// print_r($_SERVER);die;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend/images/warranty.png')}}">

        <title>Trang chủ</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('frontend/css/frontendstyle.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
        
    </head>
    <body>
    <div class="header">
        <div class="container-content">
            <div class="container-fluid g-0">
                <div class="row">
                    <div class="col col-12">
                        <div class="row g-0">
                        <div class="col col-2">
                            <div class="size-logo">
                                <img src="{{asset('frontend/images/logo.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col col-1 <?php if(!isset($_SERVER['PATH_INFO'])) { echo "header-active";}  {echo " ";} ?>">
                        <a href="{{route('/')}}">
                            <div class="size-logo-home ">
                                <img src="{{asset('frontend/images/home.png')}}" alt="">
                            </div>
                        </a>
                        </div>
                            {{-- <div class="col col-2  <?php if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] == '/register-warranty' || isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] == '/register-warranty-info-customer' ) { echo "header-active";}  {echo " ";} ?>"> <a  href="{{route('register-warranty')}}" style=' text-decoration: none;'><p class='header-nav '>Đăng ký sản phẩm</p></a> </div> --}}
                            {{-- <div class="col col-3  <?php if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] == '/check-warranty' ) { echo "header-active";}  {echo " ";} ?>"> <a  href="{{route('check-warranty')}}" style=' text-decoration: none;'><p class='header-nav '>Kiểm tra tình trạng bảo hành</p></a> </div>
                            <div class="col col-2 <?php if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] == '/claim-warranty' ) { echo "header-active";}  {echo " ";} ?>"> <a  href="{{route('claim-warranty')}}" style=' text-decoration: none;'><p class='header-nav '>Yêu cầu bảo hành</p></a> </div> --}}
                            <div class="col col-2 <?php if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] == '/claim-fix' ) { echo "header-active";}  {echo " ";} ?>"> <a  href="{{route('claim-fix')}}" style=' text-decoration: none;'><p class='header-nav '>Yêu cầu sửa chữa</p></a> </div>
                            <!-- <div class="col col-2"><p class='header-nav'>Đặt lịch bảo trì online</p></div> -->
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>


    <!----------------- Include ----------->
    @yield('home')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script>
    </body>
</html>
