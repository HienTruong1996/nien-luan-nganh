<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="giohang"><img src="themes/images/ico-cart.png" alt="cart">{{Cart::count()}}Sản Phẩm<span class="badge badge-warning pull-right">{{Cart::total()}}</span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> Chủ Đề [{{count($chude)}}]</a>
				<ul>
					@foreach($chude as $cd)
				<li><a class="active" href="sanphamtheo_chude/{{$cd->cd_ma}}"><i class="icon-chevron-right"></i>{{$cd->cd_ten}} </a></li>
					@endforeach
				</ul>
			</li>
			<li class="subMenu"><a> Loại [{{count($loai)}}] </a>
				<ul style="display:none">
					@foreach($loai as $l)
					<li><a href="sanphamtheo_loai/{{$l->l_ma}}"><i class="icon-chevron-right"></i>{{$l->l_ten}}</a></li>
					@endforeach											
				</ul>
			</li>
			<li class="subMenu"><a>Màu [{{count($mauchudao)}}]</a>
				<ul style="display:none">
				@foreach($mauchudao as $mcd)
					<li><a href="sanphamtheo_mau/{{$mcd->mcd_ma}}"><i class="icon-chevron-right"></i>{{$mcd->mcd_ten}}</a></li>
					@endforeach													
			</ul>
			</li>
		</ul>
		<br/>

		  <div class="sidle">
				<img src="upload/slider/1bMq_a.JPG" title="Liên hệ với tôi" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
			<div class="sidle">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>