@extends('frontend.layout')
@section('home')
<div class="content">
    <div class="container-content">
            <div class="container-fluid g-0">
                <div class="banner">
                    <div class="baner-content">
                        <h2 class='color-blue'>Thông tin khách hàng đăng ký</h2>
                        <p>Để biết thêm thông tin, vui lòng truy cập trang đăng ký sản phẩm.</p>
                    </div>
                </div>

                <div class = "panel">
                <form action="{{route('add-register-warranty')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class = "panel-title">Đăng ký sản phẩm</div>
                <div class = "panel-heading ">Thông tin khách hàng</div>
                
                <div class="row mb-3">
                    <div class="col col-2 lable-input" >Tên khách đăng ký  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input name='customer_name' type='text' class="input-register-warranty" placeholder = "Ex. RV123123123" required /></div>
                </div>

              
                <div class="row mb-3">
                    <div class="col col-2 lable-input" >Email  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input  name='customer_email' type='text' class="input-register-warranty" required /></div>
                </div>
                <div class="row mb-3">
                    <div class="col col-2 lable-input" >Số điện thoại  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input  name='customer_phone' type='text' class="input-register-warranty" required /></div>
                </div>
                <div class="row mb-3">
                    <div class="col col-2 lable-input" >Mã đơn hàng  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input  name='order_code' type='text' class="input-register-warranty" required /></div>
                </div>
                <div class="row mb-3">
                    <div class="col col-2 lable-input" >Chứng từ mua hàng  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input name='attach' type='file' class="input-register-warranty" required /></div>
                </div>
                <div class="row mb-3">
                    <div class="col col-5 text-end"><button type='submit' class='btn btn-primary'>Đăng ký</button></div>
                </div>
                @if (session('message'))
                    <div class="panel-heading text-error-ct">
                        {{ session('message') }}
                    </div>
                @endif
                </form>
                </div>
          


                <div class="check-serial">
                    <div class="check-title">Làm thế nào để bạn tìm thấy số sê-ri của bạn?</div>
                    <p >Số sê-ri có thể được tìm thấy trên nhãn dán * nằm ở mặt sau, mặt bên hoặc mặt dưới của sản phẩm.</p>
                    <p class="check-note">* Hình ảnh nhãn dán có thể trông khác nhau trên một sản phẩm thực tế.</p>
                    <div class="row">
                        <div class="col col-3">
                            <img class='check-img' src="{{asset('frontend/images/check1.jpg')}}" alt="">
                        </div>
                        <div class="col col-5">
                            <p>Dành cho máy in</p>
                            <p>(Số sê-ri sản phẩm sẽ có 10 ký tự chữ và số)</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col col-3">
                            <img class='check-img' src="{{asset('frontend/images/check2.jpg')}}" alt="">
                        </div>
                        <div class="col col-5">
                            <p>Dành cho máy in</p>
                            <p>(Số sê-ri sản phẩm sẽ có 11 ký tự chữ và số)</p>
                        </div>
                    </div>

                </div>
            </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


@endsection