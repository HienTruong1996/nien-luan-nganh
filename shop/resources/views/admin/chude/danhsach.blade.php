@extends('admin.layout.index')
@section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chủ Đề
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
								<th> Ngày tạo mới </th>
								<th> Ngày cập nhật </th>
								<th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody ng-app>
                            @foreach ($chude as $cd)
                            <tr class="odd gradeX" align="center">
                                
                                <td>{{$cd->cd_ma}}</td>
                                <td>{{$cd->cd_ten}}</td>
                                <td class="center" ng-if ="{{$cd->cd_trangThai}} == 2">
                                    
                                    <span class="glyphicon glyphicon-ok-sign text-danger"
                                        title ="khả dụng">
                                  
                                    </span>
                                  
                                </td>
                                <td class="center" ng-if ="{{$cd->cd_trangThai}} == 1">
                                   
                                    <span class="glyphicon glyphicon-lock text-warning"
                                        title ="bị khóa">
                                   
                                    </span>
                                
                                </td>
                                <td>{{$cd->cd_taoMoi}} </td>
                                <td>{{$cd->cd_capNhat}} </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/chude/xoa/{{$cd->cd_ma}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/chude/sua/{{$cd->cd_ma}}">Edit</a></td>

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