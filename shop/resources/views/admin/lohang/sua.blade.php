@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lô hàng
                            <small>Chỉnh sửa</small>
                        </h1>
                    </div>
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
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/lohang/sua/{{$lohang->lh_ma}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                           <div class="form-group">
                                <label>Giá mua vào</label>
                                <input class="form-control" name="txtGiamuavao" value="{{$lohang->lh_giaMuaVao}}" placeholder="nhập giá mua vào" />
                            </div>
							<div class="form-group">
                                <label>Giá bán ra</label>
                                <input class="form-control" name="txtGiabanra" value="{{$lohang->lh_giaBanRa}}" placeholder="nhập giá bán ra" />
                            </div>
                            
							<div class="form-group">
                                <label>Số lượng nhập</label>
                                <input class="form-control" name="txtSoluongnhap" value="{{$lohang->lh_soLuongNhap}}" placeholder="nhập số lượng nhập vào" />
                            </div>
							<div class="form-group">
                                <label>Số lượng đã bán</label>
                                <input class="form-control" name="txtSoluongdaban" value="{{$lohang->lh_soLuongDaBan}}" placeholder="nhập số lượng đã bán vào" />
                            </div>
                                
                            
                          
							<div class="form-group">
                                <label>Trạng Thái</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Đã nhập kho
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Khởi tạo
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Nhà Cung Cấp</label>
                                <select class="form-control" name = "cbL">
                                    @foreach($nhacungcap as $ncc)
                                        <option
                                                @if($lohang->ncc_ma == $ncc->ncc_ma)
                                                {{"selected"}}
                                                @endif
                                                value="{{$ncc->ncc_ma}}">{{$ncc->ncc_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sản Phẩm</label>
                                <select class="form-control" name = "spx">
                                    @foreach($sanpham as $sp)
                                        <option
                                                @if($lohang->sp_ma == $sp->sp_ma)
                                                {{"selected"}}
                                                @endif
                                                value="{{$sp->sp_ma}}">{{$sp->sp_ten}}</option>
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