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
                        <h3 class="text-themecolor">Serial bảo hành</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Serial bảo hành</li>
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
                <!-- <button class="btn-ct btn-success mr-10"> <a href="{{route('serial-add')}}">Thêm serial mới</a> </button> -->
                <!-- Tabs navs -->
<ul class="nav nav-tabs nav-fill" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active"
      id="ex2-tab-1"
      data-mdb-toggle="tab"
      href="#ex2-tabs-1"
      role="tab"
      aria-controls="ex2-tabs-1"
      aria-selected="true"
      >Tất cả</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex2-tab-2"
      data-mdb-toggle="tab"
      href="#ex2-tabs-2"
      role="tab"
      aria-controls="ex2-tabs-2"
      aria-selected="false"
      >Đã kích hoạt</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex2-tab-3"
      data-mdb-toggle="tab"
      href="#ex2-tabs-3"
      role="tab"
      aria-controls="ex2-tabs-3"
      aria-selected="false"
      >Chưa kích hoạt</a
    >
  </li>
</ul>
<!-- Tabs navs -->

<!-- Tabs content -->
<div class="tab-content" id="ex2-content">
  <div class="tab-pane fade show active" id="ex2-tabs-1"role="tabpanel"aria-labelledby="ex2-tab-1">
  <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách Serial bảo hành</h4>
                      
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Số serial</th>
                                                <th>Trạng thái</th>
                                                <th>Thời gian bảo hành</th>
                                                <th>Ngày kích hoạt</th>
                                                <th>Ngày hết bảo hành</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($serial as $key => $val)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $val['serial_number'] }}</td>
                                                <td>{{ ($val['status'])==1?'Đã kích hoạt': 'Chưa kích hoạt' }}</td>
                                                <td>{{ $val['warranty_time'] }} tháng</td>                            
                                                <td>{{ ($val['status'])==1?date('d/m/Y' , strtotime($val['activate_time'])): 'Chưa kích hoạt' }}</td>
                                                <td>{{ ($val['status'])==1?date('d/m/Y' , strtotime("+".$val['warranty_time']."months", strtotime($val['activate_time']))): 'Chưa kích hoạt' }}</td>

                                                <td>
                                                    <a  href="{{route('serial-edit',$val['id'])}}" ><button class='btn-ct btn-primary'><img style ="width: 30px;" src="{{asset('frontend/images/edit.png')}}"></button></a>
                                                    <form method="POST" action="{{route('serial-delete',$val['id'])}}">  
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" onclick = "return confirm('Bạn có muốn xóa mục này không ?')" class='btn-ct btn-danger mt-2'><img style ="width: 30px;" src="{{asset('frontend/images/remove.png')}}"></button>
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
  </div>
  <div
    class="tab-pane fade"
    id="ex2-tabs-2"
    role="tabpanel"
    aria-labelledby="ex2-tab-2"
  >
  <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách Serial bảo hành</h4>
                      
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Số serial</th>
                                                <th>Trạng thái</th>
                                                <th>Thời gian bảo hành</th>
                                                <th>Ngày kích hoạt</th>
                                                <th>Ngày hết bảo hành</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($serial_active as $key => $val)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $val['serial_number'] }}</td>
                                                <td>{{ ($val['status'])==1?'Đã kích hoạt': 'Chưa kích hoạt' }}</td>
                                                <td>{{ $val['warranty_time'] }} tháng</td>                            
                                                <td>{{ ($val['status'])==1?date('d/m/Y' , strtotime($val['activate_time'])): 'Chưa kích hoạt' }}</td>
                                                <td>{{ ($val['status'])==1?date('d/m/Y' , strtotime("+".$val['warranty_time']."months", strtotime($val['activate_time']))): 'Chưa kích hoạt' }}</td>

                                                <td>
                                                    <a  href="{{route('serial-edit',$val['id'])}}" ><button class='btn-ct btn-primary'><img style ="width: 30px;" src="{{asset('frontend/images/edit.png')}}"></button></a>
                                                    <form method="POST" action="{{route('serial-delete',$val['id'])}}">  
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" onclick = "return confirm('Bạn có muốn xóa mục này không ?')" class='btn-ct btn-danger mt-2'><img style ="width: 30px;" src="{{asset('frontend/images/remove.png')}}"></button>
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
  </div>
  <div
    class="tab-pane fade"
    id="ex2-tabs-3"
    role="tabpanel"
    aria-labelledby="ex2-tab-3"
  >
  <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách Serial bảo hành</h4>
                      
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Số serial</th>
                                                <th>Trạng thái</th>
                                                <th>Thời gian bảo hành</th>
                                                <th>Ngày kích hoạt</th>
                                                <th>Ngày hết bảo hành</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($serial_not_active as $key => $val)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $val['serial_number'] }}</td>
                                                <td>{{ ($val['status'])==1?'Đã kích hoạt': 'Chưa kích hoạt' }}</td>
                                                <td>{{ $val['warranty_time'] }} tháng</td>                            
                                                <td>{{ ($val['status'])==1?date('d/m/Y' , strtotime($val['activate_time'])): 'Chưa kích hoạt' }}</td>
                                                <td>{{ ($val['status'])==1?date('d/m/Y' , strtotime("+".$val['warranty_time']."months", strtotime($val['activate_time']))): 'Chưa kích hoạt' }}</td>

                                                <td>
                                                    <a  href="{{route('serial-edit',$val['id'])}}" ><button class='btn-ct btn-primary'><img style ="width: 30px;" src="{{asset('frontend/images/edit.png')}}"></button></a>
                                                    <form method="POST" action="{{route('serial-delete',$val['id'])}}">  
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" onclick = "return confirm('Bạn có muốn xóa mục này không ?')" class='btn-ct btn-danger mt-2'><img style ="width: 30px;" src="{{asset('frontend/images/remove.png')}}"></button>
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
  </div>
</div>
<!-- Tabs content -->

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"
></script>
@endsection
