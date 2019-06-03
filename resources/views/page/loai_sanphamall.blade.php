@extends('master')
@section('content')
<div class="inner-header">

		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <a href="">Sản phẩm</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3" >
						<ul class="aside-menu" >
						@foreach($loai_sp as $loai)
							<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
						@endforeach
						</ul>
					</div>
					<div class="col-sm-9" style="border:1px solid black">
						<div class="beta-products-list">
							@if($loai->id!=0)
								<h4>Tất Cả Sản Phẩm</h4>
							@else
								<h4>{{$sp_all->id_type}}</h4>
							@endif
							<div class="beta-products-details">
								<p class="pull-left">Tất cả có {{count($sp_all)}} mẫu  </p>	
								<div class="clearfix"></div>
								
							</div>

							<div class="row">
								@foreach($sp_all as $allsp)
									<div class="col-sm-4">
                                    @if($allsp->promotion_price!=0)
										<div class="ribbon-wrapper" style="top:-8px;right:8px"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item">
											<div class="single-item-header ">
												<a href="{{route('chitietsanpham',$allsp->id)}}"><img  class="img" src="{{asset("source/assets/dest/images/product/$allsp->image")}}" alt=""></a>
											</div>
											<div class="single-item-body" style="height:100px;text-align:center">
												<p class="single-item-title">{{$allsp->name}}</p>
												<span class="single-item-price">
                                                    @if($allsp->promotion_price==0)
                                                        <span style="color:brown;margin-bottom:40px;">{{$allsp->unit_price}}</span>
                                                    @else
                                                    
                                                        <span><del>{{$allsp->unit_price}}<br></del></span>
                                                        <span style="color:brown;text-align:center;">{{$allsp->promotion_price}}<span>
                                                    
                                                        
                                                    @endif
                                                </span>
											</div>
											<div class="single-item-caption" style="padding-bottom:10px; text-align:center">
													<a class="add-to-cart pull-left" href="{{route('themgiohang',$allsp->id)}}"><i class="fa fa-shopping-cart"></i></a>
													<a class="beta-btn primary" href="{{route('chitietsanpham',$allsp->id)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
						<p>{{$new_product->links()}}</p>
						<div class="space50">&nbsp;</div>
						 <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
    </div> <!-- .container -->
@endsection