@extends('admin.layout.index')
@section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Màu chủ đạo
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
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Trạng Thái</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody ng-app>
                            @foreach ($mauchudao as $mcd)
                            <tr class="odd gradeX" align="center">
                                
                                <td>{{$mcd->mcd_ma}}</td>
                                <td>{{$mcd->mcd_ten}}</td>
                                <td class="center" ng-if ="{{$mcd->mcd_trangThai}} == 2">
                                    
                                    <span class="glyphicon glyphicon-ok-sign text-danger"
                                        title ="khả dụng">
                                  
                                    </span>
                                  
                                </td>
                                <td class="center" ng-if ="{{$mcd->mcd_trangThai}} == 1">
                                   
                                    <span class="glyphicon glyphicon-lock text-warning"
                                        title ="bị khóa">
                                   
                                    </span>
                                
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/mauchudao/xoa/{{$mcd->mcd_ma}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/mauchudao/sua/{{$mcd->mcd_ma}}">Edit</a></td>

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