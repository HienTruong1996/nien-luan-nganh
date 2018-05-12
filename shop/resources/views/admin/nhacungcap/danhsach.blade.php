@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhà cung cấp
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>mã</th>
                                <th>Tên</th>
								<th>Địa chỉ</th>
								<th>Số điện thoại</th>
								<th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nhacungcap as $nccc)
                            <tr class="odd gradeX" align="center">                              
                                <td>{{$nccc->ncc_ma}}</td>
                                <td>{{$nccc->ncc_ten}}</td>
                                <td>{{$nccc->ncc_diaChi}} </td>
                                <td>{{$nccc->ncc_dienThoai}} </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nhacungcap/xoa/{{$nccc->ncc_ma}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nhacungcap/sua/{{$nccc->ncc_ma}}">Edit</a></td>

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