@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Hình Ảnh</th>
                                <th>Mô tả</th>
                                <th>Giá Gốc</th>
                                <th>Giá Bán</th>
                                <th>Chủ Đề</th>
                                <th>Loại</th>
                                <th>Màu</th>
                                <th>Trạng Thái</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody ng-app>
                            @foreach ($sanpham as $sp)
                            <tr class="odd gradeX" align="center">
                                
                                <td>{{$sp->sp_ma}}</td>
                                <td>{{$sp->sp_ten}}</td>
                                <td><img with="50px" height="50px" src="upload/sanpham/{{$sp->sp_hinhAnh}}"/></td>
                                <td>{{$sp->sp_moTa}}</td>
                                <td>{{$sp->sp_giaGoc}}</td>
                                <td>{{$sp->sp_giaBan}}</td>
                                <td>{{$sp->cd_ma}}</td>
                                <td>{{$sp->l_ma}}</td>
                                <td>{{$sp->mcd_ma}}</td>

                                <td class="center" ng-if ="{{$sp->sp_trangThai}} == 2">
                                    
                                    <span class="glyphicon glyphicon-ok-sign text-danger"
                                        title ="khả dụng">
                                  
                                    </span>
                                  
                                </td>
                                <td class="center" ng-if ="{{$sp->sp_trangThai}} == 1">
                                   
                                    <span class="glyphicon glyphicon-lock text-warning"
                                        title ="bị khóa">
                                   
                                    </span>
                                
                                </td>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{$sp->sp_ma}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$sp->sp_ma}}">Edit</a></td>

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