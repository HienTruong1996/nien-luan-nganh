@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khuyến Mãi
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Têu Đề</th>
                        <th>Hình Ảnh</th>
                        <th>Nội Dung</th>
                        <th>Phần Trăm</th>
                        <th>Thời Gian</th>
                        <th>Trạng Thái</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody ng-app>
                    @foreach ($khuyenmai as $sp)
                        <tr class="odd gradeX" align="center">

                            <td>{{$sp->km_ma}}</td>
                            <td>{{$sp->km_teuDe}}</td>
                            <td><img with="50px" height="50px" src="upload/sanpham/{{$sp->km_anh}}"/></td>
                            <td>{{$sp->km_noiDung}}</td>
                            <td>{{$sp->km_phanTram}}</td>
                            <td>{{$sp->km_thoiGian}}</td>


                            <td class="center" ng-if ="{{$sp->km_trangThai}} == 2">

                                    <span class="glyphicon glyphicon-ok-sign text-danger"
                                          title ="khả dụng">

                                    </span>

                            </td>
                            <td class="center" ng-if ="{{$sp->km_trangThai}} == 1">

                                    <span class="glyphicon glyphicon-lock text-warning"
                                          title ="bị khóa">

                                    </span>

                            </td>

                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khuyenmai/xoa/{{$sp->km_ma}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/khuyenmai/sua/{{$sp->km_ma}}">Edit</a></td>

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