@extends('backend.layoutTechnician')
@section('includeTechnicians')
<?php
// print_r($claimwarranty);die;
?>
<meta name="_token" content="{{ csrf_token() }}">
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
                        <h3 class="text-themecolor">Chi tiết yêu cầu</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Chi tiết yêu cầu</li>
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
                <button class="btn btn-primary mr-10"> <a href="{{route('employee')}}">Quay lại</a> </button>

                <!-- ============================================================== -->
                <!-- <button class="btn btn-primary mr-10"> <a href="{{route('order-add')}}">Lập đơn mới</a> </button> -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="info-customer-order-detail">
                        <h4 class="">Thông tin khách hàng</h4>
                        <div class="row">
                            <p class="col col-2">Tên khách hàng:</p>
                            <p class="col col-10">{{$claimDetail['customer_name']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2">Số điện thoại:</p>
                            <p class="col col-10">{{$claimDetail['customer_phone']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2">Email:</p>
                            <p class="col col-10">{{$claimDetail['customer_email']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2">Thành phố:</p>
                            <p class="col col-10">{{$claimDetail['address_city']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2">Quận huyện:</p>
                            <p class="col col-10">{{$claimDetail['address_province']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2">Thị trấn:</p>
                            <p class="col col-10">{{$claimDetail['address_wards']}}</p>
                        </div>
                     
                        <div class="row">
                            <p class="col col-2">Mã đơn :</p>
                            <p class="col col-10">{{$claimDetail['claim_code']}}</p>
                        </div>
                      
                    </div>
                        
                    </div>
                </div>


                <form action="{{route('solution')}}" method="post">
                @csrf

                <div class="row g-0 mb-10 mt-5">
                    <div class="col col-xl-2">
                        <strong><p class="address-tag">Hướng xử lý:</p> </strong>
                    </div>
                    <div class="col col-xl-8">
                        <select name='solution' class="address-main wards">
                            <option value="">----Chọn hướng xử lý----</option>
                            <option value="1">Đồng ý bảo hành</option>
                            <option value="2">Từ chối bảo hành</option>
                            <option value="3">Sửa dịch vụ</option>
                        </select>
                    </div>
                </div>
                <input type="checkbox" id="1" name="'repair[]" value="1">
                <label for="1"> I have a bike</label><br>                
                <input type="checkbox" id="2" name="'repair[]" value="2">
                <label for="2"> I have a bike</label><br>   
                <input type="checkbox" id="3" name="'repair[]" value="3">
                <label for="3"> I have a bike</label><br>   

                <div class="row g-0 mb-10 mt-5">
                    <div class="col col-xl-2">
                        <strong><p class="address-tag">Ghi chú:</p> </strong>
                    </div>
                    <div class="col col-xl-8">
                       <textarea name="note" id="" cols="30" rows="10" placeholder='Ghi chú cho sản phẩm'></textarea>
                    </div>
                </div>

                <button type='submit' class ='btn btn-success'>Xác nhận</button>
                </form>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->


            </div>

@endsection
