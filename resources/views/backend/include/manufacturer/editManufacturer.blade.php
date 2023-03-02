@extends('backend.layout')
@section('order')
<meta name="_token" content="{{ csrf_token() }}">

<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Thêm hãng sản xuất</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Thêm hãng sản xuất</li>
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
                <!-- ============================================================== -->
                <button class="btn btn-primary mr-10"> <a href="{{route('manufacturer')}}">Quay lại</a> </button>
                <form action="{{route('manufacturer-update', $data['id'] )}}" method="post" class="col-5 form-border-5">
                @csrf
                <div class="wide">
                    <div class="row">
                        <div class="col-4"> <p class="label-add-order">Tên hãng</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" value="<?= $data['name'] ?>" placeholder="Manufacturer name" name="name" required></div>
                    </div>
                </div>
                <button type='submit' class='btn btn-success'>Sửa</button>
                </form>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


@endsection
