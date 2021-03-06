@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn hàng
                            <small>Chỉnh sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
					 <div class="form-group">
                                <label>Người nhận</label>
                                <input class="form-control" name="txtNguoinhan" placeholder="nhập tên người nhận" />
                            </div>
							<div class="form-group">
                                <label>Điện thoại</label>
                                <input class="form-control" name="txtDienthoai" placeholder="nhập số điện thoại" />
                            </div>
                            <div class="form-group">
                                <label>Người gửi</label>
                                <input class="form-control" name="txtNguoigui" placeholder="nhập tên người gửi" />
                            </div>
							<div class="form-group">
                                <label>Tổng tiền</label>
                                <input class="form-control" name="txtTongtien" placeholder="nhập tổng tiền" />
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <label class="radio-inline">
                                    <input name="rdoTrangthai" value="1" checked="" type="radio">Đã gửi
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoTrangthai" value="2" type="radio">Chưa gửi
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