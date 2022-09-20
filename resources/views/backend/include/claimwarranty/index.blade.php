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
                        <h3 class="text-themecolor">Yêu cầu bảo hành</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Yêu cầu bảo hành</li>
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
                <!-- <button class="btn btn-primary mr-10"> <a href="{{route('order-add')}}">Lập đơn mới</a> </button> -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách đơn hàng</h4>
                      
                                <div class="table-responsive">
                                    <table class="table" id="claimwarrantyTable">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã yêu cầu</th>
                                                <th>Tên khách hàng</th>
                                                <th>Trạng thái</th>
                                                <th>Ngày yêu cầu</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($claimwarranty as $key => $val)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$val['claim_code']}}</td>
                                                <td>{{$val['customer_name']}}</td>
                                                <td><?php if($val['status'] === 0){ echo "Chưa xử lý"; }else if($val['status'] === 0){ echo "Đồng ý bảo hành"; }else{echo "Từ chối bảo hành";} ?></td>
                                                <td>{{date('d/m/Y' , strtotime($val['created_at']))}}</td>
                                                <td>
                                                <a  href="{{route('claimwarranty-view-detail',$val['claim_code'])}}" ><button class='btn btn-primary'>Xem chi tiết</button></a>
                                                    
                                                
                                                </td>               
                                            </tr>
                                            @endforeach
                                       
                                          
                                        </tbody>
                                    </table>

                                    {{$claimwarranty->links('pagination::bootstrap-4')}}

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
                    $('#claimwarrantyTable').DataTable({
                        paging: false,
                        ordering: false,
                        info: false,
                    });
                    
                    // $('#productTable').DataTable();
                } );
            </script>
@endsection
