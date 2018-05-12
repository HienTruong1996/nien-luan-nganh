@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">CHỉnh sửa nhân viên
                            <small>Chỉnh sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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
                        <form action="admin/nhanvien/sua/{{$nhanvien->nv_ma}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
					        <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtTen" value="{{$nhanvien->nv_ten}}" placeholder="nhập tên" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <label class="radio-inline"  >

                                    <input name="rdoGioitinh" 
                                    
                                    value="1" 
                                    @if($nhanvien->nv_gioiTinh ==1)
                                        {{"checked"}} 
                                    @endif
                                        type="radio">Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoGioitinh" value="2" 
                                    @if($nhanvien->nv_gioiTinh ==2)
                                        {{"checked"}} 
                                    @endif
                                     type="radio">Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="txtEmmail" value="{{$nhanvien->nv_email}}" placeholder="nhập email" />
                            </div>
							<div class="form-group">
                                <label>Ngày sinh</label>
                                <input class="form-control" name="txtNgaysinh" type ="date" value="{{$nhanvien->nv_ngaySinh}}"  placeholder="nhập ngày sinh" />
                            </div>
							
							<div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="txtDiachi" value="{{$nhanvien->nv_diaChi}}" placeholder="nhập địa chỉ" />
                            </div>
                           <div class="form-group">
                                <label>Điện thoại</label>
                                <input class="form-control" name="txtDienthoai" value="{{$nhanvien->nv_dienThoai}}" placeholder="nhập số điện thoại" />
                            </div>
							
							 <div class="form-group"  ng-app="">
                                <label>Trạng thái</label>
                                <label class="radio-inline">
                                    <input name= "rdoTrangThai" value="1"
                                    @if($nhanvien->nv_trangThai == 1)
                                        {{"checked"}}
                                    @endif
                                    type = "radio" >Khóa
                                </label>
                                <label class="radio-inline">
                                    <input name= "rdoTrangThai" value="1"
                                    @if($nhanvien->nv_trangThai == 2)
                                        {{"checked"}}
                                    @endif
                                    type = "radio" >Khả dụng
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