@extends('backend.layout')
@section('order')
<?php
// print_r(Session::get('admin'));die;
?>
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                @if (session('message'))
                    <div class="text-success-ct">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Chi tiết đơn hàng</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
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
                <button class="btn btn-primary mr-10"> <a href="{{route('order')}}">Quay lại</a> </button>

                <!-- ============================================================== -->
                <!-- <button class="btn btn-primary mr-10"> <a href="{{route('order-add')}}">Lập đơn mới</a> </button> -->
                <div class="row form-border">
                    <!-- column -->
                    <div class="col-12">
                        <div class="info-customer-order-detail">
                        <h4 class="">Thông tin khách hàng</h4>
                        <div class="row">
                            <p class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/id.png')}}"> Tên khách hàng:</p>
                            <p class="col col-10">{{$info_order['name_customer']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/phone.png')}}"> Số điện thoại:</p>
                            <p class="col col-10">{{$info_order['phone_customer']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/mail.png')}}"> Email:</p>
                            <p class="col col-10">{{$info_order['email_customer']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/positon.png')}}"> Địa chỉ:</p>
                        </div>
                        <div class="row" style="margin-left: 0px;">
                            <p class="col col-2 p-0">Thành phố:</p>
                            <p class="col col-10 p-0">{{$info_order['address_city']}}</p>
                        </div>
                        <div class="row" style="margin-left: 0px;">
                            <p class="col col-2 p-0">Quận huyện:</p>
                            <p class="col col-10 p-0">{{$info_order['address_province']}}</p>
                        </div>
                        <div class="row" style="margin-left: 0px;">
                            <p class="col col-2 p-0">Thị trấn:</p>
                            <p class="col col-10 p-0">{{$info_order['address_wards']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/note.png')}}"> Ghi chú:</p>
                            <p class="col col-10">{{$info_order['note']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/order.png')}}"> Mã đơn:</p>
                            <p class="col col-10">{{$info_order['order_code']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/date.png')}}"> Ngày mua:</p>
                            <p class="col col-10">{{$info_order['created_at']}}</p>
                        </div>
                    </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><img style ="width: 30px;" src="{{asset('frontend/images/product.gif')}}"> Danh sách sản phẩm</h4>
                      
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Ảnh</th>
                                                <th>Số serial</th>
                                                <th>Giá</th>
                                       
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        @foreach($product as $key => $val)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$val['product_name']}}</td>
                                                <td>
                                                    <img style ='width: 100px' src="/uploads/product/{{$val['product_image']}}" alt="">
                                                </td>
                                                <td>{{$val['product_serial']}}</td>
                                                <td>{{number_format($val['product_price'])}}đ</td>
                                                          
                                            </tr>
                                            @endforeach
                                          
                                       
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

                <a href="{{route('order-print',$info_order['order_code'])}}">In phiếu bảo hành</a>
            </div>

@endsection
