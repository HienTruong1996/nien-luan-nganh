@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">CHỉnh sửa màu chủ đạo
						
                            <small>{{$mauchudao->mcd_ten}}</small>
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
                        <form action="admin/mauchudao/sua/{{$mauchudao->mcd_ma}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtTen" placeholder="nhập tên màu chỉnh sửa" value="{{$mauchudao->mcd_ten}}" />
                    </div>
                    <div class="form-group"  ng-app="">
                                <label>Trạng thái</label>
                                <label class="radio-inline">
                                    <input name= "rdoTrangthai" value="1"
                                    @if($mauchudao->mcd_trangThai == 1)
                                        {{"checked"}}
                                    @endif
                                    type = "radio" >Khóa
                                </label>
                                <label class="radio-inline">
                                    <input name= "rdoTrangthai" value="2"
                                    @if($mauchudao->mcd_trangThai == 2)
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