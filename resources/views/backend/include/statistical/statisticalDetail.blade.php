@extends('backend.layout')
@section('order')
<?php
// print_r($jobemployee);
// die;
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{asset('frontend/css/frontendstyle.css')}}">
<div class="container-fluid ">
    <div class="form-border-5">
<p>Trang thống kê chi tiết</p>
    <div class="form-border-5 col-5">
        @csrf
        <div class="wide">
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Ngày bắt đầu</p> </div>
                        <div class="col-8"><input type="date" name="startDate" id="startDate" class="form-control" required></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Ngày kết thúc</p> </div>
                        <div class="col-8"><input type="date" name="endDate"  id="endDate" class="form-control" required></div>
                    </div>
        </div>
        <button  id ="getdata" class="btn btn-primary mt-3">Thống kê</button>
</div>

<div id="loadProduct" >
@include('backend.include.statistical.Loadstatistical')
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
@endsection