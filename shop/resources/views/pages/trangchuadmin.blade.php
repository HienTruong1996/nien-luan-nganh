
@extends('layout.index')

@section('content')

<div id="mainBody">

	<div class="container">
	<div class="row">
		
<!-- Sidebar ================================================== -->

@include('layout.siderbar')

<!-- Sidebar end=============================================== -->
		<div class="span9">		
			<div class="well well-small">
			<h4>Sản Phẩm Mới Nhất <small class="pull-right">{{count($sanpham)}}</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
				<div class="item active">
			  <ul class="thumbnails">
			  	@foreach($sanpham->sortByDesc('sp_ma')->take(4) as $sp)
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="chitiet/{{$sp->sp_ma}}"><img src="upload/sanpham/{{$sp->sp_hinhAnh}}" alt=""></a>
					<div class="caption">
					  <h5>{{$sp->sp_ten}}</h5>
						<form action="cart"  method="POST" >
					  <h4><a class="btn" href="chitiet/{{$sp->sp_ma}}">VIEW</a> <span class="pull-right">${{$sp->sp_giaBan}}</span></h4>
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<input type="hidden" name="id" value="{{$sp->sp_ma}}" />
						<input type="hidden" name="name" value="{{$sp->sp_ten}}" />
						<input type="hidden" name="price" value="{{$sp->sp_giaBan}}" />
						<button class="btn"  type="submit" class="icon-shopping-cart">Thêm Vào</button>
					</div>
				  </div>
				</li>
				@endforeach()			
			  </ul>
			  </div>
			   <div class="item">
			  <ul class="thumbnails">

			  	@foreach($sanpham->sortByDesc('sp_ma')->take(8) as $key=>$sp)
			  		@if($key<count($sanpham)-4)
				<li class="span3">
				  <div class="thumbnail">
				  	<i class="tag"></i>
					<a href="chitiet/{{$sp->sp_ma}}"><img src="upload/sanpham/{{$sp->sp_hinhAnh}}" alt=""></a>
					<div class="caption">
					  <h5>{{$sp->sp_ten}}</h5>
						<form action="cart"  method="POST" >
					  <h4><a class="btn" href="chitiet/{{$sp->sp_ma}}">VIEW</a> <span class="pull-right">${{$sp->sp_giaBan}}</span></h4>
							<input type="hidden" name="_token" value="{{csrf_token()}}" />
							<input type="hidden" name="id" value="{{$sp->sp_ma}}" />
							<input type="hidden" name="name" value="{{$sp->sp_ten}}" />
							<input type="hidden" name="price" value="{{$sp->sp_giaBan}}" />
							<button class="btn"  type="submit" class="icon-shopping-cart">Thêm Vào</button>
					</div>
				  </div>
				</li>
					@endif()
					@endforeach()
			  </ul>
			  </div>
			   <div class="item">
			  <ul class="thumbnails">
			  	@foreach($sanpham->sortByDesc('sp_ma')->take(12) as $key=>$sp)
			  		@if($key<count($sanpham)-8)
				<li class="span3">
				  <div class="thumbnail">
					<a href="chitiet/{{$sp->sp_ma}}"><img src="upload/sanpham/{{$sp->sp_hinhAnh}}" alt=""></a>
					<div class="caption">
					  <h5>{{$sp->sp_ten}}</h5>
					  <h4><a class="btn" href="chitiet/{{$sp->sp_ma}}">VIEW</a> <span class="pull-right">${{$sp->sp_giaBan}}</span></h4>

					</div>
				  </div>
				</li>
				@endif
				@endforeach()
			  </ul>
			  </div>
			 
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>
		<h4>Sản phẩm bán chạy nhất </h4>
			  <ul class="thumbnails">
				@foreach($sanpham->sortByDesc('sp_ma')->take(12) as $sp)
				<li class="span3">
				  <div class="thumbnail">
					<a  href="chitiet/{{$sp->sp_ma}}"><img src="upload/sanpham/{{$sp->sp_hinhAnh}}" alt="" style="width:500px;height:320px;" /></a>
					<div class="caption">
					  <h5>{{$sp->sp_ten}}</h5>
						<form action="cart"  method="POST" >

					  <h4 style="text-align:center"><a class="btn" href="chitiet/{{$sp->sp_ma}}"> <i class="icon-zoom-in"></i></a>
						  <input type="hidden" name="_token" value="{{csrf_token()}}" />


						  <input type="hidden" name="_token" value="{{csrf_token()}}" />
						  <input type="hidden" name="id" value="{{$sp->sp_ma}}" />
						  <input type="hidden" name="name" value="{{$sp->sp_ten}}" />
						  <input type="hidden" name="price" value="{{$sp->sp_giaBan}}" />
						  <button class="btn"  type="submit" class="icon-shopping-cart">Thêm Vào</button>
						  <a class="btn btn-primary" >${{$sp->sp_giaBan}}</a>

					  </h4>
						</form>
					</div>
				  </div>
				</li>
				@endforeach()
				
			  </ul>	

		</div>
		</div>
	</div>
</div>
@endsection('content')