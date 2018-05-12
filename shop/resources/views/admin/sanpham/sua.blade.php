@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
                            <small>{{$sanpham->sp_ten}}</small>
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
                        <form action="admin/sanpham/sua/{{$sanpham->sp_ma}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtTen" value="{{$sanpham->sp_ten}}" placeholder="nhập tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <p>
                                <img width="50" height="50" src="upload/sanpham/{{$sanpham->sp_hinhAnh}}">
                                </p>
                                <input type="file" name = "fHinh" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Mô Tả</label>
                                <textarea class="form-control ckeditor" rows="3" name="txtmoTa"  >{{$sanpham->sp_moTa}}</textarea>
                            </div> 
                            <div class="form-group">
                                <label>Giá Gốc</label>
                                <input class="form-control" name="txtgiaGoc" value="{{$sanpham->sp_giaGoc}}" placeholder="nhập vào giá gốc" />
                            </div>
                            <div class="form-group">
                                <label>Giá Bán</label>
                                <input class="form-control" name="txtgiaBan" value="{{$sanpham->sp_giaBan}}" placeholder="nhập vào giá bán" />
                            </div>
                            <div class="form-group">
                                <label>Trạng Thái</label>
                                <label class="radio-inline">
                                    <input name="rdoTrangThai" value="1" 
                                    @if($sanpham->sp_trangThai == 1)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Khóa
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoTrangThai" value="2" 
                                    @if($sanpham->sp_trangThai == 2)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Khả dụng
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Chủ Đề</label>
                                <select class="form-control" name = "cbCD">
                                    @foreach($chude as $cd)
                                    <option 
                                    @if($sanpham->cd_ma == $cd->cd_ma)
                                        {{"selected"}}
                                    @endif
                                    value="{{$cd->cd_ma}}">{{$cd->cd_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <select class="form-control" name = "cbL">
                                    @foreach($loai as $l)
                                    <option
                                    @if($sanpham->l_ma == $l->l_ma)
                                        {{"selected"}}
                                    @endif 
                                    value="{{$l->l_ma}}">{{$l->l_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Màu</label>
                                <select class="form-control" name = "cbMCD">
                                    @foreach($mauchudao as $mcd)
                                    <option
                                    @if($sanpham->mcd_ma == $mcd->mcd_ma)
                                        {{"selected"}}
                                    @endif 
                                    value="{{$mcd->mcd_ma}}">{{$mcd->mcd_ten}}</option>
                                    @endforeach
                                </select>
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