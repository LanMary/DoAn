@extends('master')
@section('content')
<div class="fullwidthbanner-container">

	<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									@foreach($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" 
									data-slotamount="20" 
									class="active-revslide" 
									style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
									<div class="slotholder" 
									style="width:100%;height:100%;" 
									data-duration="undefined" 
									data-zoomstart="undefined" data-zoomend="undefined"
									 data-rotationstart="undefined" data-rotationend="undefined"
									  data-ease="undefined" data-bgpositionend="undefined" 
									  data-bgposition="undefined" data-kenburns="undefined" 
									  data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined"
									   data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" 
													data-lazyload="undefined" 
													data-bgfit="cover"
													 data-bgposition="center center"
													  data-bgrepeat="no-repeat" 
													  data-lazydone="undefined" src="{{URL::to('source/assets/dest/images/product/')}}/{{$sl->image}}" 
													  data-src="{{URL::to('source/assets/dest/images/product/')}}/{{$sl->image}}" 
													  style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{URL::to('source/assets/dest/images/product/')}}/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
								@endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
    </div>
    
	<div class="container-fluid">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản Phẩm Mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm HOT</p>
								<div class="clearfix"></div>
							</div>
							
							<div class="row" >
							
								@foreach($new_product as $new)
								<div class="col-sm-3" style="margin-top:10px;padding:5px;text-align:center">
									
									@if($new->promotion_price!=0)
										<div class="ribbon-wrapper" style="top:3px;right: 10px;" ><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item">
										<div class="single-item-header ">
											<a href="{{route('chitietsanpham',$new->id)}}"><img class="img" src="{{URL::to('source/assets/dest/images/product/')}}/{{$new->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price">
											@if($new->promotion_price!=0)
													<span ><h4 style="color:brown">{{number_format($new->promotion_price)}}  -Vnđ<h4></span>
													<span  ><del>{{number_format($new->unit_price)}}</del></span>
											@else
												
												<span><h4 style="color:brown;padding-bottom:40px">{{number_format($new->unit_price)}}  -Vnđ<h4></span>
												
											@endif		
											</p>
										</div>
										<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
											
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								
								@endforeach
							</div>
							<div style="margin-top:10px;">{{$new_product->links()}}</div>
							
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản Phẩm Khuyến Mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Hiện có {{count($sp_km)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_km as $km)
								
								 <div class="col-sm-3" style="margin-top:10px;padding:5px;text-align:center">
										<div class="ribbon-wrapper" style="top:3px;right: 10px;" ><div class="ribbon sale">Sale</div></div>
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$km->id)}}"><img class="img" src="{{URL::to('source/assets/dest/images/product/')}}/{{$km->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$km->name}}</p>
											<p class="single-item-price">
												<span><del>{{number_format($km->unit_price)}}</del></span>
												<h3 style="color:pink">{{number_format($km->promotion_price)}}  -Vnđ</h3>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$km->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$km->id)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
							<div style="margin-top:10px">{{$sp_km->links()}}</div>

							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div>
@endsection