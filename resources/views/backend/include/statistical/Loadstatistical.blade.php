   <?php 
//    print_r($order);die;
   ?>
   <div class="form-border text-start">
            <h3 class="mt-5"><img style="width: 40px;" src="{{asset('frontend/images/fix.png')}}"> Tất cả công việc</h3>
            <div class="col-md-7 align-self-center">
            </div>
            <?php 
                  $totalFinal = 0;
                  $totalJob = count($jobemployee);
                ?>
                  <?php 
                  for($i = 0 ; $i< count($jobemployee) ; $i++){
                  if( $jobemployee[$i]['type'] == 10 || $jobemployee[$i]['type'] == 9){ 
                    $totalFinal ++;
                  }
                }
                  ?>
                <?php
                            $width = ($totalFinal/$totalJob)*100;
                        ?>

            <div class="row">

                <div class="col col-1 name_employee">
                    Tất cả công việc
                </div>
                <div class="col col-5  ">
                    <div class="graph" style="width: 100%"></div>
                </div>
                <div class="col col-2  point_employee"><strong><strong>{{$totalJob}} công việc</strong></strong> </div>
            </div>
 


            <div class="row mt-2">

                <div class="col col-1 name_employee">
                    Đã hoàn thành
                </div>

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
                            $width = (($totalJob-$totalFinal)/$totalJob)*100;
                        ?>
                <div class="col col-5  ">
                    <div class="graph" style="width: <?php echo $width ?>%"></div>
                </div>
                <div class="col col-2  point_employee"><strong><strong>{{($totalJob-$totalFinal)}} công
                            việc</strong></strong> </div>
            </div>



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