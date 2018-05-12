@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài khoản
                            <small>Thêm cho nhân viên <p class="alert alert-success"> {{$nhanvien->nv_ten}} </p> </small>
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
                        <form action="admin/nhanvien/themtaikhoan/{{$nhanvien->nv_ma}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                             
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtTen" value="{{$nhanvien->nv_ten}}" placeholder="nhập tên" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="txtEmmail" value="{{$nhanvien->nv_email}}" placeholder="nhập email" />
                            </div>


							
							
                           <div class="form-group">
                                <label>mật khẩu</label>
                                <input class="form-control" name="txtPass" placeholder="nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <select class="form-control" name = "rdoQ">
                                    @foreach($quyen as $q)
                                    <option 
                                    value="{{$q->q_ma}}">{{$q->q_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mã nhân viên</label>
                                <input class="form-control"  name="txtnvma" value="{{$nhanvien->nv_ma}}"/>
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