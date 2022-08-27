@extends('backend.layout')
@section('order')
<meta name="_token" content="{{ csrf_token() }}">

<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Thêm đơn hàng</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Thêm đơn hàng</li>
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
                <div class="wide">
                    <div class="row">
                        <div class="col-4"> <p class="label-add-order">Tên khách hàng:</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" placeholder="Full name" name="data_order[name]"></div>
                    </div>

                   <div class="row">
                        <div class="col-4"> <p class="label-add-order">Số điện thoại:</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" placeholder="Phone" name="data_order[phone]"></div>
                    </div>
                   
                    <div class="row g-0">
                <div class="col col-xl-12 infor-pay-name">Địa chỉ nhận hàng:</div>
                <div class="row g-0 mb-10">
                    <div class="col col-xl-4">
                        <p class="address-tag">Tỉnh/thành phố:</p> 
                    </div>
                    <div class="col col-xl-8 ">
                        <select name="data_order[shipping_address_city]" id="city" class="address-main choose city" >
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
                        <select name="data_order[shipping_address_province]" id="province" class="address-main choose province" >
                            <option value="">Chọn quận / huyện</option>
                        </select>
                    </div>
                </div>

                <div class="row g-0 mb-10">
                    <div class="col col-xl-4">
                        <p class="address-tag">Xã phường/thị trấn:</p> 
                    </div>
                    <div class="col col-xl-8">
                        <select name="data_order[shipping_address_wards]" id="wards" class="address-main wards" >
                            <option value="">Chọn xã phường / thị trấn</option>
                        </select>
                    </div>
                </div>

            </div>

                    <div class="form-group col-12">         
                                            <a href="javascript:void(0)" onclick="createOption()" class="btn btn-primary">Thêm sản phẩm</a>
                                            <div id="multi_option">
                                            <div class="row item_option mt-30">
                                            <div class="number-option col-12">Sản phẩm : 1</div>
                                           
                                            <div class="row">
                                                <div class="col-4"> <p class="label-add-order">Tên sản phẩm:</p> </div>
                                                <div class="col-8"><input class="input-add-order" type="text" placeholder="Product name"  name="data_option[0][name]"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4"> <p class="label-add-order">Số Seri sản phẩm:</p> </div>
                                                <div class="col-8"><input class="input-add-order" type="text" placeholder="Serial"  name="data_option[0][serial]"></div>
                                            </div>

                                            <div class="col-2">
                                                <a href="javascript:void(0)" onclick="delete_Option(this)" class="btn btn-danger d-block">Xóa</a>
                                            </div>

                                            </div>
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
    function createOption(){
    let count_items = document.querySelectorAll(".item_option").length -1;
    count_items++;
    $('#multi_option').append(`
    <div class="item_option mt-30">
                           <div class="number-option col-12">Sản phẩm : ${count_items + 1 }</div>
                                           
                                            <div class="row">
                                                <div class="col-4"> <p class="label-add-order">Tên sản phẩm:</p> </div>
                                                <div class="col-8"><input class="input-add-order" type="text" placeholder="Product name"  name="data_option[${count_items}][name]"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4"> <p class="label-add-order">Số Seri sản phẩm:</p> </div>
                                                <div class="col-8"><input class="input-add-order" type="text" placeholder="Serial"  name="data_option[${count_items}][serial]"></div>
                                            </div>

                                            <div class="col-2">
                                                <label for="">&nbsp;</label>
                                                <a href="javascript:void(0)" onclick="delete_Option(this)" class="btn btn-danger d-block">Xóa</a>
                                            </div>

                                            </div>
    `);
}

function delete_Option(__this){
    let count_items = document.querySelectorAll(".item_option").length -1;
    count_items--;
    $(__this).closest('.item_option').remove();
}

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
