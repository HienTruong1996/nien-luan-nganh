@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khuyến mãi
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
                    <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="txtTen" placeholder="nhập tên sản phẩm" />
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input type="file" class="form-control" name="fHinh">
                        </div>
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea class="form-control ckeditor" rows="3" name="txtmoTa">

                                </textarea>
                        </div>
                        <div class="form-group">
                            <label>Giá Gốc</label>
                            <input class="form-control" name="txtgiaGoc" placeholder="nhập vào giá gốc" />
                        </div>
                        <div class="form-group">
                            <label>Giá Bán</label>
                            <input class="form-control" name="txtgiaBan" placeholder="nhập vào giá bán" />
                        </div>
                        <div class="form-group">
                            <label>Trạng Thái</label>
                            <label class="radio-inline">
                                <input name="rdoTrangThai" value="1" checked="" type="radio">Khóa
                            </label>
                            <label class="radio-inline">
                                <input name="rdoTrangThai" value="2" type="radio">Khả dụng
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Chủ Đề</label>
                            <select class="form-control" name = "cbCD">
                                @foreach($chude as $cd)
                                    <option
                                            value="{{$cd->cd_ma}}">{{$cd->cd_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại</label>
                            <select class="form-control" name = "cbL">
                                @foreach($loai as $l)
                                    <option
                                            value="{{$l->l_ma}}">{{$l->l_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Màu</label>
                            <select class="form-control" name = "cbMCD">
                                @foreach($mauchudao as $mcd)
                                    <option
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