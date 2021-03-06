@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhà cung cấp
                            <small>{{$nhacungcap->ncc_ten}}</small>
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
                        <form action="admin/nhacungcap/sua/{{$nhacungcap->ncc_ma}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />					        
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtTen" value="{{$nhacungcap->ncc_ten}}" placeholder="nhập tên " />
                            </div>
							 <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="txtDiachi" value="{{$nhacungcap->ncc_diaChi}}" placeholder="nhập địa chỉ" />
                            </div>
							 
                              
							
							<div class="form-group">
                                <label>Điện thoại</label>
                                <input class="form-control" name="txtDienthoai" value="{{$nhacungcap->ncc_dienThoai}}" placeholder="nhập số điện thoại" />
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