@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chi Tiết Đơn hàng
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
                        <th>Số Lượng</th>
                        <th>Đơn Gía</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Mã Đơn Hàng</th>

                    </tr>
                    </thead>
                    <tbody ng-app>
                    @foreach ($chitietdonhang as $ct)
                        <tr class="odd gradeX" align="center">

                            <td>{{$ct->ctdh_ma}}</td>
                            <td>{{$ct->ctdh_soLuong}}</td>
                            <td>{{$ct->ctdh_donGia}}</td>
                            <td>{{$ct->sp_ma}}</td>
                            <td>{{$ct->dh_ma}}</td>

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