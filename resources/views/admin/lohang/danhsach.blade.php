@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lô hàng
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
                        <th>Giá Mua Vào</th>
                        <th>Giá Bán Ra</th>
                        <th>Số Lương Nhập</th>
                        <th>Số Lượng Đã Bán</th>
                        <th>Trạng thái</th>
                        <th>Tạo mới</th>
                        <th>Cập nhật</th>
                        <th>Mã Nhà Cung Cấp</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody ng-app>
                    @foreach ($lohang as $lh)
                        <tr class="odd gradeX" align="center">

                            <td>{{$lh->lh_ma}}</td>
                            <td>{{$lh->lh_giaMuaVao}}</td>
                            <td>{{$lh->lh_giaBanRa}}</td>
                            <td>{{$lh->lh_soLuongNhap}}</td>
                            <td>{{$lh->lh_soLuongDaBan}}</td>
                            <td class="center" ng-if ="{{$lh->lh_trangThai}} == 2">

                                    <span class="glyphicon glyphicon-ok-sign text-danger"
                                          title ="khả dụng">

                                    </span>

                            </td>
                            <td class="center" ng-if ="{{$lh->lh_trangThai}} == 1">

                                    <span class="glyphicon glyphicon-lock text-warning"
                                          title ="bị khóa">

                                    </span>

                            </td>
                            <td>{{$lh->lh_taoMoi}} </td>
                            <td>{{$lh->lh_capNhat}} </td>
                            <td>{{$lh->ncc_ma}}</td>
                            <td>{{$lh->sp_ma}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/lohang/xoa/{{$lh->lh_ma}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/lohang/sua/{{$lh->lh_ma}}">Edit</a></td>

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