@extends('backend.layout')
@section('order')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.csss">
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                @if (session('message'))
                    <div class="text-success-ct">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Sản phẩm</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
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
                <button class="btn btn-success mr-10"> <a href="{{route('product-add')}}">Thêm sản phẩm <img style ="width: 40px;" src="{{asset('frontend/images/plus.png')}}"></a> </button>
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách sản phẩm</h4>
                      
                                <div class="table-responsive">
                                    <table class="table mb-3" id='productTable'>
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên</th>
                                                <th>Ảnh</th>
                                                <th>Giá</th>
                                                <th>Ngày thêm</th>
                                                <th>Ngày sửa</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $key => $val)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $val['name'] }}</td>
                                                <td><img src="/uploads/product/{{ $val['image']}}" alt="" style="width: 100px"></td>
                                                <td>{{ number_format($val['price']) }} đ</td>
                                                <td>{{ $val['created_at'] }}</td>
                                                <td>{{ $val['updated_at'] }}</td>
                                                <td>
                                                    <a  href="{{route('product-edit',$val['id'])}}" ><button class='btn btn-primary'><img style ="width: 30px;" src="{{asset('frontend/images/edit.png')}}"></button></a>
                                                    <form method="POST" action="{{route('product-delete',$val['id'])}}">  
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" onclick = "return confirm('Bạn có muốn xóa mục này không ?')" class='btn btn-danger mt-2'><img style ="width: 30px;" src="{{asset('frontend/images/remove.png')}}"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                    {{$data->links('pagination::bootstrap-4')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>


            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <br><script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>            
            <script>
                $(document).ready( function () {
                    $('#productTable').DataTable({
                        paging: false,
                        ordering: false,
                        info: false,
                    });
                    
                    // $('#productTable').DataTable();
                } );
            </script>
@endsection
