@extends('backend.layout')
@section('order')
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
                        <h3 class="text-themecolor">Hãng sản xuất</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Hãng sản xuất</li>
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
                <button class="btn btn-success mr-10"> <a href="{{route('manufacturer-add')}}">Thêm hãng sản xuất <img style ="width: 40px;" src="{{asset('frontend/images/plus.png')}}"></a> </button>
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách hãng</h4>
                      
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên hãng</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $key => $val)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $val['name'] }}</td>
                                                <td>
                                                    <a  href="{{route('manufacturer-edit',$val['id'])}}" ><button class='btn btn-primary'><img style ="width: 40px;" src="{{asset('frontend/images/edit.png')}}"></button></a>
                                                    <form method="POST" action="{{route('manufacturer-delete',$val['id'])}}">  
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" onclick = "return confirm('Bạn có muốn xóa mục này không ?')" class='btn btn-danger mt-2'><img style ="width: 40px;" src="{{asset('frontend/images/remove.png')}}"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
