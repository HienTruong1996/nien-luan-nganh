@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhân viên
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã</th>
                                <th>Tên</th>
								<th>Giới tính</th>
								<th>Email</th>
                                <th>Ngày sinh</th>
								<th>Địa chỉ</th>
								<th>Điện thoại</th>
								<th>Trạng thái</th>
								<th>Delete</th>
                                <th>Edit</th>
                                <th>Thêm tài khoảng</th>
                            </tr>
                        </thead>
                        <tbody ng-app>
                            @foreach ($nhanvien as $nv)
                            <tr class="odd gradeX" align="center">
                                
                                <td>{{$nv->nv_ma}}</td>
                                <td>{{$nv->nv_ten}}</td>
                                <td>
                                    @if($nv->nv_gioiTinh == 1)
                                        {{"nam"}}
                                    @else
                                        {{"nu"}}

                                    @endif

                                    </td>
                                <td>{{$nv->nv_email}}</td>
                                <td>{{$nv->nv_ngaySinh}}</td>
                                <td>{{$nv->nv_diaChi}}</td>
                                <td>{{$nv->nv_dienThoai}}</td>

                                <td class="center" ng-if ="{{$nv->nv_trangThai}} == 2">
                                    
                                    <span class="glyphicon glyphicon-ok-sign text-danger"
                                        title ="khả dụng">
                                  
                                    </span>
                                  
                                </td>
                                <td class="center" ng-if ="{{$nv->nv_trangThai}} == 1">
                                   
                                    <span class="glyphicon glyphicon-lock text-warning"
                                        title ="bị khóa">
                                   
                                    </span>
                                
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nhanvien/xoa/{{$nv->nv_ma}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nhanvien/sua/{{$nv->nv_ma}}">Edit</a></td>
                                <td class="center"><i class="fa fa-user fa-fw"></i> <a href="admin/nhanvien/themtaikhoan/{{$nv->nv_ma}}">Thêm tài khoản</a></td>

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