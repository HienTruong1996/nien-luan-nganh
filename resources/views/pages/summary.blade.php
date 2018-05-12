@extends('layout.index')
@section('content')

<div id="mainBody">
    <form action="thanhtoan" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            @include('layout.siderbar')
            <!-- Sidebar end=============================================== -->
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

            @if(Cart::count() > 0)

            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="trangchu">Trang Chủ</a> <span class="divider">/</span></li>
                    <li class="active"> Giỏ Hàng</li>
                </ul>
                <h3>  Giỏ Hàng [ <small>{{Cart::count()}} Sản Phẩm </small>]<a href="trangchu" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Tiếp Tục Mua Sắm </a></h3>
                <hr class="soft"/>


                <table class="table table-bordered">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                        <th>Giảm Giá</th>

                        <th>Tổng Cộng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::content() as $items)
                    <tr>

                        <td>{{$items->id}}</td>
                        <td>{{$items->name}}</td>


                        <td>

                            <div class="input-append">

                                <input class="span1" name="quantity" style="max-width:34px" value="{{$items->qty}}" id="appendedInputButtons" size="16" type="text">
                                <button class="btn" type="button"><i  class="icon-minus"></i></button>

                                <button class="btn"  type="button"><i class="icon-plus"></i></button>

                                <a class="btn btn-danger" type="button" href="delete/{{$items->rowId}}"> Delete</a>


                            </div>

                        </td>
                        <td>{{$items->price}} </td>
                        <td>0</td>



                        <td>{{$items->price  * $items->qty}}</td>

                    </tr>
                    @endforeach


                    <tr>
                        <td colspan="5" style="text-align:right">Tổng Tiền:	</td>
                        <td> {{Cart::subtotal()}}</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align:right">Giảm Giá:	</td>
                        <td> 0</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align:right">Thuế:	</td>
                        <td> {{Cart::tax()}}</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align:right"><strong>Tổng Cộng </strong></td>
                        <td class="label label-important" style="display:block"> <strong> {{Cart::total()}} </strong></td>
                    </tr>

                    </tbody>

                </table>





                <table class="table table-bordered">
                    <tr><th>Giao Hàng </th></tr>
                    <tr>
                        <td>
                            <form class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Tên Người Nhận</label>
                                    <div class="controls">
                                        <input type="text" name="txtNguoinhan" placeholder="tên người nhận">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label  class="control-label" > Địa Chỉ</label>
                                    <div class="controls">
                                        <input type="text" name="txtDiachi" placeholder="địa chỉ">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> Điện Thoại</label>
                                    <div class="controls">
                                        <input type="text" name="txtDienthoai" placeholder="số điện thoại">
                                    </div>
                                </div>

                            </form>
                        </td>
                    </tr>
                </table>
                <a href="products.html" class="btn btn-large"><i class="icon-arrow-left"></i> Tiếp Tục Mua Sắm </a>

                   @if(Auth::check())
                        <button class="btn btn-large pull-right" type="submit" >Thanh Toan</button>
                    @endif


            </div>

            @else
                <h2><strong>Bạn Không Có Sản Phẩm Nào Trong Giỏ Hàng!</strong></h2>
                <h6><strong>Vui Lòng Nhấn Vào Bên Dưới Để Chọn Sản Phẩm:</strong></h6>
                <a href="trangchu" class="btn btn-large"><i class="icon-arrow-left"></i>Tiếp Tục Mua Sắm</a>
            @endif
        </div></div>
    </form>
</div>
@endsection('content')