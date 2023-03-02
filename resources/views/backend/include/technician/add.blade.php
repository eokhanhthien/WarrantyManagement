@extends('backend.layout')
@section('order')
<style>
    select.select-role {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
}
</style>
<meta name="_token" content="{{ csrf_token() }}">

<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Đăng ký nhân viên</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Đăng ký nhân viên</li>
                        </ol>
                    </div>
                    <div class="col-md-7 align-self-center">
       
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <button class="btn btn-primary mr-10"> <a href="{{route('technicians')}}">Quay lại</a> </button>
                <form action="{{route('add-technicians')}}" method="post" class="col-5 form-border-5">
                @csrf
                <div class="wide">
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Tài khoản</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" placeholder="Username" name="username" required></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Mật khẩu</p> </div>
                        <div class="col-8"><input class="input-add-order" type="password" placeholder="Password" name="password" required></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Họ và tên</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" placeholder="full name" name="fullname" required></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Email</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" placeholder="email" name="email" required></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Phân quyền</p> </div>
                        <div class="col-8">
                            <select name="role" id="" class='select-role'>
                                <option value="">Phân quyền</option>
                                <option value="1">Quản trị viên</option>
                                <option value="2">Kỹ thuật viên</option>
                            </select>

                        </div>
                    </div>
                </div>
                <button type='submit' class='btn btn-success mt-3'>Đăng ký</button>
                </form>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


@endsection
