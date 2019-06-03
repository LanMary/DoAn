<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel-DoAn php </title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{asset('source/assets/dest/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/vendors/colorbox/example3/colorbox.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/rs-plugin/css/settings.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/rs-plugin/css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/css/animate.css')}}">
	<link rel="stylesheet" title="style" href="{{asset('source/assets/dest/css/huong-style.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/css/myStyle.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/styles.css')}}">
</head>
<body>
	<div id="header">
		<div class="header-top">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3">
						<div class="pull-left">
							<a href="{{route('trang-chu')}}" id="logo"><img src="{{asset('source/assets/dest/images/product/logo.png')}}" width="200px" height="40px" alt=""></a>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="pull-left auto-width-left">
							<ul class="top-menu menu-beta l-inline">
								<li><a href=""><i class="fa fa-home"></i> 390 Hoàng Văn Thụ, Phường 4, Quận Tân Bình</a></li>
								<li><a href=""><i class="fa fa-phone"></i> 033 249 0704</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4 p-0">
						<div class="pull-right auto-width-right" >
							<ul class="top-details menu-beta l-inline">
								@if (Route::has('login'))
								<div class="top-right links" >
									@auth
									<a href="{{ url('/home') }}">Home</a>
									@else
									
									<li style="width:150px;text-align:center;font-size:18px"><a href="{{ route('login') }}"><i class="fa fa-user"></i>
									<b>Login</b></a></li>
									
											{{-- @if (Route::has('register'))
												<a href="{{ route('register') }}">Register</a>
												@endif --}}
												@endauth
											</div>
											@endif
											
								{{-- <li><a href="#">Đăng kí</a></li>
								<li><a href="#">Đăng nhập</a></li> --}}
							</ul>
						</div>
					</div>
					
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			
			
			
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-body -->
	<div class="header-bottom" style="background-color: #0277b8;">
		<div class="container">

			<div class="visible-xs clearfix"></div>
			<div class="row">
				<div class="col-sm-7">
					
					<nav class="main-menu">
						<ul class="l-inline ov">
							<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
							<li><a href="{{route('loaisanphamall')}}">Sản phẩm</a>
								<ul style="postion:absolute; z-index:21212" class="sub-menu">
									@foreach($loai_sp as $loai)
									<li ><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
									@endforeach
								</ul>
							</li>
							<li><a href="{{route('about')}}">Giới thiệu</a></li>
							<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
						</ul>
						<div class="clearfix"></div>
					</nav>
				</div>
				<div class="col-sm-5">
					<div class="pull-right beta-components space-left ov">
						<div class="space10">&nbsp;</div>
						<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
								<input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
								<button class="fa fa-search" type="submit" id="searchsubmit"></button>
							</form>
						</div>
						<div class="beta-comp">
							
							<div class="cart">	
								<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
								@if(Session::has('cart'))
								<div class="beta-dropdown cart-body">	
									@foreach($product_cart as $product)
									<div class="cart-item">
										<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}" ><i class="fa fa-times"></i></a>
										<div class="media">
											<a class="pull-left" href="#"><img width=50px height=50px src="{{asset('source/assets/dest/images/product')}}/{{$product['item']['image']}}" alt=""></a>
											<div class="media-body">
												<span class="cart-item-title">Tên sản phẩm:{{$product['item']['name']}}</span>
												
												<span class="cart-item-amount">({{$product['qty']}} sản phẩm)<br><br>
													<span style="color:red; font-size:14px;">
													Giá :@if($product['item']['promotion_price']==0){{number_format($product['item']['unit_price'])}}
												@else {{number_format($product['item']['promotion_price'])}} @endif</span>
												</span>
											</div>
										</div>
									</div>	
									
									@endforeach
									<div class="cart-caption">
										<div class="cart-total text-right">Tổng tiền: <span style="font-size: 16px;font-weight: bold;color: red;" class="cart-total-value">{{number_format(Session('cart')->totalPrice)}}</span></div>
										<div class="clearfix"></div>
										
										<div class="center">
											<div class="space10">&nbsp;</div>
											<a href="{{route('checkout')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
										</div>
									</div>
									
								</div>
							</div> 

							@endif<!-- .cart -->
						</div>
					</div>
				</div>
			</div>
		</div> <!-- .container -->
	</div> <!-- .header-bottom -->
	</div> <!-- #header -->