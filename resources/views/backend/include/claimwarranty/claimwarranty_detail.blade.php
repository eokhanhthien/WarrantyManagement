@extends('backend.layout')
@section('order')
<?php
// print_r($claimDetail);die;
?>
<style>
table {
    --accent-color: #362f4b;
    --text-color: slategray;
    --bgColorDarker: #ececec;
    --bgColorLighter: #fcfcfc;
    --insideBorderColor: lightgray;
    width: 100%;
    margin: 0;
    padding: 0;
    border: 1px solid var(--accent-color);
    border-collapse: collapse;
    color: var(--text-color);
    table-layout: fixed;
}

table caption {
    margin: 1rem 0;
    color: slategray;
    font-size: 1.5rem;
    font-weight: 600;
    letter-spacing: 0.055rem;
    text-align: center;
}

table thead tr {
    color: whitesmoke;
    background-color: var(--accent-color);
    font-size: 1rem;
}

table tbody tr {
    border: 1px solid var(--insideBorderColor);
    background-color: var(--bgColorDarker);
}

table tbody tr:nth-child(odd) {
    background-color: var(--bgColorLighter);
}

table th {
    letter-spacing: 0.075rem;
}

table th,
table td {
    padding: 0.75rem 1rem;
    font-weight: normal;
    text-align: left;
}

table th:nth-child(4),
table td:nth-child(4) {
    text-align: right;
}

