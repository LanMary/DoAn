@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm: {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <a href="{{route('loaisanphamall')}}">Sản phẩm</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
								@if($sanpham->promotion_price!=0)
								<div class="ribbon-wrapper" style="right: 16px;" ><div class="ribbon sale">Sale</div></div>
							@endif
							<img class="img" src="{{asset('source/assets/dest/images/product/')}}/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"></p>
								<p class="single-item-price">
								 @if($sanpham->promotion_price!=0)
													<span ><h4 style="color:brown">{{number_format($sanpham->promotion_price)}}  -Vnđ<h4></span>
													<span  ><del>{{number_format($sanpham->unit_price)}}</del></span>
											@else
												
												<span><h4 style="color:brown;padding-bottom:40px">{{number_format($sanpham->unit_price)}}  -Vnđ<h4></span>
												
											@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>
								<a class="add-to-cart pull-left" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<div style="color:red; font-size:20px;font-weight:bold;">{{$sanpham->name}}</div>
							<div style=" font-size:14px;">{{$sanpham->description}}</div>
							{{-- <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
							<p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p> --}}
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
							@foreach($sp_tuongtu as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
										@if($sptt->promotion_price!=0)
										<div class="ribbon-wrapper" style="right: 1px;" ><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sptt->id)}}"><img class="img" src="{{asset('source/assets/dest/images/product/')}}/{{$sptt->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										
										
											<a href="{{route('chitietsanpham',$sptt->id)}}">

										<p class="single-item-title"><a href="{{route('chitietsanpham',$sptt->id)}}">{{$sptt->name}}</a></p>
										<p class="single-item-price">
												@if($sptt->promotion_price!=0)
												<span ><h4 style="color:brown">{{number_format($sptt->promotion_price)}}  -Vnđ<h4></span>
												<span  ><del>{{number_format($sptt->unit_price)}}</del></span>
										@else
											
											<span><h4 style="color:brown;padding-bottom:40px">{{number_format($sptt->unit_price)}}  -Vnđ<h4></span>
											</a>
										@endif	
										</p>
									</div>
									<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>

										{{-- <a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a> --}}
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				{{-- <div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							
							</div>
						</div>
					</div> <!-- best sellers widget -->
					{{-- <div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								
							</div>
						</div>
					</div> <!-- best sellers widget --> --}}
				</div>
			</div>
		</div> <!-- #content -->
    </div> <!-- .container -->
@endsection