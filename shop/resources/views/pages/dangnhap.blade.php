@extends('layout.index')
@section('content')
<div id="mainBody">
    <div class="container">
        <div class="row">
            @include('layout.siderbar')
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li class="active">Login</li>
                </ul>
                <h3> Login</h3>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}} <br>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-danger">
                        {{session('thongbao')}}
                    </div>
                @endif
                <hr class="soft"/>

                <div class="row">
                    <div class="span4">
                        <div class="well">
                            <h5>Tạo tài khoản</h5><br/>
                            Nhập vào tài khoản.<br/><br/><br/>
                            <form action="dangky" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="control-group">
                                    <label class="control-label">E-mail address</label>
                                    <div class="controls">
                                        <input class="span3"  type="text" name="txtEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Mật Khẩu</label>
                                    <div class="controls">
                                        <input class="span3"  type="text" name="txtMatkhau" placeholder="Email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Tên</label>
                                    <div class="controls">
                                        <input class="span3"  type="text" name="txtTen" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <label class="radio-inline">
                                        <input name="rdoGioitinh" value="1" checked="" type="radio">Nam
                                    </label>
                                    <label class="radio-inline">
                                        <input name="rdoGioitinh" value="2" type="radio">Nữ
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input class="form-control" name="txtNgaysinh" type = "date" placeholder="nhập ngày sinh" />
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Địa Chỉ</label>
                                    <div class="controls">
                                        <input class="span3"  type="text" name="txtDiachi" placeholder="Email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Điện Thoai</label>
                                    <div class="controls">
                                        <input class="span3"  type="text" name="txtDienthoai" placeholder="Email">
                                    </div>
                                </div>
                                <div class="controls">
                                    <button type="submit" class="btn block">Tạo Tài Khoảng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="span1"> &nbsp;</div>
                    @if(Auth::check())

                        @else
                    <div class="span4">
                        <div class="well">

                            <h5>Đã Có Tài Khoản</h5>
                            <form action="dangnhap" method="POST">
                                <div class="control-group"  >
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <label class="control-label" for="inputEmail1">Email</label>
                                    <div class="controls">
                                        <input class="span3"  type="text" name="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword1">Password</label>
                                    <div class="controls">
                                        <input type="password" class="span3"  name="inputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Đăng Nhập</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @endif
                </div>

            </div>
        </div></div>
</div>
@endsection('content')