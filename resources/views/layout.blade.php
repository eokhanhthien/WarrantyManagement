<?php
// echo "<pre>";
// print_r($_SERVER);die;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trang chủ</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('frontend/css/frontendstyle.css')}}">
    </head>
    <body>
    <div class="header">
        <div class="container-content">
            <div class="container-fluid g-0">
                <div class="row">
                    <div class="col col-9">
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
                            <div class="col col-3"><p class='header-nav '>Đăng ký sản phẩm</p></div>
                            <div class="col col-3"><p class='header-nav'>Kiểm tra tình trạng bảo hành</p></div>
                            <div class="col col-3"><p class='header-nav'>Đặt lịch bảo trì online</p></div>
                        </div>
                    </div>
                    <div class="col col-3">
                        <p class='header-nav'>Hotline: 0946144333</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----------------- Include ----------->
    @yield('home')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>
</html>
