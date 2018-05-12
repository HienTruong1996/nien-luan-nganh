
@extends('layout.index')
@section('content')

<div id="mainBody">
	<div class="container">
	<div class="row">
	@include('layout.siderbar')
	<input type="hidden" name="_token" value="{{csrf_token()}}" />
<!-- Sidebar end=============================================== -->
	<div class="span9">
	<div class="row">
		<form action="cart"  method="POST" >
			<div id="gallery" class="span3">
            <a href="upload/sanpham/{{$sanpham->sp_hinhAnh}}" title="{{$sanpham->sp_ten}}">
				<img src="upload/sanpham/{{$sanpham->sp_hinhAnh}}" style="width:100%" alt="{{$sanpham->sp_ten}}"/>
            </a>	  
			 <div class="btn-toolbar">
			  <div class="btn-group">
				
			  </div>
			</div>
			</div>
			<div class="span6">
				<h3>{{$sanpham->sp_ten}} </h3>
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
				  	
					<label class="control-label" ><strong><span>${{$sanpham->sp_giaBan}}</strong></span></label>
					<div class="controls">
					<input type="number" class="span2" placeholder="Số Lượng"/>
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<input type="hidden" name="id" value="{{$sanpham->sp_ma}}" />
						<input type="hidden" name="name" value="{{$sanpham->sp_ten}}" />
						<input type="hidden" name="price" value="{{$sanpham->sp_giaBan}}" />
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Thêm Vào Giỏ <i class=" icon-shopping-cart"></i></button>
					</div>
				  </div>
				</form>
					
				<hr class="soft"/>
			
				<p>
						
				{!! $sanpham->sp_moTa !!}
			
				</p>

				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Thông Tin Thêm</a></li>
              <li><a href="#profile" data-toggle="tab">Sản phẩm cùng loại</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
			  <h4>Thông tin sản phẩm</h4>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Chi tiết sản phẩm</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Tên: </td><td class="techSpecTD2">{{$sanpham->sp_ten}}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Nhà Cung Cấp:</td><td class="techSpecTD2">FinePix S2950HD</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Chủ đề:</td><td class="techSpecTD2"> {{$sanpham->cd_ma}}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Loại:</td><td class="techSpecTD2"> {{$sanpham->l_ma}}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Màu</td><td class="techSpecTD2">{{$sanpham->mcd_ma}}</td></tr>
				</tbody>
				</table>
              </div>
		<div class="tab-pane fade" id="profile">
		<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 
		</div>
		<br class="clr"/>
		<hr class="soft"/>
		<div class="tab-content">
			<div class="tab-pane active" id="listView">
				@foreach($chude3 as $cd2)
				<div class="row">	  
					<div class="span2">
						<img src="upload/sanpham/{{$cd2->sp_hinhAnh}}" alt=""/>
					</div>

					<div class="span4">
						<h3>Sản Phẩm Cùng Loại</h3>
						<hr class="soft"/>
						<h5>{{$cd2->sp_ten}}</h5>
						<p>
						{{ $cd2->sp_moTa }}
						</p>
						<a class="btn btn-small pull-right" href="chitiet/{{$cd2->sp_ma}}">Xem Chi Tiết</a>
						<br class="clr"/>
					</div>
					<div class="span3 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> ${{$cd2->sp_giaBan}}</h3>
					<div class="btn-group">
					  <a href="product_details.html" class="btn btn-large btn-primary"> Thêm vào <i class=" icon-shopping-cart"></i></a>
					  <a href="chitiet/{{$cd2->sp_ma}}" class="btn btn-large"><i class="icon-zoom-in"></i></a>
					 </div>
						</form>
					</div>
			</div>
			@endforeach
			<hr class="soft"/>
			
		</div>
			
			
		</div>
				<br class="clr">
					 </div>
		</div>
          </div>

	</div>
</div>
</div> </div>
</div>
@endsection('content')

