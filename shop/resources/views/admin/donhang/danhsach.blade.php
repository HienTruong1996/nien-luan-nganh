@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn hàng
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                            <div class="alert alert-success">  
                            {{session('thongbao')}}
                            </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã</th>
                                <th>Người nhận</th>
								<th>Điện thoại</th>
								<th>Người gửi</th>
								<th>Tổng tiền</th>
								<th>Trạng thái</th>
								<th>Tạo mới</th>
                                <th>Cập nhật</th>							
								<th>Delete</th>
                                <th>Edit</th>
                                <th>Duyệt</th>
                            </tr>
                        </thead>
                        <tbody ng-app>
                            @foreach ($donhang as $dh)
                            <tr class="odd gradeX" align="center">
                                
                                <td>{{$dh->dh_ma}}</td>
                                <td>{{$dh->dh_nguoiNhan}}</td>
                                <td>{{$dh->dh_dienThoai}}</td>
                                <td>{{$dh->dh_nguoiGui}}</td>
                                <td>{{$dh->dh_tongTien}}</td>
                                <td class="center" ng-if ="{{$dh->dh_trangThai}} == 2">
                                    
                                    <span class="glyphicon glyphicon-repeat text-danger"
                                        title ="khả dụng">
                                  
                                    </span>
                                  
                                </td>
                                <td class="center" ng-if ="{{$dh->dh_trangThai}} == 1">
                                   
                                    <span class="glyphicon glyphicon-ok text-warning"
                                        title ="bị khóa">
                                   
                                    </span>
                                
                                </td>
                                <td>{{$dh->dh_taoMoi}} </td>
                                <td>{{$dh->dh_capNhat}} </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/donhang/xoa/{{$dh->dh_ma}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donhang/sua/{{$dh->dh_ma}}">Edit</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donhang/duyet/{{$dh->dh_ma}}">Duyệt</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection