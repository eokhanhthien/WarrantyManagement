@extends('backend.layout')
@section('order')
<meta name="_token" content="{{ csrf_token() }}">

<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Thêm sản phẩm</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                <button class="btn btn-primary mr-10"> <a href="{{route('product')}}">Quay lại</a> </button>
                <form action="{{route('add-product')}}" method="post" enctype="multipart/form-data" class="col-5 form-border">
                @csrf
                <div class="wide">
                    <div class="row">
                        <div class="col-4"> <p class="label-add-order">Chọn hãng</p> </div>
                        <div class="col-8">
                            <select class='address-main' name='id_manu' required>
                                <option value="">Chọn hãng</option>
                                @foreach($data_manu as $key => $val)
                                    <option value= "{{$val['id']}}">{{$val['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                                <div class="col-4"> <p class="label-add-order">Tên sản phẩm</p> </div>
                                <div class="col-8"><input class="input-add-order" type="text" placeholder="Name" name="name" required></div>
                            </div>
                            <div class="row">
                                <div class="col-4"> <p class="label-add-order">Hình ảnh</p> </div>
                                <div class="col-8"><input class="" type="file" placeholder="Manufacturer name" name="image" required></div>
                            </div>
                            <div class="row">
                                <div class="col-4"> <p class="label-add-order">Giá</p> </div>
                                <div class="col-8"><input class="input-add-order" type="text" placeholder="Price" name="price" required></div>
                    </div>
                </div>
                <button type='submit' class='btn btn-success'>Thêm</button>
                </form>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


@endsection
