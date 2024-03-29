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
                <form action="{{route('technicians-update',$data['id'])}}" enctype="multipart/form-data" method="post" class="col-5 form-border">
                @csrf
                <div class="wide">
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Tài khoản</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" placeholder="Username" value="{{$data['username']}}" name="username" required></div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Họ và tên</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" placeholder="full name" value="{{$data['fullname']}}" name="fullname" required></div>
                        <input class="input-add-order" type="hidden" placeholder="Password" value="{{$data['password']}}" name="password" required>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Email</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" placeholder="email" value="{{$data['email']}}" name="email" required></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Ảnh đại diện</p> </div>
                        <div class="col-8"><input class="" type="file" placeholder="Manufacturer name" name="image" required>
                    <?php if(isset($data['image']) && $data['image'] != NULL){?>
                        <img src="/uploads/avatar/{{$data['image']}}" alt="user" class="mt-2 mb-2" style="width: 100px"/> 
                    <?php }else{?>
                        <img src="{{asset('frontend/images/technician.png')}}" alt="user" class="mt-2 mb-2" style="width: 100px" /> 
                    <?php }?>
                    </div>
                    </div>
                   
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Phân quyền</p> </div>
                        <div class="col-8">
                            <select  name="role" id="" class='select-role'>
                                <option value="">Phân quyền</option>
                                <option <?php echo $data['role'] ===1 ? 'selected' : ''?> value="1">Quản trị viên</option>
                                <option <?php echo $data['role'] ===2 ? 'selected' : ''?> value="2">Kỹ thuật viên</option>
                            </select>

                        </div>
                    </div>
                </div>
                <button type='submit' class='btn btn-success'>Sửa</button>
                </form>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


@endsection