@media screen and (max-width: 768px) {
    table {
        border: none;
    }

    table caption {
        padding: 0.75rem 1rem;
        border-radius: 6px 6px 0 0;
        color: whitesmoke;
        font-size: 1.35rem;
        background-color: var(--accent-color);
    }

    table thead {
        position: absolute;
        width: 1px;
        height: 1px;
        clip: rect(0 0 0 0);
        overflow: hidden;
    }

}
</style>
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
    <div class="row form-border">
        <!-- column -->
        <div class="col-12">
            <div class="info-customer-order-detail">
                <h3 style="color: blue;font-weight: 600;" class=""><img style="width: 30px;"
                        src="{{asset('frontend/images/iconinfo.png')}}"> Thông tin khách hàng</h3>
                <div class="row">
                    <p class="col col-2"><img style="width: 30px;" src="{{asset('frontend/images/id.png')}}"> Tên khách
                        hàng:</p>
                    <p class="col col-10">{{$claimDetail['customer_name']}}</p>
                </div>
                <div class="row">
                    <p class="col col-2"><img style="width: 30px;" src="{{asset('frontend/images/phone.png')}}"> Số điện
                        thoại:</p>
                    <p class="col col-10">{{$claimDetail['customer_phone']}}</p>
                </div>
                <div class="row">
                    <p class="col col-2"><img style="width: 30px;" src="{{asset('frontend/images/mail.png')}}"> Email:
                    </p>
                    <p class="col col-10">{{$claimDetail['customer_email']}}</p>
                </div>
                <div class="row">
                    <p class="col col-2"><img style="width: 30px;" src="{{asset('frontend/images/positon.png')}}"> Địa
                        chỉ:</p>
                </div>
                <div class="row" style="margin-left: 0px;">
                    <p class="col col-2 p-0">Thành phố:</p>
                    <p class="col col-10 p-0">{{$claimDetail['address_city']}}</p>
                </div>
                <div class="row" style="margin-left: 0px;">
                    <p class="col col-2 p-0">Quận huyện:</p>
                    <p class="col col-10 p-0">{{$claimDetail['address_province']}}</p>
                </div>
                <div class="row" style="margin-left: 0px;">
                    <p class="col col-2 p-0">Thị trấn:</p>
                    <p class="col col-10 p-0">{{$claimDetail['address_wards']}}</p>
                </div>

                <div class="row">
                    <p class="col col-2"><img style="width: 30px;" src="{{asset('frontend/images/order.png')}}"> Mã đơn
                        :</p>
                    <p class="col col-10">{{$claimDetail['claim_code']}}</p>
                </div>
                <div class="row">
                    <p class="col col-2"><img style="width: 30px;" src="{{asset('frontend/images/purchase.png')}}"> Phân loại:</p>
                    <p class="col col-10"><?php echo $claimDetail['product_serial'] == "NO"?"Bảo trì, sửa chữa":"Bảo hành" ?>
                    </p>
                </div>

            </div>

        </div>
    </div>
    <?php  if($claimwarranty['status'] === 0){ ?>
    <form method='post' action="{{route('claim-warranty-job')}}">
        @csrf
        <div class="row">
            <div class="col-2">
                <p class="label-add-order"><img style="width: 30px;" src="{{asset('frontend/images/avatar.png')}}"> Phân
                    công nhân viên</p>
            </div>
            <div class="col-2">
                <select class="input-add-order" name="id_technician">
                    <option value=''> Chọn nhân viên</option>
                    @foreach($employees as $key => $val)
                    <option value="{{$val['id']}}">{{$val['fullname']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="hidden" name="claim_code" value="{{$claimDetail['claim_code']}}">
        <button class='btn btn-success'>Giao nhiệm vụ</button>
    </form>
    <?php }else if($claimwarranty['status'] === 1){ ?>
    <form method='post' action="{{route('claim-warranty-job-turn',$job[0]['id'])}}">
        @csrf
        <div class="row">
            <div class="col-2">
                <p class="label-add-order"><img style="width: 30px;" src="{{asset('frontend/images/avatar.png')}}"> Phân
                    công nhân viên</p>
            </div>
            <div class="col-2">
                <select class="input-add-order" name="id_technician">
                    <option value=''> Chọn nhân viên</option>
                    @foreach($employees as $key => $val)
                    <option value="{{$val['id']}}"
                        <?php echo $val['id'] == $job[0]['id_technician']?'selected' : ''  ?>>{{$val['fullname']}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="hidden" name="claim_code" value="{{$claimDetail['claim_code']}}">
        <button class='btn btn-success'>Sửa nhiệm vụ</button>
    </form>

    <?php  if($claimwarranty['type'] === 10){ ?>
    <div class="inform-warranty mt-3"> <h3 class="col col-10 " style="color : green;    
                                                font-size: 22px;
                                                font-weight: 500;">Yêu cầu bảo hành đã hoàn thành <img
            style="width: 30px;" src="{{asset('frontend/images/check.gif')}}"></h3></div>
    <?php }else{?>
    <div class="inform-warranty mt-3"><h3 class="col col-10 " style="color : blue;    
                                                font-size: 22px;
                                                font-weight: 500;">Yêu cầu bảo hành đang được thực hiện <img
            style="width: 30px;" src="{{asset('frontend/images/fix.gif')}}"></h3></div> 
    <?php }?>

    <?php }elseif($claimwarranty['status'] === 4){ ?>
    <div class="row form-border">
        <h4 class="col-2" style="color: blue;font-weight: 600;"><img style="width: 30px;"
                src="{{asset('frontend/images/avatar.png')}}"> Nhân viên: :</h4>
        <div class="col-2">
            <select class="input-add-order" name="id_technician">
                @foreach($employees as $key => $val)
                <option value="{{$val['id']}}" <?php echo $val['id'] == $job[0]['id_technician']?'selected' : ''  ?>>
                    {{$val['fullname']}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="info-customer-order-detail">

                <?php if(isset($JobDetail[0]['repair']) && $JobDetail[0]['repair'] != '') 
                        $repair =json_decode($JobDetail[0]['repair'], true);

                        ?>

                <div class="row form-border">
                    <h3 style="color: blue;font-weight: 600;" class=""><img style="width: 30px;"
                            src="{{asset('frontend/images/iconinfo.png')}}">Thông tin bảo hành</h3>

                    <h4 class="col col-12"><img style="width: 30px;" src="{{asset('frontend/images/soluton.png')}}"> Mục
                        sữa chữa:</h4>
                    <div class="col col-12">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tên mục</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($repair) && $repair != NULL) {
                        $totalMoney =0;
                        ?>
                                <?php foreach($repair as $key => $val) {
                            $totalMoney +=$val['price'];
                            ?>
                                <tr>
                                    <td data-label="Projeto"><?= $val['name'] ?></td>
                                    <td data-label="Descrição"> <?=number_format($val['price']) ?> đ</td>
                                </tr>
                                <?php }?>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-3 form-border">
                    <h4 class="col col-12"><img style="width: 30px;" src="{{asset('frontend/images/note.png')}}"><span
                            style="color: blue;font-weight: 600;">Ghi chú :</span></h4>
                    <?php if(isset($JobDetail[0]['note']) && $JobDetail[0]['note'] != '' ){?>

                    <p class="col col-12 ">{{$JobDetail[0]['note']}}</p>

                    <?php }?>
                </div>

                <div class="row form-border">
                    <h3 class="col col-2"><img style="width: 30px;"
                            src="{{asset('frontend/images/moneytotal.png')}}"><span
                            style="color: blue;font-weight: 600;">Tổng tiền: </span></h3>
                    <h3 class="col col-10 " style="color : red;    
                                                font-size: 22px;
                                                font-weight: 500;"><?=number_format($totalMoney) ?> VNĐ</h3>
                </div>

            </div>
        </div>
    </div>

    <?php  if($claimwarranty['type'] === 10){ ?>
        <div class="inform-warranty mt-3">  <h3 class="col col-10 " style="color : green;    
                                                font-size: 22px;
                                                font-weight: 500;">Yêu cầu bảo hành đã hoàn thành <img
            style="width: 30px;" src="{{asset('frontend/images/check.gif')}}"></h3></div>
    <?php }else{?>
        <div class="inform-warranty mt-3">  <h3 class="col col-10 " style="color : blue;    
                                                font-size: 22px;
                                                font-weight: 500;">Yêu cầu bảo hành đang được thực hiện <img
            style="width: 30px;" src="{{asset('frontend/images/fix.gif')}}"></h3></div>
    <?php }?>
    <?php }elseif($claimwarranty['status'] === 2){?>
    <div class="row form-border">
        <h4 class="col-2" style="color: blue;font-weight: 600;"><img style="width: 30px;"
                src="{{asset('frontend/images/avatar.png')}}"> Nhân viên: :</h4>
        <div class="col-2">
            <select class="input-add-order" name="id_technician">
                @foreach($employees as $key => $val)
                <option value="{{$val['id']}}" <?php echo $val['id'] == $job[0]['id_technician']?'selected' : ''  ?>>
                    {{$val['fullname']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="info-customer-order-detail">

                <?php if(isset($JobDetail[0]['repair']) && $JobDetail[0]['repair'] != '') 
                        $repair =json_decode($JobDetail[0]['repair'], true);

                        ?>

                <div class="row form-border">
                    <h3 style="color: blue;font-weight: 600;" class=""><img style="width: 30px;"
                            src="{{asset('frontend/images/iconinfo.png')}}">Thông tin bảo hành</h3>

                    <h4 class="col col-12"><img style="width: 30px;" src="{{asset('frontend/images/soluton.png')}}"> Mục
                        sữa chữa:</h4>
                    <div class="col col-12">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tên mục</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($repair) && $repair != NULL) {
                        $totalMoney =0;
                        ?>
                                <?php foreach($repair as $key => $val) {
                            $totalMoney +=$val['price'];
                            ?>
                                <tr>
                                    <td data-label="Projeto"><?= $val['name'] ?></td>
                                    <td data-label="Descrição"> Free</td>
                                </tr>
                                <?php }?>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-3 form-border">
                    <h4 class="col col-12"><img style="width: 30px;" src="{{asset('frontend/images/note.png')}}"><span
                            style="color: blue;font-weight: 600;">Ghi chú :</span></h4>
                    <?php if(isset($JobDetail[0]['note']) && $JobDetail[0]['note'] != '' ){?>

                    <p class="col col-12 ">{{$JobDetail[0]['note']}}</p>

                    <?php }?>
                </div>

                <div class="row form-border">
                    <h3 class="col col-2"><img style="width: 30px;"
                            src="{{asset('frontend/images/moneytotal.png')}}"><span
                            style="color: blue;font-weight: 600;">Tổng tiền: </span></h3>
                    <h3 class="col col-10 " style="color : red;    
                                                font-size: 22px;
                                                font-weight: 500;">0 VNĐ</h3>
                </div>

            </div>
        </div>
    </div>

    <?php  if($claimwarranty['type'] === 10){ ?>
        <div class="inform-warranty mt-3">  <h3 class="col col-10 " style="color : green;    
                                                font-size: 22px;
                                                font-weight: 500;">Yêu cầu bảo hành đã hoàn thành <img
            style="width: 30px;" src="{{asset('frontend/images/check.gif')}}"></h3> </div>
    <?php }else{?>
        <div class="inform-warranty mt-3"> <h3 class="col col-10 " style="color : blue;    
                                                font-size: 22px;
                                                font-weight: 500;">Yêu cầu bảo hành đang được thực hiện <img
            style="width: 30px;" src="{{asset('frontend/images/fix.gif')}}"></h3> </div>
    <?php }?>

    <?php }elseif($claimwarranty['status'] === 3){?>
    <div class="row form-border">
        <h4 class="col-2" style="color: blue;font-weight: 600;"><img style="width: 30px;"
                src="{{asset('frontend/images/avatar.png')}}"> Nhân viên: :</h4>
        <div class="col-2">
            <select class="input-add-order" name="id_technician">
                @foreach($employees as $key => $val)
                <option value="{{$val['id']}}" <?php echo $val['id'] == $job[0]['id_technician']?'selected' : ''  ?>>
                    {{$val['fullname']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="info-customer-order-detail form-border">
                <h3 style="color: blue;font-weight: 600;" class=""><img style="width: 30px;"
                        src="{{asset('frontend/images/iconinfo.png')}}">Thông tin bảo hành</h3>

                <?php if(isset($JobDetail[0]['repair']) && $JobDetail[0]['repair'] != '') 
                        $repair =json_decode($JobDetail[0]['repair'], true);

                        ?>

                <div class="row">

                </div>
                <div class="row mt-3 ">
                    <h4 class="col col-12"><img style="width: 30px;" src="{{asset('frontend/images/note.png')}}"><span
                            style="color: blue;font-weight: 600;">Ghi chú :</span></h4>
                    <?php if(isset($JobDetail[0]['note']) && $JobDetail[0]['note'] != '' ){?>

                    <p class="col col-12 ">{{$JobDetail[0]['note']}}</p>

                    <?php }?>
                </div>

                <?php  if($claimwarranty['type'] === 9){ ?>

                <h3 class="col col-2"><img style="width: 30px;" src="{{asset('frontend/images/moneytotal.png')}}">Trạng
                    thái:</h3>
                    <div class="inform-deline">  <h3 class="col col-10 " style="color : red;    
                                                font-size: 22px;
                                                font-weight: 500;">Yêu cầu bảo hành đã bị từ chối <img
                        style="width: 30px;" src="{{asset('frontend/images/close.gif')}}"></h3> </div>

                <?php } ?>


            </div>
        </div>
    </div>
    <?php }?>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->


</div>

@endsection