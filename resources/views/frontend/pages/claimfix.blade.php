@extends('frontend.layout')
@section('home')
<div class="content">
    <div class="container-content">
            <div class="container-fluid g-0">
                <div class="banner">
                    <div class="baner-content">
                        <h2 class='color-blue'>Yêu cầu sửa chửa online</h2>
                        <p>Để biết thêm thông tin, vui lòng truy cập trang đăng ký sản phẩm.</p>
                    </div>
                </div>


          

                <!-- Đăng ký bảo trì -->
                <div class = "panel">
                <form action="{{route('send-claim-fix')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class = "panel-title-guest">Yêu cầu sữa chữa</div>
                <div class = "panel-heading ">Các thông tin trên hóa đơn mua hàng</div>
                
                <div class="row mb-3">
                    <div class="col col-xl-2 col-lg-6 col-md-6 col-sm-6 col-4 lable-input" >Tên khách hàng  <span class='text-danger'>*</span> </div>
                    <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-8"><input name='customer_name' type='text' class="input-register-warranty" placeholder = "Ex. Nguyễn Văn A" required /></div>
                </div>

              
                <div class="row mb-3">
                    <div class="col col-xl-2 col-lg-6 col-md-6 col-sm-6 col-4 lable-input" >Email  <span class='text-danger'>*</span> </div>
                    <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-8"><input  name='customer_email' type='text' class="input-register-warranty" placeholder = "Ex. thien123@gmail.com" required /></div>
                </div>
                <div class="row mb-3">
                    <div class="col col-xl-2 col-lg-6 col-md-6 col-sm-6 col-4 lable-input" >Số điện thoại  <span class='text-danger'>*</span> </div>
                    <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-8"><input  name='customer_phone' type='text' class="input-register-warranty" placeholder = "Ex. 0946144333" required /></div>
                </div>
