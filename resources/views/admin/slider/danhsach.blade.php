@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Silde
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
                                <th>Loại </th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody ng-app>
                            @foreach ($slider as $sli)
                            <tr class="odd gradeX" align="center">
                                
                                <td>{{$sli->sli_ma}}</td>
                                <td>{{$sli->sli_ten}}</td>
                                <td><img with="50px" height="50px" src="upload/slider/{{$sli->sli_hinhAnh}}"/></td>
                                <td>{{$sli->sli_moTa}}</td>
                                <td class="center" ng-if ="{{$sli->sli_loai}} == 2">
                                Ngang
                                </td>
                                <td class="center" ng-if ="{{$sli->sli_loai}} == 1">
                                Dọc                             
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slider/xoa/{{$sli->sli_ma}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slider/sua/{{$sli->sli_ma}}">Edit</a></td>

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