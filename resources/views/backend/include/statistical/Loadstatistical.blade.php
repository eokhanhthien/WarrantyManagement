   <?php 
//    print_r($order);die;
   ?>
   <div class="form-border text-start">
            <h3 class="mt-5"><img style="width: 40px;" src="{{asset('frontend/images/fix.png')}}"> Tất cả công việc</h3>
            <div class="col-md-7 align-self-center">
            </div>
            <?php 
                  $totalFinal = 0;
                  $totalJobdisplay = count($jobemployee);
                  $totalJob = count($jobemployee);
                  if($totalJob == 0){
                    $totalJob = 1;
                  }
                ?>
                  <?php 
                  for($i = 0 ; $i< count($jobemployee) ; $i++){
                  if( $jobemployee[$i]['type'] == 10 || $jobemployee[$i]['type'] == 9){ 
                    $totalFinal ++;
                  }
                }
                  ?>
                <?php
                            $width = 100;
                            if( $totalJobdisplay == 0){
                                $width = 0;

                            }
                        ?>

            <div class="row">

                <div class="col col-1 name_employee">
                    Tất cả công việc
                </div>
                <div class="col col-5  ">
                    <div class="graph" style="width: <?php echo $width ?>%"></div>
                </div>
                <div class="col col-2  point_employee"><strong><strong>{{$totalJobdisplay}} công việc</strong></strong> </div>
            </div>
 


            <div class="row mt-2">

                <div class="col col-1 name_employee">
                    Đã hoàn thành
                </div>
                <?php
                            $width = ($totalFinal/$totalJob)*100;
                        ?>
                <div class="col col-5  ">
                    <div class="graph" style="width: <?php echo $width ?>%"></div>
                </div>
                <div class="col col-2  point_employee"><strong><strong>{{$totalFinal}} công việc</strong></strong>
                </div>
            </div>

            <div class="row mt-2">

                <div class="col col-1 name_employee">
                    Chưa hoàn thành
                </div>
                <?php
                            $width = (($totalJobdisplay-$totalFinal)/$totalJob)*100;
                        ?>
                <div class="col col-5  ">
                    <div class="graph" style="width: <?php echo $width ?>%"></div>
                </div>
                <div class="col col-2  point_employee"><strong><strong>{{($totalJobdisplay-$totalFinal)}} công
                            việc</strong></strong> </div>
            </div>




    

<h3 class="mt-5"><img style="width: 40px;" src="{{asset('frontend/images/member.png')}}"> Công việc theo
    từng nhân viên </h3>

<div style="color: #00a924;
                font-weight: 600;">Tất cả công việc</div>


@foreach($employee as $keyid => $idEmployee)
<?php 
    $totalJob=0;
    $total = count($jobemployee);
    if($total==0){
        $total =1;
    }
    ?>
@foreach($jobemployee as $key => $val)
@if($idEmployee===$val['id_technician'] )
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
            <div class="graph" style="width: <?php echo $width ?>%"></div>
        </div>
        <div class="col col-2  point_employee"><strong><strong><?php echo $totalJob ?> công
                    việc</strong></strong> </div>
    </div>
</div>
@endforeach



<div style="color: #00a924;
                font-weight: 600;">Đã hoàn thành</div>
@foreach($employee as $keyid => $idEmployee)
<?php 
    $totalJob=0;
    $total = count($jobemployee);
    if($total==0){
        $total = 1;
    }                
    ?>

@foreach($jobemployee as $key => $val)
@if($idEmployee===$val['id_technician'] && $val['type'] === 10 )
<?php 
            $totalJob ++;
        ?>
@elseif($idEmployee===$val['id_technician'] && $val['type'] === 9 )
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
            <div class="graph" style="width: <?php echo $width ?>%"></div>
        </div>
        <div class="col col-2  point_employee"><strong><strong><?php echo $totalJob ?> công
                    việc</strong></strong> </div>
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
    if($total==0){
        $total =1;
    }
    ?>

@foreach($jobemployee as $key => $val)
@if($idEmployee===$val['id_technician'] && $val['type'] === 1 )
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
            <div class="graph" style="width: <?php echo $width ?>%"></div>
        </div>
        <div class="col col-2  point_employee"><strong><strong><?php echo $totalJob ?> công
                    việc</strong></strong> </div>
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
    if($total==0){
        $total =1;
    }
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
            <div class="graph" style="width: <?php echo $width ?>%; background-color: #ff4c4c;"></div>
        </div>
        <div class="col col-2  point_employee"><strong><strong><?php echo $totalJob ?> sản
                    phẩm</strong></strong> </div>
    </div>
</div>
@endforeach


            <?php
                $widthorder = ((count($order))/(count($ordertotal)))*100;
            ?>
            <h3 class="mt-5"><img style="width: 40px;" src="{{asset('frontend/images/claim.png')}}"> Hóa đơn</h3>
            <div class="row">

                <div class="col col-1 name_employee">
                    Tất cả hóa đơn
                </div>
                <div class="col col-5  ">
                    <div class="graph" style="width: <?php echo $widthorder ?>% ;background: rgb(131,58,180);
                    background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,126,29,1) 100%, rgba(252,176,69,1) 100%);"></div>
                </div>
                <div class="col col-2  point_employee"><strong><strong>{{count($order)}} hóa đơn</strong></strong> </div>
            </div>

</div>






    <script>
    
//   $(document).ready(function(){

//     $('#getdata').click(()=>{
//     var startDate = $('#startDate').val();
//     var endDate = $('#endDate').val();
//     $.ajax({
//     url: "statistical-detail-get",
//     method: "post",
//     data: {
//         startDate : startDate,
//         endDate : endDate,
//         "_token": "{{ csrf_token() }}",
//         },
// 	  success : function(response) {
//         $('#loadProduct').html(response)
// 	}
// 	})

//   })

//   })
</script>