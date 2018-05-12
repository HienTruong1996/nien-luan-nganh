
@extends('layout.index')

@section('content')
    <div id="mainBody">
        <div class="container">
            <div class="row">
                <!-- Sidebar ================================================== -->
            @include('layout.siderbar')
            <!-- Sidebar end=============================================== -->
                <div class="span9">
                    <ul class="breadcrumb">
                        <li><a href="trangchu">Home</a> <span class="divider">/</span></li>
                        <li class="active">{{$tenmau->mcd_ten}}</li>
                    </ul>
                    <h3> Sản Phẩm <small class="pull-right"> {{count($sanphamtheomau)}} Sản Phẩm</small></h3>


                    <hr class="soft"/>


                    <div id="myTab" class="pull-right">
                        <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
                        <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
                    </div>
                    <br class="clr"/>
                    <div class="tab-content">
                        <div class="tab-pane" id="listView">
                            @foreach($sanphamtheomau as $sp)
                                <div class="row">
                                    <div class="span2">
                                        <img src="upload/sanpham/{{$sp->sp_hinhAnh}}" alt=""/>
                                    </div>
                                    <div class="span4">
                                        <h3>Cùng Loại</h3>
                                        <hr class="soft"/>
                                        <h5>{{$sp->sp_ten}} </h5>
                                        <p>
                                            {!! $sp->sp_moTa !!}
                                        </p>
                                        <a class="btn btn-small pull-right" href="chitiet/{{$sp->sp_ma}}">View Details</a>
                                        <br class="clr"/>
                                    </div>
                                    <div class="span3 alignR">
                                        <form class="form-horizontal qtyFrm">
                                            <h3>{{$sp->sp_giaBan}}</h3>


                                            <a href="chitiet/{{$sp->sp_ma}}" class="btn btn-large btn-primary">Thêm Vào<i class=" icon-shopping-cart"></i></a>
                                            <a href="chitiet/{{$sp->sp_ma}}" class="btn btn-large"><i class="icon-zoom-in"></i></a>

                                        </form>
                                    </div>
                                </div>
                            @endforeach

                            <hr class="soft"/>

                        </div>

                        <div class="tab-pane  active" id="blockView">
                            <ul class="thumbnails">
                                @foreach($sanphamtheomau as $sp)
                                    <li class="span3">
                                        <div class="thumbnail" >

                                            <a href="chitiet/{{$sp->sp_ma}}"><img src="upload/sanpham/{{$sp->sp_hinhAnh}}" alt=""/></a>

                                            <div class="caption">
                                                <h5>{{$sp->sp_ten}}</h5>
                                                <p>
                                                    Nhấn  để xem chi tiết
                                                </p>
                                                <h4 style="text-align:center"><a class="btn" href="chitiet/{{$sp->sp_ma}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;{{$sp->sp_giaBan}}</a></h4>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <hr class="soft"/>
                        </div>
                    </div>
                    <div class="pagination">
                        {{ $sanphamtheomau->appends(['sort' => 'votes'])->links() }}
                    </div>



                    <br class="clr"/>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
