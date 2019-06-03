@extends('master')
@section('content')
<div class="container-fluid">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm theo yêu cầu</p>
								<div class="clearfix"></div>
							</div>
							
							<div class="row" >
							
								@foreach($product as $new)
								<div class="col-sm-3" style="margin-top:10px;padding:5px;text-align:center">
									
									@if($new->promotion_price!=0)
										<div class="ribbon-wrapper" style="top:2px;right: 12px;" ><div class="ribbon sale">Sale</div></div>
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
							{{-- <div style="margin-top:10px;">{{$product->links()}}</div> --}}
							
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							{{-- <h4>Sản Phẩm Khuyến Mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Hiện có {{count($sp_km)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_km as $km)
					 			<div class="col-sm-3" style="margin-top:10px;padding:5px;text-align:center">
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
								
							</div> --}}
							{{-- <div style="margin-top:10px">{{$sp_km->links()}}</div> --}}
                            {{-- <div style="margin-top:10px">{{$product->links()}}</div> --}}
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection