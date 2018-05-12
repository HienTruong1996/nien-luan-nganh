<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">		
		<div class="carousel-inner">
		  
		  <?php $i=0;?>
		  @foreach($slider as $sli)
		  <div
		  	@if($i==0)
		   class="item active"
		   	@else
		   	class="item" 
		   	@endif>
		  	<?php $i++; ?>
		  	@if($sli->sli_loai == 2)
			<a ><img width="1170" src="upload/slider/{{$sli->sli_hinhAnh}}" alt="special offers"/></a>
			@else
			
			 @endif
			<div class="carousel-caption">
				
				  <h4>{{$sli->sli_ten}}</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			
		  </div>
		  @endforeach
		  </div>

		  
		
		 
		</div>

		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
</div>