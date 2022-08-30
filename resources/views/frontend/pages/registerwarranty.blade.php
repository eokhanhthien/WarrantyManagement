@extends('frontend.layout')
@section('home')
<div class="content">
    <div class="container-content">
            <div class="container-fluid g-0">
                <div class="banner">
                    <div class="baner-content">
                        <h2 class='color-blue'>Đăng ký sản phẩm Epson trực tuyến</h2>
                        <p>Để biết thêm thông tin, vui lòng truy cập trang đăng ký sản phẩm.</p>
                    </div>
                </div>
            
                <div class = "panel">
                <div class = "panel-title">Đăng ký sản phẩm</div>
                <div class = "panel-heading ">Tôi có thể tra số seri ở đâu?</div>
                
                <div class="row mb-3">
                    <div class="col col-2 lable-input" >Số serial  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input type='text' class="input-register-warranty" placeholder = "Ex. RV123123123"/></div>
                </div>

                <div class="row mb-3">
                    <div class="col col-2 lable-input" >Tên máy  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input type='text' class="input-register-warranty" placeholder = ""/></div>
                </div>

                <div class="row mb-3">
                    <div class="col col-2 lable-input" >Ngày mua  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input  type='date' class="input-register-warranty" /></div>
                </div>

                <div class="row mb-3">
                    <div class="col col-2 lable-input" >Chứng từ mua hàng  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input  type='file' class="input-register-warranty" /></div>
                </div>
                <div class="row mb-3">
                    <div class="col col-5 text-end"><button class='btn btn-primary'>Tiếp theo</button></div>
                </div>
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


@endsection