<!-- 
                <div class="row mb-3">
                    <div class="col col-xl-2 col-lg-6 col-md-6 col-sm-6 col-4 lable-input" >Số serial  <span class='text-danger'>*</span> </div>
                    <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-8"><input name='product_serial' type='text' class="input-register-warranty" placeholder = "Ex. RV123123123" required /></div>
                </div> -->

                <div class="row mb-10">
                                                <div class="col col-xl-2 col-lg-6 col-md-6 col-sm-6 col-4 lable-input">
                                                    <p class="address-tag">Hãng <span class='text-danger'>*</span></p> 
                                                </div>
                                                <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-8 ">
                                                    <select  id="manu" class="address-main choose-product manu input-register-warranty" name="product_manu" required >
                                                    <option value="">Chọn hãng</option>
                                                    <?php if(isset($manufacturer) && $manufacturer != NULL){ ?>
                                                        <?php foreach($manufacturer as $key => $val){?>
                                                            <option value="<?= $val['id'] ?>" data-manu="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                                </div>

                                            <div class="row mb-10">
                                                <div class="col col-xl-2 col-lg-6 col-md-6 col-sm-6 col-4 lable-input">
                                                    <p class="address-tag">Sản phẩm <span class='text-danger'>*</span></p> 
                                                </div>
                                                <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-8">
                                                    <select  id="product" class="address-main  product0 input-register-warranty" name="product_id"  required>
                                                        <option value="">Chọn sản phẩm</option>
                                                    </select>
                                                </div>
                                            </div>
                
                <div class="row  mb-10">
                    <div class="col col-xl-2 col-lg-6 col-md-6 col-sm-6 col-4  lable-input">
                        <p class="address-tag">Tỉnh/thành phố: <span class='text-danger'>*</span></p> 
                    </div>
                    <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-8 ">
                        <select name="address_city" id="city" class="address-main choose city input-register-warranty" >
                        <option value="">Chọn tỉnh / Thành phố</option>
                        <?php if(isset($data) && $data != NULL){ ?>
                            <?php foreach($data as $key => $val){?>
                                <option value="<?= $val['name_city'] ?>" data-city="<?= $val['matp'] ?>"><?= $val['name_city'] ?></option>
                            <?php } ?>
                        <?php } ?>
                        </select>
                    </div>
                    </div>

                <div class="row  mb-10">
                    <div class="col col-xl-2 col-lg-6 col-md-6 col-sm-6 col-4  lable-input">
                        <p class="address-tag">Quận/huyện: <span class='text-danger'>*</span></p> 
                    </div>
                    <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-8">
                        <select name="address_province" id="province" class="address-main choose province input-register-warranty" >
                            <option value="">Chọn quận / huyện</option>
                        </select>
                    </div>
                </div>

                <div class="row  mb-10">
                    <div class="col col-xl-2 col-lg-6 col-md-6 col-sm-6 col-4  lable-input">
                        <p class="address-tag">Xã phường/thị trấn: <span class='text-danger'>*</span></p> 
                    </div>
                    <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-8">
                        <select name="address_wards" id="wards" class="address-main wards input-register-warranty" >
                            <option value="">Chọn xã phường / thị trấn</option>
                        </select>
                    </div>
                </div>
                <div class="row  mb-10">
                <div class="col col-xl-2 col-lg-6 col-md-6 col-sm-6 col-4  lable-input">
                        <p class="address-tag">Mô tả tình trạng: <span class='text-danger'>*</span></p> 
                    </div>
                    <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-8">
                        <textarea name="detailed_description" id="wards" class="address-main wards input-register-warranty" >
                            
                        </textarea>
                    </div>

                </div>

                <!-- <div class="row mb-3">
                    <div class="col col-2 lable-input" >Chứng từ mua hàng  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input name='attach' type='file' class="input-register-warranty" required /></div>
                </div> -->
                <div class="row mb-3">
                    <div class="col col-5 text-end"><button type='submit' class='btn btn-primary guest'>Gửi yêu cầu</button></div>
                </div>
                @if (session('message'))
                    <div class="panel-heading text-error-ct">
                        {{ session('message') }}
                    </div>
                @endif

                @if (session('register-success'))
                    <div class="register-success">
                        {{ session('register-success') }}
                        <p>Cảm ơn bạn đã mua sản phẩm của chúng tôi</p>
                        <p>Bạn có thể xem phạm vi bảo hành sản phẩm bằng cách <a href="{{route('check-warranty')}}">kiểm tra bảo hành</a> </p>
                    </div>
                @endif

                </form>
                </div>

                <div class="check-serial">
                    <div class="check-title">Chính sách bảo hành của chúng tôi</div>
                    <div class="row">
                        <div class="col col-12">
                            <img class='check-img' src="{{asset('frontend/images/chinhsachsua.jpg')}}" alt="">
                        </div>
                     
                    </div>

                    <div class="row mt-3">
                        <div class="col col-12">
                            <p><strong>Điều 1. </strong> Sau khi mua sản phẩm , khách hàng được cung cấp sổ bảo hành và Kích hoạt bảo hành điện tử.</p>
                            <p><strong>Điều 2. </strong> Thời hạn bảo hành do Nhà sản xuất quy định.</p>
                            <p><strong>Điều 3. </strong> Quy trình bảo hành</p>
                            <ul>
                                <li>• Bước 1: Nhận thông tin yêu cầu bảo hành sản phẩm từ khách hàng</li>
                                <li>• Bước 2: Chuyên viên tư vấn, hướng dẫn kiểm tra và hướng dẫn khách khắc phục từ xa. Hoặc chuyên viên đến kiểm tra và sữa chữa tận nơi (đối với lỗi khác hàng không tự khắc phục được)</li>
                                <li>• Bước 3: Nếu không sửa được tại chỗ sẽ mang về trung tâm bảo hành, lắp máy cho khách hàng dùng tạm</li>
                                <li>• Bước 4: Sửa chữa máy theo quy trình, quy định của nhà sản xuất và kiểm tra lại lần nữa trước khi gia cho khách</li>
                                <li>• Bước 5:  Lắp đặt máy đã bảo hành cho khách hàng, và thu hồi máy lắp cho khách dùng tạm.</li>
                            </ul>
                            <p><strong>Điều 4. </strong> Quy định bảo hành</p>
                            <ul>
                                <li>• Sản phẩm còn trong hạn bảo hành</li>
                                <li>• Phiếu bảo hành đầy đủ thông tin: số serial, tên khách hàng, số điện thoại, địa chỉ, ngày mua. Tem bảo hành phải còn nguyên vẹn, không rách rời, tẩy xóa.</li>
                                <li>• Hư hỏng do chất lượng linh kiện hay lỗi quy trình sản xuất.</li>
                                <li>• Sản phẩm không nằm trong trường hợp bị từ chối bảo hành.</li>
                            </ul>

                            <p><strong>Điều 5. </strong> Trong mọi trường hợp, thời gian thực hiện bảo hành sản phẩm phụ thuộc vào chính sách hoặc mức độ sẵn có của thiết bị thay thế tại Trung Tâm Bảo Hành và sẽ được thông báo cụ thể cho Quý khách.</p>

                        </div>
                    </div>

                </div>
            </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
    $(document).ready(function() {

    var choose_product = document.querySelectorAll('.choose-product');
    // console.log(choose_product);
    
    for(let i=0;i< choose_product.length;i++){
        choose_product[i].onchange = function(){
        console.log(i);
        var action = $(this).attr('id');
        var matp = $(this).find(':selected').data('manu');
        var result = `product${i}`;
        // console.log(`product${i}`);
      
        $.ajax({
                url: "{{route('product-choose')}}",
                method:"post",
                data: {
                    action:action,
                    matp : matp,
                    _token: '{{csrf_token()}}'
                }, 
                success : function(response) {
                    $('.'+result).html(response);
                }
            })

        };
    }


});
</script>

<script>
    $('.choose').change(function() {
        var action = $(this).attr('id');
        // var matp = $(this).val();
        var matp = $(this).find(':selected').data('city');
        var result = '';
        if(action=='city'){
            result = 'province';
        }else{
            result = 'wards';
        }
        $.ajax({
                url: "{{route('order-address')}}",
                method:"post",
                data: {
                    action:action,
                    matp : matp,
                    _token: '{{csrf_token()}}'
                }, 
                success : function(response) {
                    $('#'+result).html(response);
                }
            })
    })
</script>

@endsection