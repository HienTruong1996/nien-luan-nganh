<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="trangchu"><img src="upload/panner/abc.JPG" alt="Bootsshop" width="50" height="70" /></a>
		<form class="form-inline navbar-search" method="post" action="products.html" >
		<input id="srchFld" class="srchTxt" type="text" />
		 
		  <select class="srchTxt">
		  	@foreach($chude as $cd)
			<option>{{$cd->cd_ten}}</option>
			@endforeach() 
		</select>
		
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="giohang">Giỏ Hàng</a></li>
	 <li class=""><a href="dieukhoan">Chính Sách và Điều Khoản</a></li>
	 <li class=""><a href="lienhe">Liên hệ</a></li>
	 <li class="">
	 <a @if(Auth::check())
		href="dangxuat"><span class="btn btn-large btn-success">Đăng Xuất</span></a>
		@else
		href="dangnhap" ><span class="btn btn-large btn-success">Đăng nhập</span></a>
		 @endif
	</li>
    </ul>
  </div>
</div>
</div>
</div>