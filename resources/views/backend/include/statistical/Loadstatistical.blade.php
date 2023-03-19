   <?php 
//    print_r($jobemployee);die;
   ?>
   <div class="form-border text-start">
            <h3 class="mt-5"><img style="width: 40px;" src="{{asset('frontend/images/fix.png')}}"> Tất cả công việc</h3>
            <div class="col-md-7 align-self-center">
            </div>


            <div class="row">

                <div class="col col-1 name_employee">
                    Tất cả công việc
                </div>
                <div class="col col-5  ">
                    <div class="graph" style="width: 100%"></div>
                </div>
                <div class="col col-2  point_employee"><strong><strong> công
                            việc</strong></strong> </div>
            </div>

            <?php 
                //   $totalFinal = 0;
                  $totalJob = count($jobemployee);
                ?>

     


            <div class="row mt-2">

                <div class="col col-1 name_employee">
                    Đã hoàn thành
                </div>
                <?php
                            // $width = ($totalFinal/$totalJob)*100;
                        ?>
                <div class="col col-5  ">
                    <div class="graph" style="width: <?php  ?>%"></div>
                </div>
                <div class="col col-2  point_employee"><strong><strong>{{$totalJob}} công việc</strong></strong>
                </div>
            </div>

            <div class="row mt-2">

                <div class="col col-1 name_employee">
                    Chưa hoàn thành
                </div>
                <?php
                            // $width = (($totalJob - $totalFinal)/$totalJob)*100;
                        ?>
                <div class="col col-5  ">
                    <div class="graph" style="width: <?php  ?>%"></div>
                </div>
                <div class="col col-2  point_employee"><strong><strong> công
                            việc</strong></strong> </div>
            </div>

        </div>

    </div>

    <script>
    
  $(document).ready(function(){

    $('#getdata').click(()=>{
    var startDate = $('#startDate').val();
    var endDate = $('#endDate').val();
    $.ajax({
    url: "statistical-detail-get",
    method: "post",
    data: {
        startDate : startDate,
        endDate : endDate,
        "_token": "{{ csrf_token() }}",
        },
	  success : function(response) {
        $('#loadProduct').html(response)
	}
	})

  })

  })
</script>