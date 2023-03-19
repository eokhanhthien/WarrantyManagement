@extends('backend.layout')
@section('order')
<?php
// print_r($revenue);
// die;
?>
<link rel="stylesheet" href="{{asset('frontend/css/frontendstyle.css')}}">
<div class="container-fluid ">
    <div class="form-border-5">
<p>Trang thống kê chi tiết</p>
    <form action="{{route('statistical-detail-get')}}" method="post" class="form-border-5 col-5">
        @csrf
        <div class="wide">
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Ngày bắt đầu</p> </div>
                        <div class="col-8"><input type="date" name="startDate" class="form-control" required></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4"> <p class="label-add-order">Ngày kết thúc</p> </div>
                        <div class="col-8"><input type="date" name="endDate" class="form-control" required></div>
                    </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Thống kê</button>
    </form>
    </div>
</div>

@endsection