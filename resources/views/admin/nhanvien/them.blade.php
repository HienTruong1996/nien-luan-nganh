@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm nhân viên
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}} <br>
                                @endforeach
                            </div>
                    @endif

                    @if(session('thongbao'))
                            <div class="alert alert-success">  
                            {{session('thongbao')}}
                            </div>
                    @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/nhanvien/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtTen" placeholder="nhập tên" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <label class="radio-inline">
                                    <input name="rdoGioitinh" value="1" checked="" type="radio">Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoGioitinh" value="2" type="radio">Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="txtEmmail" placeholder="nhập email" />
                            </div>
							<div class="form-group">
                                <label>Ngày sinh</label>
                                <input class="form-control" name="txtNgaysinh" type = "date" placeholder="nhập ngày sinh" />
                            </div>
							
							<div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="txtDiachi" placeholder="nhập địa chỉ" />
                            </div>
                           <div class="form-group">
                                <label>Điện thoại</label>
                                <input class="form-control" name="txtDienthoai" placeholder="nhập số điện thoại" />
                            </div>
							
							 <div class="form-group">
                                <label>Trạng thái</label>
                                <label class="radio-inline">
                                    <input name="rdoGioitinh" value="1" checked="" type="radio">Bị khóa
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoGioitinh" value="2" type="radio">Khả dụng
                                </label>
                            </div>							
                            <button type="submit" class="btn btn-default">Lưu</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection