@extends('backend.layout')
@section('order')
<link rel="stylesheet" href="{{asset('frontend/css/frontendstyle.css')}}">
<div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Thống kê nhân viên</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Thống kê nhân viên</li>
                        </ol>
                    </div>
                    <h3>Thống kê công việc của nhân viên</h3>
                    <div class="col-md-7 align-self-center">
                    </div>
                </div>

                <?php 
                $long = 40;
                // $totalJob = count($jobemployee);
                ?>  
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
                        <div class="col col-2  point_employee"><strong><?php echo $totalJob ?> đơn</strong> </div>
                        </div>
                    </div>  
                @endforeach
                
</div>

@endsection