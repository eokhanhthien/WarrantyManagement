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
                <form action="{{route('add-register-warranty')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class = "panel-title">Đăng ký sản phẩm</div>
                <div class = "panel-heading ">Các thông tin trên hóa đơn mua hàng</div>
                
                <div class="row mb-3">
                    <div class="col col-2 lable-input" >Số serial  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input name='serial' type='text' class="input-register-warranty" placeholder = "Ex. RV123123123" required /></div>
                </div>

                <div class="row mb-10">
                    <div class="col col-2 lable-input">
                        <p class="address-tag">Hãng <span class='text-danger'>*</span></p> 
                    </div>
                    <div class="col col-3 ">
                        <select  id="city" class="address-main choose city input-register-warranty" required >
                        <option value="">Chọn hãng</option>
                        <?php if(isset($manufacturer) && $manufacturer != NULL){ ?>
                            <?php foreach($manufacturer as $key => $val){?>
                                <option value="<?= $val['id'] ?>" data-city="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                            <?php } ?>
                        <?php } ?>
                        </select>
                    </div>
                    </div>

                <div class="row mb-10">
                    <div class="col col-2 lable-input">
                        <p class="address-tag">Sản phẩm <span class='text-danger'>*</span></p> 
                    </div>
                    <div class="col col-3">
                        <select name="id_product" id="province" class="address-main choose province input-register-warranty" required>
                            <option value="">Chọn sản phẩm</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col col-2 lable-input" >Ngày mua  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input  name='date-buy' type='date' class="input-register-warranty" required /></div>
                </div>

                <div class="row mb-3">
                    <div class="col col-2 lable-input" >Chứng từ mua hàng  <span class='text-danger'>*</span> </div>
                    <div class="col col-3"><input name='attach' type='file' class="input-register-warranty" required /></div>
                </div>
                <div class="row mb-3">
                    <div class="col col-5 text-end"><button type='submit' class='btn btn-primary'>Tiếp theo</button></div>
                </div>
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

<script>
    $(document).ready(function() {
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
                url: "{{route('serial-choose')}}",
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
});
</script>
@endsection