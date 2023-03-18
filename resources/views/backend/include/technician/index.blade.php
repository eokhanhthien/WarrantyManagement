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
                        <h3 class="text-themecolor">Quản lý nhân sự</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Quản lý nhân sự</li>
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
                <button class="btn btn-success mr-10"> <a href="{{route('technicians-add')}}">Thêm nhân sự <img style ="width: 30px;" src="{{asset('frontend/images/plus.png')}}"></a> </button>
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
                                                <th>Họ và tên</th>
                                                <th>Tài khoản</th>
                                                <th>Email</th>
                                                <th>Chức vụ</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $key => $val)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $val['fullname'] }}</td>
                                                <td>{{ $val['username'] }}</td>
                                                <td>{{ $val['email'] }}</td>
                                                <td><?php echo $val['role']===1?'Quản trị viên':'Kỹ thuật viên' ?></td>

                                                <td>
                                                    <a  href="{{route('technicians-edit',$val['id'])}}" ><button class='btn btn-primary'><img style ="width: 22px;" src="{{asset('frontend/images/edit.png')}}"></button></a>
                                                    <form method="POST" action="{{route('technicians-delete',$val['id'])}}">  
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" onclick = "return confirm('Bạn có muốn xóa mục này không ?')" class='btn btn-danger mt-2'><img style ="width: 22px;" src="{{asset('frontend/images/remove.png')}}"></button>
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
