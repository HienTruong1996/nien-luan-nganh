@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách Hàng
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>Tài khoản</th>
                                <th>Mật Khẩu</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>

                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody ng-app>
                            @foreach ($khachhang as $kh)
                            <tr class="odd gradeX" align="center">
                                
                                <td>{{$kh->kh_ma}}</td>
                                <td>{{$kh->kh_ten}}</td>
                                <td>{{$kh->kh_taiKhoang}}</td>
                                <td>{{$kh->kh_matKhau}}</td>
                                <td>{{$kh->kh_gioiTinh}}</td>
                                <td>{{$kh->kh_email}}</td>
                                <td>{{$kh->kh_ngaySinh}}</td>
                                <td>{{$kh->kh_diaChi}}</td>
                                <td>{{$kh->kh_dienThoai}}</td>

                                <td class="center" ng-if ="{{$kh->kh_trangThai}} == 2">
                                    
                                    <span class="glyphicon glyphicon-ok-sign text-danger"
                                        title ="khả dụng">
                                  
                                    </span>
                                  
                                </td>
                                <td class="center" ng-if ="{{$kh->kh_trangThai}} == 1">
                                   
                                    <span class="glyphicon glyphicon-lock text-warning"
                                        title ="bị khóa">
                                   
                                    </span>
                                
                                </td>
                               
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khachhang/xoa/{{$kh->kh_ma}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/khachhang/sua/{{$kh->kh_ma}}">Edit</a></td>

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