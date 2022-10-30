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
                    <h3>Thống kê công việc của nhân viên (Tất cả)</h3>
                    <div class="col-md-7 align-self-center">
                    </div>
                </div>


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



                <h3 class="mt-4">Công việc đã hoàn thành</h3>
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


                <h3 class="mt-4">Thống kê số serial</h3>
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
                            <div class="graph" style ="width: <?php echo $width ?>%"  ></div>
                        </div>
                        <div class="col col-2  point_employee"><strong> <strong><?php echo $totalSeri ?> serial </strong></strong> </div>    
                </div>  

                <div class="row mt-2"> 
                <div class="col col-1 name_employee">Đã kích hoạt</div>
                        <?php
                            $width = ($active/$totalSeri)*100;
                        ?>
                        <div class="col col-5  ">
                            <div class="graph" style ="width: <?php echo $width ?>%"  ></div>
                        </div>
                        <div class="col col-2  point_employee"><strong> <strong><?php echo $active ?> serial </strong></strong> </div>    
                </div> 

                <div class="row mt-2"> 
                <div class="col col-1 name_employee">Chưa kích hoạt</div>
                        <?php
                            $width = ($notActive/$totalSeri)*100;
                        ?>
                        <div class="col col-5  ">
                            <div class="graph" style ="width: <?php echo $width ?>%"  ></div>
                        </div>
                        <div class="col col-2  point_employee"><strong> <strong><?php echo $active ?> serial </strong></strong> </div>    
                </div> 

                
</div>

@endsection