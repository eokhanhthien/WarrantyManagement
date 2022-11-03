@extends('backend.layout')
@section('order')
<link rel="stylesheet" href="{{asset('frontend/css/frontendstyle.css')}}">
<div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Thống kê công việc</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Thống kê công việc</li>
                        </ol>
                    </div>
                    <h3>Tất cả công việc<img style ="width: 40px;" src="{{asset('frontend/images/fix.png')}}"></h3>
                    <div class="col-md-7 align-self-center">
                    </div>
                </div>

                <div class="row"> 
               
               <div class="col col-1 name_employee">
                   Tất cả công việc
               </div>
               <div class="col col-5  ">
                   <div class="graph" style ="width: 100%"  ></div>
               </div>
               <div class="col col-2  point_employee"><strong><strong>{{count($jobemployee)}} công việc</strong></strong> </div>
               </div>

                <?php 
                  $totalFinal = 0;
                  $totalJob = count($jobemployee);
                ?>

               @foreach($jobemployee as $key => $val) 
                  <?php if( $val['status'] == 5 || $val['status'] == 3){ 
                    $totalFinal ++;
                  }
                  ?>
                @endforeach


            <div class="row mt-2"> 
               
               <div class="col col-1 name_employee">
                   Đã hoàn thành
               </div>
                        <?php
                            $width = ($totalFinal/$totalJob)*100;
                        ?>
               <div class="col col-5  ">
                    <div class="graph" style ="width: <?php echo $width ?>%"  ></div>
               </div>
               <div class="col col-2  point_employee"><strong><strong>{{$totalFinal}} công việc</strong></strong> </div>
            </div>

            <div class="row mt-2"> 
               
               <div class="col col-1 name_employee">
                   Chưa hoàn thành
               </div>
                        <?php
                            $width = (($totalJob - $totalFinal)/$totalJob)*100;
                        ?>
               <div class="col col-5  ">
                    <div class="graph" style ="width: <?php echo $width ?>%"  ></div>
               </div>
               <div class="col col-2  point_employee"><strong><strong>{{$totalJob - $totalFinal}} công việc</strong></strong> </div>
            </div>



            <h3 class="mt-5">Công việc theo từng nhân viên <img style ="width: 40px;" src="{{asset('frontend/images/member.png')}}"></h3>

                <div style="color: #00a924;
                            font-weight: 600;">Tất cả công việc</div>


                @foreach($employee as $keyid => $idEmployee)
                <?php 
                $totalJob=0;
                $total = count($jobemployee);

                ?>  
                @foreach($jobemployee as $key => $val)
                    @if($idEmployee===$val['id_technician']  )
                    <?php 
                        $totalJob ++;
                    ?>  
                    @endif
                @endforeach

                
                <div class="statistical_employee mt-2">
                    <div class="row"> 
               
                        <div class="col col-1 name_employee">
                            <?php 
                                foreach($name as $kay => $idem){
                                    if($idEmployee == $idem['id']){
                                        echo $idem['fullname'];
                                    }
                                }
                            ?>
                        </div>
                        <?php
                            $width = ($totalJob/$total)*100;
                        ?>
                        <div class="col col-5  ">
                            <div class="graph" style ="width: <?php echo $width ?>%"  ></div>
                        </div>
                        <div class="col col-2  point_employee"><strong><strong><?php echo $totalJob ?> đơn</strong></strong> </div>
                        </div>
                    </div>  
                @endforeach



                <div style="color: #00a924;
                            font-weight: 600;">Đã hoàn thành</div>
                @foreach($employee as $keyid => $idEmployee)
                <?php 
                $totalJob=0;
                $total = count($jobemployee);

                ?>  
                
                @foreach($jobemployee as $key => $val)
                    @if($idEmployee===$val['id_technician'] && $val['status'] === 5 )
                    <?php 
                        $totalJob ++;
                    ?>
                    @elseif($idEmployee===$val['id_technician'] && $val['status'] === 3 )
                    <?php 
                        $totalJob ++;
                    ?>
                    @endif
                @endforeach

                
                <div class="statistical_employee mt-2">
                    <div class="row"> 
               
                        <div class="col col-1 name_employee">
                            <?php 
                                foreach($name as $kay => $idem){
                                    if($idEmployee == $idem['id']){
                                        echo $idem['fullname'];
                                    }
                                }
                            ?>
                        </div>
                        <?php
                            $width = ($totalJob/$total)*100;
                        ?>
                        <div class="col col-5  ">
                            <div class="graph" style ="width: <?php echo $width ?>%"  ></div>
                        </div>
                        <div class="col col-2  point_employee"><strong><strong><?php echo $totalJob ?> đơn</strong></strong> </div>
                        </div>
                    </div>  
                @endforeach
        <!-- Cong viec chua hoan thanh -->
        <div style="color: #00a924;
                            font-weight: 600;">Chưa hoàn thành</div>
                @foreach($employee as $keyid => $idEmployee)
                <?php 
                $totalJob=0;
                $total = count($jobemployee);

                ?>  
                
                @foreach($jobemployee as $key => $val)
                    @if($idEmployee===$val['id_technician'] && $val['status'] === 1 )
                    <?php 
                        $totalJob ++;
                    ?>
                    @elseif($idEmployee===$val['id_technician'] && $val['status'] === 2 )
                    <?php 
                        $totalJob ++;
                    ?>
                    @elseif($idEmployee===$val['id_technician'] && $val['status'] === 4 )
                    <?php 
                        $totalJob ++;
                    ?>
                    @endif
                @endforeach

                
                <div class="statistical_employee mt-2">
                    <div class="row"> 
               
                        <div class="col col-1 name_employee">
                            <?php 
                                foreach($name as $kay => $idem){
                                    if($idEmployee == $idem['id']){
                                        echo $idem['fullname'];
                                    }
                                }
                            ?>
                        </div>
                        <?php
                            $width = ($totalJob/$total)*100;
                        ?>
                        <div class="col col-5  ">
                            <div class="graph" style ="width: <?php echo $width ?>%"  ></div>
                        </div>
                        <div class="col col-2  point_employee"><strong><strong><?php echo $totalJob ?> đơn</strong></strong> </div>
                        </div>
                    </div>  
                @endforeach
        <!-- BI tu choi bao hanh -->
        <div style="color: #00a924;
                            font-weight: 600;">Đã từ chối bảo hành</div>
                @foreach($employee as $keyid => $idEmployee)
                <?php 
                $totalJob=0;
                $total = count($jobemployee);

                ?>  
                
                @foreach($jobemployee as $key => $val)
                    @if($idEmployee===$val['id_technician'] && $val['status'] === 3 )
                    <?php 
                        $totalJob ++;
                    ?>  
                    @endif
                @endforeach

                
                <div class="statistical_employee mt-2">
                    <div class="row"> 
               
                        <div class="col col-1 name_employee">
                            <?php 
                                foreach($name as $kay => $idem){
                                    if($idEmployee == $idem['id']){
                                        echo $idem['fullname'];
                                    }
                                }
                            ?>
                        </div>
                        <?php
                            $width = ($totalJob/$total)*100;
                        ?>
                        <div class="col col-5  ">
                            <div class="graph" style ="width: <?php echo $width ?>%; background-color: #ff4c4c;"  ></div>
                        </div>
                        <div class="col col-2  point_employee"><strong><strong><?php echo $totalJob ?> đơn</strong></strong> </div>
                        </div>
                    </div>  
                @endforeach

                <h3 class="mt-5">Thống kê số serial <img style ="width: 40px;" src="{{asset('frontend/images/seri.png')}}"></h3>
                <?php 
                $totalSeri = count($serial);
                $active = 0;
                $notActive = 0;
                ?>
                @foreach($serial as $keyseri => $val)  
                <?php 
                if($val['status'] === 1){
                    $active ++;
                }else{
                    $notActive ++;
                }
                ?>          
                @endforeach

                <div class="row mt-2"> 
                <div class="col col-1 name_employee">Tổng sổ serial</div>
                        <?php
                            $width = 100;
                        ?>
                        <div class="col col-5  ">
                            <div class="graph" style ="width: <?php echo $width ?>%;background-color: #51f19c;"  ></div>
                        </div>
                        <div class="col col-2  point_employee"><strong> <strong><?php echo $totalSeri ?> serial </strong></strong> </div>    
                </div>  

                <div class="row mt-2"> 
                <div class="col col-1 name_employee">Đã kích hoạt</div>
                        <?php
                            $width = ($active/$totalSeri)*100;
                        ?>
                        <div class="col col-5  ">
                            <div class="graph" style ="width: <?php echo $width ?>% ; background-color: #51f19c;"  ></div>
                        </div>
                        <div class="col col-2  point_employee"><strong> <strong><?php echo $active ?> serial </strong></strong> </div>    
                </div> 

                <div class="row mt-2"> 
                <div class="col col-1 name_employee">Chưa kích hoạt</div>
                        <?php
                            $width = ($notActive/$totalSeri)*100;
                        ?>
                        <div class="col col-5  ">
                            <div class="graph" style ="width: <?php echo $width ?>%;background-color: #51f19c;"  ></div>
                        </div>
                        <div class="col col-2  point_employee"><strong> <strong><?php echo $notActive ?> serial </strong></strong> </div>    
                </div> 

              
                
                <h3 class="mt-5">Sản phẩm <img style ="width: 40px;" src="{{asset('frontend/images/product.png')}}"></h3>
                @foreach($manufacturer as $keyid => $idManufacturer)
                <?php 
                $totalproduct=0;
                $total = count($manufacturer);

                ?>  
                @foreach($product as $key => $val)
                    @if($idManufacturer===$val['id_manu']  )
                    <?php 
                        $totalproduct ++;
                    ?>  
                    @endif
                @endforeach

                
                <div class="statistical_employee mt-2">
                    <div class="row"> 
               
                        <div class="col col-1 name_employee">
                            <?php 
                                foreach($manufacturerName as $kay => $namebrand){
                                    if($idManufacturer == $namebrand['id']){
                                        echo $namebrand['name'];
                                    }
                                }
                            ?>
                        </div>
                        <?php
                            $width = ($totalproduct/$total)*100;
                        ?>
                        <div class="col col-5  ">
                            <div class="graph" style ="width: <?php echo $width ?>% ;background-color: #16d7ff;"  ></div>
                        </div>
                        <div class="col col-2  point_employee"><strong><strong><?php echo $totalproduct ?> sản phẩm</strong></strong> </div>
                        </div>
                    </div>  
                @endforeach
</div>

@endsection