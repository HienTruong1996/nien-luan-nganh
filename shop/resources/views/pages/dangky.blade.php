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
                                <form action="register.html">
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail0">E-mail address</label>
                                        <div class="controls">
                                            <input class="span3"  type="text" id="inputEmail0" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="controls">
                                        <button type="submit" class="btn block">Create Your Account</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="span1"> &nbsp;</div>
                        <div class="span4">

                        </div>
                    </div>

                </div>
            </div></div>
    </div>
@endsection('content')