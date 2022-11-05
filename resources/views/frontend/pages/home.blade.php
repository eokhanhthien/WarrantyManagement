<?php
// echo "<pre>";
// print_r($_SERVER['PATH_INFO']);die;
?>
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
                <div class = "panel-title">Số sê-ri mẫu</div>
                <div class = "panel-heading ">Vui lòng xem các ví dụ dưới đây khi đăng ký sản phẩm của bạn:</div>
                
                <table class = "table">
                    <tr>
                        <th>Mẫu sản phẩm Epson</th>
                        <th>Mẫu Sê-ri sản phẩm </th>
                        <th>Nhận xét </th>
                    </tr>
                    
                    <tr>
                        <td>Máy in phun</td>
                        <td>RADK123456</td>	
                        <td>10 ký tự chữ và số</td>
                    </tr>
                    
                    <tr>
                        <td>Máy chiếu doanh nghiệp</td>
                        <td>TU2K4502800</td>	
                        <td>11 ký tự chữ và số</td>
                    </tr>
                    <tr>
                        <td>Máy in kim</td>
                        <td>R9DY042200</td>	
                        <td>10 ký tự chữ và số</td>
                    </tr>
                    <tr>
                        <td>Máy in Laser (AcuLaser)</td>
                        <td>Q6VF230020</td>	
                        <td>10 ký tự chữ và số</td>
                    </tr>
                    <tr>
                        <td>Máy quét</td>
                        <td>JMMZ101659</td>	
                        <td>10 ký tự chữ và số</td>
                    </tr>
                    <tr>
                        <td>Máy in nhiệt</td>
                        <td>PX5Z000401</td>	
                        <td>10 ký tự chữ và số</td>
                    </tr>

                </table>
                
                </div>


                <div class="check-serial">
                    <div class="check-title">Làm thế nào để bạn tìm thấy số sê-ri của bạn?</div>
                    <p >Số sê-ri có thể được tìm thấy trên nhãn dán * nằm ở mặt sau, mặt bên hoặc mặt dưới của sản phẩm.</p>
                    <p class="check-note">* Hình ảnh nhãn dán có thể trông khác nhau trên một sản phẩm thực tế.</p>
                    <div class="row">
                        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-7">
                            <img class='check-img' src="{{asset('frontend/images/check1.jpg')}}" alt="">
                        </div>
                        <div class="col col-5">
                            <p>Dành cho máy in</p>
                            <p>(Số sê-ri sản phẩm sẽ có 10 ký tự chữ và số)</p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-7">
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