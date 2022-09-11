<?php

// if(Session::get('serial_check')){
//     echo '<pre>';
//    print_r(Session::get('serial_check')['serial_number']);die; 
// }

?>
@extends('frontend.layout')
@section('home')
<div class="content">
    <div class="container-content">
            <div class="container-fluid g-0">
                <div class="banner">
                    <div class="baner-content">
                        <h2 class='color-blue'>Hỗ trợ và bảo hành cho sản phẩm Epson của bạn</h2>
                        <p>Nhập số sê-ri sản phẩm của bạn để hiển thị phạm vi bảo hành của bạn.</p>
                    </div>
                </div>
            
                <div class="text-primary mt-4 mb-3 where-serial" data-toggle="modal" data-target=".bd-example-modal-lg">Tôi có thể tra số seri ở đâu?</div>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">


                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                    </div>
                        <div class="row mt-3">
                            <div class="col col-4 p-4">
                                <img src="{{asset('frontend/images/check1.jpg')}}" alt="" style='width: 100%'>
                            </div>
                            <div class="col col-8">
                            <div class="check-title">Làm thế nào để bạn tìm thấy số sê-ri của bạn?</div>
                            <p>Có thể tra số seri tại nhãn dán* nằm ở mặt sau, hai bên hoặc đáy sản phẩm.</p>
                            <br>
                            <div class="check-title text-check-war">*Hình ảnh nhãn dán trên thực tế có thể sẽ khác.</div>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
          
                <div class="row">
                    <div class="col col-8"> 

                        <form action="{{route('check-serial')}}" method="post" >
                        @csrf 
                        <div class="row g-0"> 
                            <span class='col col-9'><input name='check-serial' placeholder = "Nhập số serial Ex. RV123123123" type='text' class= 'input-check-warrantt' required /></span>
                            <span class='col col-3'><button type='submit' class='btn-primary-ct'>Kiểm tra bảo hành</button></span>         
                        </div>
                        </form>
                        @if (session('message'))
                            <div class="panel-heading text-error-ct">
                                {{ session('message') }}
                            </div>
                        @endif


                @if (session('serial_check'))
                <div class="info-product-check">
                    <div class="row">
                        <div class="col col-6">                    
                            <p>Số serial: <strong><?php echo Session::get('serial_check')['serial_number'] ?></strong> </p>
                            <p>Tên sản phẩm: <strong> <?php echo Session::get('product_check')['name'] ?></strong></p>
                            <p>Ngày mua:<strong> <?php echo Session::get('serial_check')['activate_time'] ?></strong></p>
                            <p>Thời gian bảo hành:<strong> <?php echo Session::get('serial_check')['warranty_time'] ?> tháng</strong></p>
                        </div>
                        <div class="col col-6">
                            <!-- <img style='width: 100px' src="https://mucinmanhtai.com/wp-content/uploads/2020/09/my_in_laser_mu_canon_lbp_621cw.jpg" alt=""> -->
                            <img style='width: 100px' src="/uploads/product/{{ Session::get('product_check')['image']}}" alt="" >
                            <div class="noti-check">
                                <p>Trạng thái sản phẩm: <strong><?php echo Session::get('serial_check')['status']===1?'CHẾ ĐỘ BẢO HÀNH':'CHƯA KíCH HOẠT' ?></strong></p>
                                <p>Vui lòng kiểm tra chi tiết bảo hành để biết thêm thông tin về sản phẩm</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if (session('serial_check')['status']===1)
                <div class = "panel">
                <div class = "panel-title">Chi tiết bảo hành</div>
                              
                <table class = "table">     
                    <tr style='border : 0px solid transparent'>
                        <td>Bảo hành Đầu in/ Đèn <strong>24 months Carry-in warranty</strong></td>
                        <td>Ngày hết hạn bảo hành đầu in đến <strong> <?php echo Session::get('serial_check')['expired_time'] ?> </strong></td>	
                    </tr>
                    <tr style='border : 0px solid transparent'>
                        <td>Bảo hành linh kiện thay thế <strong>24 months Carry-in warranty</strong></td>
                        <td>Ngày kết thúc bảo hành linh kiện đến <strong> <?php echo Session::get('serial_check')['expired_time'] ?> </strong></td>	
                    </tr>
                    <tr style='border : 0px solid transparent'>
                        <td>Chi phí nhân công <strong>24 months Carry-in warranty</strong></td>
                        <td>Ngày kết thúc hỗ trợ chi phí nhân công đến <strong> <?php echo Session::get('serial_check')['expired_time'] ?> </strong></td>	
                    </tr>
                  

                </table>
                
                </div>
                @endif

                @endif



                    </div>
                    <div class="col col-4">
                        <h5 class='text-primary'>Tổng đài hỗ trợ Epson</h5>
                        <p class='text-check-war'>Liên hệ với chúng tôi qua trang phản hồi tại đây hoặc email hỗ trợ: support@epson.com.vn để biết thêm thông tin</p>

                        <h5 class='text-primary'>Trung tâm bảo hành được ủy quyền của Epson</h5>
                        <p class='text-check-war'>Liên hệ với chúng tôi qua trang phản hồi tại đây hoặc email hỗ trợ: support@epson.com.vn để biết thêm thông tin</p>
                        <h5 class='text-primary'>Tổng đài hỗ trợ Epson</h5>
                        <p class='text-check-war'>Liên hệ với chúng tôi qua trang phản hồi tại đây hoặc email hỗ trợ: support@epson.com.vn để biết thêm thông tin</p>

                    </div>
                </div>
        

                
             
            </div>

    </div>
</div>


@endsection