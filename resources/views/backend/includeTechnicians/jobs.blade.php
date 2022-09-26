@extends('backend.layoutTechnician')
@section('includeTechnicians')
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
                        <h3 class="text-themecolor">Công việc của bạn</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Công việc của bạn</li>
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
                <!-- <button class="btn btn-success mr-10"> <a href="{{route('product-add')}}">Thêm sản phẩm</a> </button> -->
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
                                                <th>Mã đơn</th>
                                                <th>Ngày nhận công việc</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($jobemployee as $key => $val)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $val['order_code'] }}</td>
                                                <td>{{ $val['created_at'] }}</td>
                                                <td>
                                                    <a  href="{{route('employee-view-detail',$val['order_code'])}}" ><button class='btn btn-primary'>Xem chi tiết</button></a>
                                                 
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                    <!-- {{$jobemployee->links('pagination::bootstrap-4')}} -->
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
