@extends('backend.layoutTechnician')
@section('includeTechnicians')
<?php
// print_r($job);die;
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
                      
                                             
                        <div class="row">
                            <p class="col col-2" style= "font-weight: bold">Loại yêu cầu :</p>
                            <p class="col col-10" style= "font-weight: bold"><?php echo $claimDetail['type'] === 1 ? 'Bảo hành': 'Bảo trì, bảo dưỡng' ?></p>
                        </div>

                    </div>
                        
                    </div>
                </div>

            <?php if($jobemployee['status']===1) {?>

                <form action="{{route('solution')}}" method="post">
                @csrf

                <div class="row g-0 mb-10 mt-5">
                    <div class="col col-xl-2">
                        <strong><p class="address-tag">Hướng xử lý:</p> </strong>
                    </div>
                    <div class="col col-xl-8">
                        <select name='solution' class="address-main wards" id="choose_solution" required>
                            <option value="">----Chọn hướng xử lý----</option>
                            <option value="2">Đồng ý bảo hành</option>
                            <option value="3">Từ chối bảo hành</option>
                            <option value="4">Sửa dịch vụ</option>
                        </select>
                    </div>
                </div>

                <div class= "solution_No">
                        <input type="checkbox" id="NoRepair" name="repair[]" value="0">
                        <label for="NoRepair"  style = "color: red"> Xác nhận từ chối bảo hành</label><br>  
                </div>

                <div class= "solution_Yes">
                @foreach($repairservice as $key => $val)
                <input type="checkbox" id="{{$key}}" name="repair[]" value="{{$val['id']}}" >
                <label for="{{$key}}"> {{$val['name']}}</label><br>    
                @endforeach
                </div>
                
                <div class="row g-0 mb-10 mt-5">
                    <div class="col col-xl-2">
                        <strong><p class="address-tag">Ghi chú:</p> </strong>
                    </div>
                    <div class="col col-xl-8">
                       <textarea name="note" id="" cols="30" rows="10" placeholder='Ghi chú cho sản phẩm' ></textarea>
                    </div>
                </div>

                <!-- <input type="checkbox" id="1" name="'repair[]" value="1">
                <label for="1"> I have a bike</label><br>                
                <input type="checkbox" id="2" name="'repair[]" value="2">
                <label for="2"> I have a bike</label><br>   
                <input type="checkbox" id="3" name="'repair[]" value="3">
                <label for="3"> I have a bike</label><br>    -->
                <input type="hidden" name="order_code" value=" <?php echo $jobemployee['order_code'] ?>">
                <input type="hidden" name="id" value=" <?php echo $jobemployee['id'] ?>">



                <button type='submit' class ='btn btn-success'>Xác nhận</button>
                </form>
                <?php } elseif($jobemployee['status']===2){?>
                    <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="info-customer-order-detail">
                        <h2 class="">Thông tin bảo hành</h2>
                       
                        <?php if(isset($JobDetail[0]['repair']) && $JobDetail[0]['repair'] != '') 
                        $repair =json_decode($JobDetail[0]['repair'], true);

                        ?>

                    <div class="row">
                    <h3 class="col col-12">Mục sữa chữa:</h3>

                    <?php if(isset($repair) && $repair != NULL) {?>
                        <?php foreach($repair as $key => $val) {?>        
                                <p class="col col-2" style="padding-left: 56px;"><?= $val['name'] ?></p>    
                                <p class="col col-10" style="padding-left: 56px;"> FREE</p>    
                        <?php }?>    
                    <?php }?>   
                    </div>
                    <div class="row"> 
                    <h3 class="col col-2">Ghi chú:</h3>
                    <?php if(isset($JobDetail[0]['note']) && $JobDetail[0]['note'] != '' ){?>
                    
                            <p class="col col-10 " >{{$JobDetail[0]['note']}}</p>
                       
                        <?php }?>    
                     </div>
                     <div class="row"> 
                    <h3 class="col col-2">Tổng tiền:</h3>
                    <h3 class="col col-10 " >FREE</h3>

                    </div>

                    </div>
                    </div>
                    </div>

                    <a  href="{{route('comfirm-fisnish',$jobemployee['order_code'])}}" ><button class='btn btn-success'>Xác nhận đã hoàn thành</button></a>
                <?php }elseif($jobemployee['status']===3){?> 
                    <h2 style = "color: red;" >Đã từ chối bảo hành</h2>
                <?php }elseif($jobemployee['status']===4){?>   
                    <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="info-customer-order-detail">
                        <h2 class="">Thông tin bảo hành</h2>
                       
                        <?php if(isset($JobDetail[0]['repair']) && $JobDetail[0]['repair'] != '') 
                        $repair =json_decode($JobDetail[0]['repair'], true);

                        ?>

                    <div class="row">
                    <h3 class="col col-12">Mục sữa chữa:</h3>

                    <?php if(isset($repair) && $repair != NULL) {
                        $totalMoney =0;
                        ?>
                        <?php foreach($repair as $key => $val) {
                            $totalMoney +=$val['price'];
                            ?>        
                                <p class="col col-2" style="padding-left: 56px;"><?= $val['name'] ?></p>    
                                <p class="col col-10" style="padding-left: 56px;"> <?=number_format($val['price']) ?> đ</p>    
                        <?php }?>    
                    <?php }?>   
                    </div>
                    <div class="row"> 
                    <h3 class="col col-2">Ghi chú:</h3>
                    <?php if(isset($JobDetail[0]['note']) && $JobDetail[0]['note'] != '' ){?>
                    
                            <p class="col col-10 " >{{$JobDetail[0]['note']}}</p>
                       
                        <?php }?>    
                     </div>

                    <div class="row"> 
                        <h3 class="col col-2">Tổng tiền:</h3>
                        <h3 class="col col-10 " ><?=number_format($totalMoney) ?> đ</h3>
                    </div>

                    </div>
                    </div>
                    </div>

                    <a  href="{{route('comfirm-fisnish',$jobemployee['order_code'])}}" ><button class='btn btn-success'>Xác nhận đã hoàn thành</button></a>

                <?php }else{?>
                    <h2 style = "color: green;" >Đã hoàn thành</h2>
                <?php }?>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->


            </div>
            <script>
            var choose_solution = document.querySelector("#choose_solution");
            var solution_No = document.querySelector(".solution_No");
            var solution_Yes = document.querySelector(".solution_Yes");
            choose_solution.onchange = () =>{
                solution_Yes.classList.remove("active_solution")
                solution_No.classList.remove("active_solution")
                if(choose_solution.value == 2 || choose_solution.value == 4){
                    solution_Yes.classList.add("active_solution")
                }
                else if(choose_solution.value == 3){
                    solution_No.classList.add("active_solution")
                }
            }
            </script>
@endsection
