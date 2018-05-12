@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách hàng
                            <small>Chỉnh sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
					<div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtTen" placeholder="chỉnh sửa tên khách hàng" />
                            </div>
                            <div class="form-group">
                                <label>Tài khoản</label>
                                <input class="form-control" name="txtTaikhoan" placeholder="chỉnh sửa tên tài khoản" />
                            </div>
							 <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="form-control" name="txtMatkhau" placeholder="chỉnh sửa mật khẩu" />
                            </div>
							 <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="txtEmail" placeholder="chỉnh sửa địa chỉ email" />
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
                                <label>Năm sinh</label>
                                <input class="form-control" name="txtNamsinh" placeholder="chỉnh sửa năm sinh" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="txtDiachi" placeholder="chỉnh sửa địa chỉ" />
                            </div>
							<div class="form-group">
                                <label>Điện thoại</label>
                                <input class="form-control" name="txtDienthoai" placeholder="chỉnh sửa số điện thoại" />
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