@extends('backend.layout')
@section('order')
<meta name="_token" content="{{ csrf_token() }}">
<style>
    .item_option{
        background-color: white;
        padding: 20px 0;
        border-radius: 6px;
        border: 1px solid #ccc
    }
    .number-option.col-12.text-danger {
    color: blue !important;
    font-size: 18px;
    font-weight: 500;
}
</style>
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Lập đơn hàng</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Lập đơn hàng</li>
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
                <button class="btn btn-primary mr-10"> <a href="{{route('order')}}">Quay lại</a> </button>
                <form action="{{route('add-order')}}" method="post">
                @csrf
                <div class="wide col-5">
                    <div class="form-border">
                    <div class="row g-0">
                        <div class="col-4"> <p class="label-add-order"><img style ="width: 22px;" src="{{asset('frontend/images/id.png')}}"> Tên khách hàng:</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" placeholder="Full name" name="data_order[name_customer]" required></div>
                    </div>

                   <div class="row mt-3 g-0">
                        <div class="col-4"> <p class="label-add-order"><img style ="width: 22px;" src="{{asset('frontend/images/phone.png')}}"> Số điện thoại:</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" placeholder="Phone" name="data_order[phone_customer]" required></div>
                    </div>

                    <div class="row mt-3 g-0">
                        <div class="col-4"> <p class="label-add-order"><img style ="width: 22px;" src="{{asset('frontend/images/mail.png')}}"> Email:</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" placeholder="Email" name="data_order[email_customer]" required></div>
                    </div>
                    </div>
                    <div class="row g-0 form-border">
                <h4 class="col col-xl-12 infor-pay-name mt-3"><img style ="width: 22px;" src="{{asset('frontend/images/positon.png')}}"> Địa chỉ nhận hàng:</h4>
                <div class="row g-0 mb-10">
                    <div class="col col-xl-4">
                        <p class="address-tag">Tỉnh/thành phố:</p> 
                    </div>
                    <div class="col col-xl-8 ">
                        <select name="data_order[address_city]" id="city" class="address-main choose city" >
                        <option value="">Chọn tỉnh / Thành phố</option>
                        <?php if(isset($data) && $data != NULL){ ?>
                            <?php foreach($data as $key => $val){?>
                                <option value="<?= $val['name_city'] ?>" data-city="<?= $val['matp'] ?>"><?= $val['name_city'] ?></option>
                            <?php } ?>
                        <?php } ?>
                        </select>
                    </div>
                    </div>

                <div class="row g-0 mb-10">
                    <div class="col col-xl-4">
                        <p class="address-tag">Quận/huyện:</p> 
                    </div>
                    <div class="col col-xl-8">
                        <select name="data_order[address_province]" id="province" class="address-main choose province" >
                            <option value="">Chọn quận / huyện</option>
                        </select>
                    </div>
                </div>

                <div class="row g-0 mb-10">
                    <div class="col col-xl-4">
                        <p class="address-tag">Xã phường/thị trấn:</p> 
                    </div>
                    <div class="col col-xl-8">
                        <select name="data_order[address_wards]" id="wards" class="address-main wards" >
                            <option value="">Chọn xã phường / thị trấn</option>
                        </select>
                    </div>
                </div>

            </div>

                    <div class="form-group col-12">         
                                            <a href="javascript:void(0)" onclick="createOption()" class="btn btn-primary btnADD">Thêm sản phẩm</a>
                                            <div id="multi_option">
                                            <div class="row item_option mt-30">     
                                            <div class="number-option col-12 text-danger"><img style ="width: 30px;" src="{{asset('frontend/images/product.gif')}}"> Sản phẩm : 1</div>         
                                            <div class="row mb-10">
                                                <div class="col col-4 lable-input">
                                                    <p class="address-tag">Hãng <span class='text-danger'>*</span></p> 
                                                </div>
                                                <div class="col col-8 ">
                                                    <select  id="manu" class="address-main choose-product manu input-register-warranty" name="data_option[0][manufacturer]" required >
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
                                                <div class="col col-4 lable-input">
                                                    <p class="address-tag">Sản phẩm <span class='text-danger'>*</span></p> 
                                                </div>
                                                <div class="col col-8">
                                                    <select  id="product" class="address-main  product0 input-register-warranty" name="data_option[0][name-product]"  required>
                                                        <option value="">Chọn sản phẩm</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-1">
                                                <div class="col-4"> <p class="label-add-order">Số Seri sản phẩm:</p> </div>
                                                <div class="col-8"><input class="input-add-order" type="text" placeholder="Serial"  name="data_option[0][serial]"  ></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4"> <p class="label-add-order">Thời gian bảo hành:</p> </div>
                                                <div class="col-8">
                                                    <select class="input-add-order" name="data_option[0][warranty_time]" id="">
                                                        <option value=''>Chọn thời gian</option>
                                                        <option value='6'>6 tháng</option>
                                                        <option value='12'>12 tháng</option>
                                                        <option value='24'>24 tháng</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="col-2">
                                                <a href="javascript:void(0)" onclick="delete_Option(this)" class="btn btn-danger d-block">Xóa</a>
                                            </div> -->

                                            </div>
                                            </div>
                    </div>

                    <div class="row mt-3 g-0">
                        <div class="col-4"> <p class="label-add-order"><img style ="width: 22px;" src="{{asset('frontend/images/note.png')}}"> Ghi chú:</p> </div>
                        <div class="col-8">
                            <textarea name="data_order[note]" id="" cols="50" rows="10" placeholder="Ghi chú cho đơn hàng" required></textarea>
                        </div>
                    </div>

                </div>
                <button type='submit' class='btn btn-success'>Thêm</button>
                </form>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->

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
    function createOption(){
    let count_items = document.querySelectorAll(".item_option").length - 1;
    count_items++;
    $('#multi_option').append(`
                  
                     
                                            <div class="row item_option mt-30"> 
                                            <div class="number-option col-12 text-danger"><img style ="width: 30px;" src="{{asset('frontend/images/product.gif')}}"> Sản phẩm : ${count_items + 1 }</div>         
                                            <div class="row mb-10">
                                                <div class="col col-4 lable-input">
                                                    <p class="address-tag">Hãng <span class='text-danger'>*</span></p> 
                                                </div>
                                                <div class="col col-8 ">
                                                    <select  id="manu" class="address-main choose-product manu input-register-warranty" name="data_option[${count_items}][manufacturer]"  required >
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
                                                <div class="col col-4 lable-input">
                                                    <p class="address-tag">Sản phẩm <span class='text-danger'>*</span></p> 
                                                </div>
                                                <div class="col col-8">
                                                    <select id="product" class="address-main  product${count_items} input-register-warranty" name="data_option[${count_items}][name-product]"  required>
                                                        <option value="">Chọn sản phẩm</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-1">
                                                <div class="col-4"> <p class="label-add-order">Số Seri sản phẩm:</p> </div>
                                                <div class="col-8"><input class="input-add-order" type="text" placeholder="Serial"  name="data_option[${count_items}][serial]" ></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4"> <p class="label-add-order">Thời gian bảo hành:</p> </div>
                                                <div class="col-8">
                                                    <select class="input-add-order" name="data_option[${count_items}][warranty_time]" id="">
                                                        <option value=''>Chọn thời gian</option>
                                                        <option value='6'>6 tháng</option>
                                                        <option value='12'>12 tháng</option>
                                                        <option value='24'>24 tháng</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <a href="javascript:void(0)" onclick="delete_Option(this)" class="btn btn-danger d-block">Xóa</a>
                                            </div>

                                            </div>
    `);

   

    var choose_product = document.querySelectorAll('.choose-product');
    // console.log(choose_product);
    
    for(let i=0;i< choose_product.length;i++){
        choose_product[i].onchange = function(){
    //    console.log(i);
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
}

function delete_Option(__this){
    let count_items = document.querySelectorAll(".item_option").length -1;
    count_items--;
    $(__this).closest('.item_option').remove();
}

 </script>


@endsection
