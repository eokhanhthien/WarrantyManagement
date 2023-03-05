@extends('backend.layout')
@section('order')
<?php
// print_r(Session::get('admin'));die;
?>
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
                        <h3 class="text-themecolor">Hóa đơn mua hàng</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Hóa đơn mua hàng</li>
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
                <button class="btn btn-primary mr-10"> <a href="{{route('order-add')}}">Lập đơn mới <img style ="width: 40px;" src="{{asset('frontend/images/plus.png')}}"></a> </button>
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách đơn hàng</h4>
                      
                                <div class="table-responsive">
                                    <table class="table" id='productTable'>
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã đơn hàng</th>
                                                <th>Tên khách hàng</th>
                                                <th>Số điện thoại</th>
                                                <th>Ngày tạo</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order as $key => $val)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$val['order_code']}}</td>
                                                <td>{{$val['name_customer']}}</td>
                                                <td>{{$val['phone_customer']}}</td>
                                                <td>{{date('d/m/Y' , strtotime($val['created_at']))}}</td>
                                                <td>
                                                <a  href="{{route('order-view-detail',$val['order_code'])}}" title="Xem chi tiết" ><button class='btn btn-primary'><img style ="width: 30px;" src="{{asset('frontend/images/bill.png')}}"></button></a>
                                                    <!-- <form method="POST" action="{{route('order-delete',$val['order_code'])}}">  
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" onclick = "return confirm('Bạn có muốn xóa mục này không ?')" class='btn btn-danger mt-2'><img style ="width: 30px;" src="{{asset('frontend/images/remove.png')}}"></button>
                                                    </form> -->
                                                
                                                </td>               
                                            </tr>
                                            @endforeach
                                       
                                          
                                        </tbody>
                                    </table>
                                    {{$order->links('pagination::bootstrap-4')}}
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
