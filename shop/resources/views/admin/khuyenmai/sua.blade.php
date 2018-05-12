@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">CHỉnh sửa khuyến mãi
                            <small>Chỉnh sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
					 <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="txtTieude" placeholder="nhập tiêu đề" />
                            </div>
							<div class="form-group">
                                <label>Nội dung</label>
                                <input class="form-control" name="txtNoidung" placeholder="nhập nội dung" />
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <input type="file" name="fImages">
                            </div>
                            <div class="form-group">
                                <label>Phần trăm</label>
                                <textarea class="form-control" rows="3" name="txtPhantram"></textarea>
                            </div> 
                            <div class="form-group">
                                <label>Thời gian</label>
                                <input class="form-control" name="txtThoigian" placeholder="nhập thời gian" />
                            </div>
							
							<div class="form-group">
                                <label>Trạng Thái</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Hết
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Còn
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