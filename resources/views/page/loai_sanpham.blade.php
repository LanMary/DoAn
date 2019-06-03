@extends('master')
@section('content')
<div class="inner-header">

		<div class="container">
			<div class="pull-left">
				@foreach($tenhoa as $ten)
				<h6 class="inner-title">Sản phẩm {{$ten->name}}</h6>
				@endforeach
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
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
						@foreach($loai_sp as $loai)
							<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9" style="border:1px solid black">
						<div class="beta-products-list">
								<h4>Sản Phẩm Mới</h4>
							
							<div class="beta-products-details">
								<p class="pull-left">Loại này có {{count($sp_theodk)}} mẫu  </p>	
								<div class="clearfix"></div>
								
							</div>

							<div class="row">
								@foreach($sp_theodk as $sp_dk)
									<div class="col-sm-4">
									@if($sp_dk->promotion_price!=0)
										<div class="ribbon-wrapper" style="top:-5px;right:15px"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item">
											<div class="single-item-header">
												<a href="{{route('chitietsanpham',$sp_dk->id)}}"><img class="img" src="{{asset('source/assets/dest/images/product/')}}/{{$sp_dk->image}}" alt=""></a>
											</div>
											<div class="single-item-body" style="height:100px;text-align:center">
												<p class="single-item-title">{{$sp_dk->name}}</p>
												<p class="single-item-price">
													
												@if($sp_dk->promotion_price==0)
                                <span style="color:brown;margin-bottom:40px;">{{$sp_dk->unit_price}}</span>
                        @else
                                                    
                                <span><del>{{$sp_dk->unit_price}}<br></del></span>
                                <span style="color:brown;text-align:center;">{{$sp_dk->promotion_price}}<span>
                                                    
                                                        
                          @endif
												</p>
											</div>
											<div class="single-item-caption" style="padding-bottom:10px; text-align:center">
												{{-- <a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a> --}}
												<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp_dk->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chitietsanpham',$sp_dk->id)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
						
						<div class="space50">&nbsp;</div>
						<p>{{$sp_theodk->links()}}</p>
						<div class="space50">&nbsp;</div>
						 <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
		</div> <!-- .container -->
		
@endsection