@extends('backend.layout')
@section('order')
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
                <button class="btn btn-primary mr-10"> <a href="{{route('claim-warranty-show')}}">Quay lại</a> </button>

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
            <?php  if($claimwarranty['status'] === 0){ ?>
                <form method='post' action="{{route('claim-warranty-job')}}">
                @csrf
                <div class="row">
                            <div class="col-2"> <p class="label-add-order">Phân công nhân viên</p> </div>
                                <div class="col-2">
                                    <select class="input-add-order" name="id_technician">
                                    <option value=''> Chọn nhân viên</option>
                                        @foreach($employees as $key => $val)
                                            <option value = "{{$val['id']}}" >{{$val['fullname']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                 </div>
                 <input type="hidden" name ="claim_code" value ="{{$claimDetail['claim_code']}}">
                            <button class='btn btn-success'>Giao nhiệm vụ</button>
                </form>
            <?php }else if($claimwarranty['status'] === 1){ ?>
                <form method='post' action="{{route('claim-warranty-job-turn',$job[0]['id'])}}">
                @csrf
                <div class="row">
                            <div class="col-2"> <p class="label-add-order">Phân công nhân viên</p> </div>
                                <div class="col-2">
                                    <select class="input-add-order" name="id_technician">
                                    <option value=''> Chọn nhân viên</option>
                                        @foreach($employees as $key => $val)
                                            <option value = "{{$val['id']}}" <?php echo $val['id'] == $job[0]['id_technician']?'selected' : ''  ?> >{{$val['fullname']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                 </div>
                 <input type="hidden" name ="claim_code" value ="{{$claimDetail['claim_code']}}">
                            <button class='btn btn-success'>Sửa nhiệm vụ</button>
                </form>


            <?php } ?>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->


            </div>

@endsection
