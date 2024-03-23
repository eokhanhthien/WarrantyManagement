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
                        <h2 class='color-blue'>Thợ sửa chữa</h2>
                        <p>ỨNG DỤNG ĐẶT DỊCH VỤ TẠI NHÀ</p>
                    </div>
                </div>
            

                <div class = "panel">
                <div class = "panel-title">Dịch vụ</div>
                {{-- <div class = "panel-heading ">Vui lòng xem các ví dụ dưới đây khi đăng ký sản phẩm của bạn:</div> --}}
                
                {{-- <table class = "table">
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

                </table> --}}
                <div class="row mt-3">
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-may-say-toc.png" alt="">
                        <p>Máy sấy tóc</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-may-say.png" alt="">
                        <p>Máy sấy</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-may-giat.png" alt="">
                        <p>Máy giặt</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-may-hut-bui.png" alt="">
                        <p>Máy hút bụi</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-lo-nuong.png" alt="">
                        <p>Lò nướng</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-bep-tu.png" alt="">
                        <p>Bếp từ</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-ban-ui.png" alt="">
                        <p>Bàn là, bàn ủi</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-robot-hut-bui-lau-nha.png" alt="">
                        <p>Robot hút bụi</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-quat-dien.png" alt="">
                        <p>Quạt điện</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-noi-com-dien.png" alt="">
                        <p>Nồi ấp suất</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-may-xay-da-nang.png" alt="">
                        <p>Máy ép</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-lo-vi-song.png" alt="">
                        <p>Lò vi sóng</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2022/06/logo-sua-may-lanh-dieu-hoa.png" alt="">
                        <p>Điều hòa</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2021/10/Sua-am-dun-sieu-toc.png" alt="">
                        <p>Ấm siêu tốc</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2023/10/sua-may-loc-khong-khi.png" alt="">
                        <p>Máy lọc không khí</p>
                    </div>
                    <div class="col-2 text-center">
                        <img src="https://ahangduc.com/wp-content/uploads/2023/10/sua-may-hut-am.png" alt="">
                        <p>Máy hút ẩm</p>
                    </div>
                </div>

                </div>

                <div class="row mt-5">
                    <div class="col-12 mb-4">
                        <h6 class="text-center text-primary">Đảm bảo của chúng tôi</h6>
                    </div>
                    <div class="col-4 text-center">
                        <h5 class="gb-headline gb-headline-4f96cd7c"><span class="gb-icon"><svg viewBox="0 0 256 256" fill="#000000" height="32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="M223.68,66.15,135.68,18a15.88,15.88,0,0,0-15.36,0l-88,48.17a16,16,0,0,0-8.32,14v95.64a16,16,0,0,0,8.32,14l88,48.17a15.88,15.88,0,0,0,15.36,0l88-48.17a16,16,0,0,0,8.32-14V80.18A16,16,0,0,0,223.68,66.15ZM128,32l80.34,44-29.77,16.3-80.35-44ZM128,120,47.66,76l33.9-18.56,80.34,44ZM40,90l80,43.78v85.79L40,175.82Zm176,85.78h0l-80,43.79V133.82l32-17.51V152a8,8,0,0,0,16,0V107.55L216,90v85.77Z"></path></svg></span><span class="text-primary"><strong> Quy Trình Bài Bản</strong></span></h5>
                        <p>Gửi thiết bị hư hỏng về trung tâm bảo trì chuyên dụng với quy trình thu nhận 2 chiều chỉ trong 30 phút qua các dịch vụ Grab, Ahamove.</p>
                    </div>
                    <div class="col-4 text-center">
                            <h5 class="gb-headline gb-headline-137fcc5b"><span class="gb-icon"><svg viewBox="0 0 256 256" fill="#000000" height="32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="M226.76,69a8,8,0,0,0-12.84-2.88l-40.3,37.19-17.23-3.7-3.7-17.23,37.19-40.3A8,8,0,0,0,187,29.24,72,72,0,0,0,88,96,72.34,72.34,0,0,0,94,124.94L33.79,177c-.15.12-.29.26-.43.39a32,32,0,0,0,45.26,45.26c.13-.13.27-.28.39-.42L131.06,162A72,72,0,0,0,232,96,71.56,71.56,0,0,0,226.76,69ZM160,152a56.14,56.14,0,0,1-27.07-7,8,8,0,0,0-9.92,1.77L67.11,211.51a16,16,0,0,1-22.62-22.62L109.18,133a8,8,0,0,0,1.77-9.93,56,56,0,0,1,58.36-82.31l-31.2,33.81a8,8,0,0,0-1.94,7.1L141.83,108a8,8,0,0,0,6.14,6.14l26.35,5.66a8,8,0,0,0,7.1-1.94l33.81-31.2A56.06,56.06,0,0,1,160,152Z"></path></svg></span><span class="text-primary"><strong> Đội Thợ Chuyên Nghiệp</strong></span></h5>
                            <p>Nhóm kỹ thuật điện tử - điện máy được đào tạo bài bản và có chuyên môn cao từ 5-10 năm, kỹ năng chuyên môn cao.</p>
                    </div>
                    <div class="col-4 text-center">
                        <h5 class="gb-headline gb-headline-b3317464"><span class="gb-icon"><svg viewBox="0 0 256 256" fill="#000000" height="32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="M248,128a56,56,0,1,0-96,39.14V224a8,8,0,0,0,11.58,7.16L192,216.94l28.42,14.22A8,8,0,0,0,232,224V167.14A55.81,55.81,0,0,0,248,128ZM192,88a40,40,0,1,1-40,40A40,40,0,0,1,192,88Zm3.58,112.84a8,8,0,0,0-7.16,0L168,211.06V178.59a55.94,55.94,0,0,0,48,0v32.47ZM136,192a8,8,0,0,1-8,8H40a16,16,0,0,1-16-16V56A16,16,0,0,1,40,40H216a16,16,0,0,1,16,16,8,8,0,0,1-16,0H40V184h88A8,8,0,0,1,136,192Zm-16-56a8,8,0,0,1-8,8H72a8,8,0,0,1,0-16h40A8,8,0,0,1,120,136Zm0-32a8,8,0,0,1-8,8H72a8,8,0,0,1,0-16h40A8,8,0,0,1,120,104Z"></path></svg></span><span class="text-primary"><strong> Bảo Trì Chính Hãng</strong></span></h5>
                        <p>Trung tâm bảo trì điện máy của Antshome có kinh nghiệm sửa chữa nhiều loại , và cam kết chỉ sử dụng linh kiện chính hãng.</p>
                    </div>
                </div>

                {{-- <div class = "panel">
                <div class = "panel-title">Sản phẩm mới nhất</div>
               <div class="row">
                <div class="col-6">
                    <div class="size-banner-home">
                    <img src="{{asset('frontend/images/banner-toshiba.jpg')}}" alt="">

                    </div>
                </div>
                <div class="col-6 p-3">
                    <div>Máy photocopy được thiết kế để sao chép nhanh chóng các tài liệu từ các nguồn khác nhau</div><hr>
                    <div>Máy photocopy có nhiều tính năng hữu ích để giúp nâng cao hiệu suất làm việc của bạn</div><hr>
                    <div>Máy photocopy đơn giản và dễ sử dụng, có thể giúp tiết kiệm thời gian và năng suất cho công việc văn phòng của bạn</div><hr>
                    <a href="/recomment-product">Xem ngay</a>
                </div>
               </div>
                
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

                </div> --}}
            </div>

    </div>
</div>


@endsection