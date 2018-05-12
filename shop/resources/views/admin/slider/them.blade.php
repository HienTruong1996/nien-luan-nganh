@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slider
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
                        <form action="admin/slider/them" method="POST" enctype="multipart/form-data">
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
                                <textarea class="form-control ckeditor.js" rows="3" name="txtmoTa">
                                    
                                </textarea>
                            </div> 
                            <div class="form-group">
                                <label>Trạng Thái</label>
                                <label class="radio-inline">
                                    <input name="rdoTrangthai" value="1" checked="" type="radio">Dọc
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoTrangthai" value="2" type="radio">Ngang
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