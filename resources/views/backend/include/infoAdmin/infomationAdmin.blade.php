@extends('backend.layout')
@section('order')
<?php
// echo "<pre>";
//  print_r($jobemployee);die;
 ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.csss">
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                @if (session('message'))
                    <div class="text-success-ct">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Thông tin cá nhân</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Thông tin cá nhân</li>
                        </ol>
                    </div>
                    <div class="col-md-7 align-self-center">

                    </div>
                </div>
                <div class="row">
                    <div class="col col-2">
                        <div class="avatar">
                            <img  src="{{asset('frontend/images/avatarAdmin.png')}}">
                        </div>
                    </div>
                    <div class="col col-8">
                        <div class="row g-0">
                            <div class="text-ct col col-3"><strong>Họ và tên:</strong>  </div>
                            <div class="text-ct-1 col col-6">{{Session::get('admin')['fullname'] }}</div>
                        </div>
                        <div class="row g-0">
                            <div class="text-ct col col-3"><strong>Email:</strong>  </div>
                            <div class="text-ct-1 col col-6">{{Session::get('admin')['email'] }}</div>
                        </div>
                        <div class="row g-0">
                            <div class="text-ct col col-3"><strong>Chức vụ:</strong>  </div>
                            <div class="text-ct-1 col col-6"><?php echo Session::get('admin')['role'] == 1? "Quản trị viên": " Khác" ?></div>
                        </div>
                        <div class="row g-0">
                            <div class="text-ct col col-3"><strong>Số điện thoại:</strong>  </div>
                            <div class="text-ct-1 col col-6">0946144333</div>
                        </div>
                        <div class="row g-0">
                            <div class="text-ct col col-3"><strong>Địa chỉ:</strong>  </div>
                            <div class="text-ct-1 col col-8">Ấp Đá Bạc, xã Khánh Bình Tây, huyện Trần Văn Thời, tỉnh Cà Mau</div>
                        </div>
                    </div>
                </div>



            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <br><script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>            

@endsection
