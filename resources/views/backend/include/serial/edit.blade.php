<?php
// print_r($data);
// print_r($data_product);
// print_r($data_manu);die;
?>

@extends('backend.layout')
@section('order')
<meta name="_token" content="{{ csrf_token() }}">

<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Sửa Serial bảo hành</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Sửa Serial bảo hành</li>
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
                <button class="btn btn-primary mr-10"> <a href="{{route('serial')}}">Quay lại</a> </button>
                <form action="{{route('serial-update',$data['id'])}}" method="post">
                @csrf
                <div class="wide">
                            @if($errors->any())
                                @foreach($errors->all() as $error )
                                    <div class='text-danger-ct'>{{$error}}</div>
                                @endforeach
                            @endif
                <div class="row g-0">

                <div class="row g-0 mb-10">
                    <div class="col col-xl-4">
                        <p class="address-tag">Hãng:</p> 
                    </div>
                    <div class="col col-xl-8 ">
                        <select  id="city" class="address-main choose city" required >
                        <option value="">Chọn hãng</option>
                        <?php if(isset($manufacturer) && $manufacturer != NULL){ ?>
                            <?php foreach($manufacturer as $key => $val){?>
                                <option value="<?= $val['name'] ?>" data-city="<?= $val['id'] ?>" <?= $val['id']==$data_manu['id']?'selected':'' ?> ><?= $val['name'] ?></option>
                            <?php } ?>
                        <?php } ?>
                        </select>
                    </div>
                    </div>

                <div class="row g-0 mb-10">
                    <div class="col col-xl-4">
                        <p class="address-tag">Sản phẩm:</p> 
                    </div>
                    <div class="col col-xl-8">
                        <select name="id_product" id="province" class="address-main choose province" >
                            <option value="">Chọn sản phẩm</option>      
                        </select>
                    </div>
                </div>

                <div class="row g-0">
                        <div class="col-4"> <p class="label-add-order">Số serial:</p> </div>
                        <div class="col-8">
                            <input class="input-add-order" type="text" placeholder="Serial number" name="serial_number" value="{{$data['serial_number']}}">
                        </div>
                </div>

                <div class="row g-0 mb-10">
                    <div class="col col-xl-4">
                        <p class="address-tag">Thời gian bảo hành:</p> 
                    </div>
                    <div class="col col-xl-8">
                        <select name="warranty_time" class="address-main " >
                            <option value="">Chọn thời gian</option>
                            <option value="6">6 tháng</option>
                            <option value="12">12 tháng</option>
                            <option value="24">24 tháng</option>
                        </select>
                    </div>
                </div>


                <!-- <div class="row g-0 mb-10">
                    <div class="col col-xl-4">
                        <p class="address-tag">Xã phường/thị trấn:</p> 
                    </div>
                    <div class="col col-xl-8">
                        <select name="data_order[shipping_address_wards]" id="wards" class="address-main wards" >
                            <option value="">Chọn xã phường / thị trấn</option>
                        </select>
                    </div>
                </div> -->

            </div>



                </div>
                <button type='submit' class='btn btn-success'>Sửa</button>
                </form>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
})

document.addEventListener("DOMContentLoaded", function(event)  { 
    var action = $('.city').attr('id');
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
</script>

@endsection
