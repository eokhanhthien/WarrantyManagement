<?php
// echo "<pre>";
// print_r($product);die;
?>
@extends('frontend.layout')
@section('home')
<div class="content">
    <div class="container-content">
            <div class="container-fluid g-0">
                <div class="banner-product">
                    <div class="baner-content">
                        <h2 class='color-blue'>Sản phẩm mới nhất</h2>
                        <p>Để biết thêm thông tin, vui lòng liên hệ cho chúng tôi.</p>
                    </div>
                </div>
            <div class="row">
            @foreach($product as $key => $val)
                <div class="col-3 border-product">
                <div class="size-banner-home">
                    <img src="/uploads/product/{{ $val['image']}}" alt="">
                    <div class="check-title">{{ $val['name'] }}</div>
                    <div>{{ number_format($val['price']) }} đ</div>
                </div> 
                </div>
            @endforeach 
            {{$product->links('pagination::bootstrap-4')}}
            </div>




                

    </div>
</div>
</div>


@endsection