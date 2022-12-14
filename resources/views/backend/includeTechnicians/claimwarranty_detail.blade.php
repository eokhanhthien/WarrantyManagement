@extends('backend.layoutTechnician')
@section('includeTechnicians')
<?php
// print_r($job);die;
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
                        <h3 class="text-themecolor">Chi ti???t y??u c???u</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Chi ti???t y??u c???u</li>
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
                <button class="btn btn-primary mr-10"> <a href="{{route('employee')}}">Quay l???i</a> </button>

                <!-- ============================================================== -->
                <!-- <button class="btn btn-primary mr-10"> <a href="{{route('order-add')}}">L???p ????n m???i</a> </button> -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="info-customer-order-detail">
                        <h3 style="color: blue;font-weight: 600;" class=""><img style ="width: 30px;" src="{{asset('frontend/images/iconinfo.png')}}"> Th??ng tin kh??ch h??ng</h3>
                        <div class="row">
                            <p class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/id.png')}}"> T??n kh??ch h??ng:</p>
                            <p class="col col-10">{{$claimDetail['customer_name']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/phone.png')}}"> S??? ??i???n tho???i:</p>
                            <p class="col col-10">{{$claimDetail['customer_phone']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/mail.png')}}"> Email:</p>
                            <p class="col col-10">{{$claimDetail['customer_email']}}</p>
                        </div>
                        <div class="row">
                            <p class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/positon.png')}}"> ?????a ch???:</p>
                        </div>
                        <div class="row" style="margin-left: 16px;">
                            <p class="col col-2">Th??nh ph???:</p>
                            <p class="col col-10">{{$claimDetail['address_city']}}</p>
                        </div>
                        <div class="row" style="margin-left: 16px;">
                            <p class="col col-2">Qu???n huy???n:</p>
                            <p class="col col-10">{{$claimDetail['address_province']}}</p>
                        </div>
                        <div class="row" style="margin-left: 16px;">
                            <p class="col col-2">Th??? tr???n:</p>
                            <p class="col col-10">{{$claimDetail['address_wards']}}</p>
                        </div>
                     
                        <div class="row">
                            <p class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/order.png')}}"> M?? ????n :</p>
                            <p class="col col-10">{{$claimDetail['claim_code']}}</p>
                        </div>
                      
                                             
                        <div class="row">
                            <p class="col col-2" style= "font-weight: bold">Lo???i y??u c???u :</p>
                            <p class="col col-10" style= "font-weight: bold"><?php echo $claimDetail['type'] === 1 ? 'B???o h??nh': 'B???o tr??, b???o d?????ng' ?></p>
                        </div>

                    </div>
                        
                    </div>
                </div>

            <?php if($jobemployee['status']===1) {?>

                <form action="{{route('solution')}}" method="post">
                @csrf

                <div class="row g-0 mb-10 mt-5">
                    <div class="col col-xl-2">
                        <strong><p class="address-tag"><img style ="width: 30px;" src="{{asset('frontend/images/soluton.png')}}"> H?????ng x??? l??:</p> </strong>
                    </div>
                    <div class="col col-xl-8">
                        <select name='solution' class="address-main wards" id="choose_solution" required>
                            <option value="">----Ch???n h?????ng x??? l??----</option>
                            <option value="2">?????ng ?? b???o h??nh</option>
                            <option value="3">T??? ch???i b???o h??nh</option>
                            <option value="4">S???a d???ch v???</option>
                        </select>
                    </div>
                </div>

                <div class= "solution_No">
                        <input type="checkbox" id="NoRepair" name="repair[]" value="9">
                        <label for="NoRepair"  style = "color: red"> X??c nh???n t??? ch???i b???o h??nh</label><br>  
                </div>

                <div class= "solution_Yes">
                @foreach($repairservice as $key => $val)
                <input type="checkbox" id="{{$key}}" name="repair[]" value="{{$val['id']}}" >
                <label for="{{$key}}"> {{$val['name']}}</label><br>    
                @endforeach
                </div>
                
                <div class="row g-0 mb-10 mt-4">
                    <div class="col col-xl-2">
                        <strong><p class="address-tag"><img style ="width: 30px;" src="{{asset('frontend/images/note.png')}}"> Ghi ch??:</p> </strong>
                    </div>
                    <div class="col col-xl-2">
                       <textarea name="note" id="" cols="30" rows="10" placeholder='Ghi ch?? cho s???n ph???m' ></textarea>
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



                <button type='submit' class ='btn btn-success'>X??c nh???n</button>
                </form>
                <?php } elseif($jobemployee['status']===2){?>
                    <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="info-customer-order-detail">
                        <h3 style="color: blue;font-weight: 600;" class=""><img style ="width: 30px;" src="{{asset('frontend/images/iconinfo.png')}}">Th??ng tin b???o h??nh</h3>
                       
                        <?php if(isset($JobDetail[0]['repair']) && $JobDetail[0]['repair'] != '') 
                        $repair =json_decode($JobDetail[0]['repair'], true);

                        ?>

                    <div class="row">
                    <h4 class="col col-12">M???c s???a ch???a:</h4>
                    <div class="col col-4">
                    <table>
                    <thead>
                        <tr>
                        <th>T??n m???c</th>
                        <th>Gi??</th>
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
                                    <td data-label="Descri????o"> Free</td>
                                </tr> 
                        <?php }?>    
                    <?php }?> 
                    </tbody>
                    </table>
                    </div>
                    </div>
                    <div class="row mt-3"> 
                    <h4 class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/note.png')}}"> Ghi ch??:</h4>
                    <?php if(isset($JobDetail[0]['note']) && $JobDetail[0]['note'] != '' ){?>
                    
                            <p class="col col-2 " >{{$JobDetail[0]['note']}}</p>
                       
                        <?php }?>    
                     </div>

                    <div class="row"> 
                        <h3 class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/moneytotal.png')}}">T???ng ti???n:</h3>
                        <h3 class="col col-10 " style="color : red;    
                                                font-size: 28px;
                                                font-weight: 500;" >0?? (Free)</h3>
                    </div>

                    </div>
                    </div>
                    </div>

                    <?php  if($jobemployee['type'] === 10){ ?> 
                    <h3 class="col col-10 " style="color : green;    
                                                font-size: 28px;
                                                font-weight: 500;" >Y??u c???u b???o h??nh ???? ho??n th??nh <img style ="width: 30px;" src="{{asset('frontend/images/check.gif')}}"></h3>
                <?php }else{?>
                    <a  href="{{route('comfirm-fisnish',$jobemployee['order_code'])}}" ><button class='btn btn-success'>X??c nh???n ???? ho??n th??nh</button></a>
                
                    <?php }?>
                    
                <?php }elseif($jobemployee['status']===3){?> 
                    <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="info-customer-order-detail">
                        <h3 style="color: blue;font-weight: 600;" class=""><img style ="width: 30px;" src="{{asset('frontend/images/iconinfo.png')}}">Th??ng tin b???o h??nh</h3>
                       
                        <?php if(isset($JobDetail[0]['repair']) && $JobDetail[0]['repair'] != '') 
                        $repair =json_decode($JobDetail[0]['repair'], true);

                        ?>

                    <div class="row">
                 
                    </div>
                    <div class="row mt-3"> 
                    <h4 class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/note.png')}}"> Ghi ch?? :</h4>
                    <?php if(isset($JobDetail[0]['note']) && $JobDetail[0]['note'] != '' ){?>
                    
                            <p class="col col-2 " >{{$JobDetail[0]['note']}}</p>
                       
                        <?php }?>    
                     </div>

                     <?php  if($claimwarranty['type'] === 9){ ?> 
                        
                        <h3 class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/moneytotal.png')}}">Tr???ng th??i:</h3>
                        <h3 class="col col-10 " style="color : red;    
                                                font-size: 26px;
                                                font-weight: 500;" >Y??u c???u b???o h??nh ???? b??? t??? ch???i <img style ="width: 30px;" src="{{asset('frontend/images/close.gif')}}"></h3>
                    
                    <?php } ?>

                    </div>
                    </div>
                    </div>
                <?php }elseif($jobemployee['status']===4){?>   
                    <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="info-customer-order-detail">
                        <h3 style="color: blue;font-weight: 600;" class=""><img style ="width: 30px;" src="{{asset('frontend/images/iconinfo.png')}}">Th??ng tin b???o h??nh</h3>
                       
                        <?php if(isset($JobDetail[0]['repair']) && $JobDetail[0]['repair'] != '') 
                        $repair =json_decode($JobDetail[0]['repair'], true);

                        ?>

                    <div class="row">
                    <h4 class="col col-12">M???c s???a ch???a:</h4>
                    <div class="col col-4">
                    <table>
                    <thead>
                        <tr>
                        <th>T??n m???c</th>
                        <th>Gi??</th>
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
                                    <td data-label="Descri????o"> <?=number_format($val['price']) ?> ??</td>
                                </tr> 
                        <?php }?>    
                    <?php }?> 
                    </tbody>
                    </table>
                    </div>
                    </div>
                    <div class="row mt-3"> 
                    <h4 class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/note.png')}}"> Ghi ch??:</h4>
                    <?php if(isset($JobDetail[0]['note']) && $JobDetail[0]['note'] != '' ){?>
                    
                            <p class="col col-2 " >{{$JobDetail[0]['note']}}</p>
                       
                        <?php }?>    
                     </div>

                    <div class="row"> 
                        <h3 class="col col-2"><img style ="width: 30px;" src="{{asset('frontend/images/moneytotal.png')}}">T???ng ti???n:</h3>
                        <h3 class="col col-10 " style="color : red;    
                                                font-size: 28px;
                                                font-weight: 500;" ><?=number_format($totalMoney) ?> ??</h3>
                    </div>

                    </div>
                    </div>
                    </div>

                    <?php  if($jobemployee['type'] === 10){ ?> 
                    <h3 class="col col-10 " style="color : green;    
                                                font-size: 28px;
                                                font-weight: 500;" >Y??u c???u b???o h??nh ???? ho??n th??nh <img style ="width: 30px;" src="{{asset('frontend/images/check.gif')}}"></h3>
                <?php }else{?>
                    <a  href="{{route('comfirm-fisnish',$jobemployee['order_code'])}}" ><button class='btn btn-success'>X??c nh???n ???? ho??n th??nh</button></a>
                
                    <?php }?>


                <?php } ?>

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
