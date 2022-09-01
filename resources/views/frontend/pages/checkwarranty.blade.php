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
                        <div class="row g-0">
                        <span class='col col-9'><input placeholder = "Nhập số serial Ex. RV123123123" type='text' class= 'input-check-warrantt' /></span>
                        <span class='col col-3'><button class='btn-primary-ct'>Kiểm tra bảo hành</button></span>
                        </div>
                        
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