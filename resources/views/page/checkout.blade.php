@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">

        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đặt Hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container-fuild">
    <div id="content" class="space-top-none">

        <div class="space50">&nbsp;</div>
       
        <div class="row">
            <div class="col-sm-1 "></div>
            <div class="col-sm-5 " style="padding-left:50px">
                <div style="background-color:#0277b8" class="your-order-head">
                    <h5>Đặt hàng</h5>
                </div>
                <div class="space20">&nbsp;</div>
                <p>Phí vận chuyển cho bất kì loại sản phẩm nào được mua từ shop đều được free được áp dụng cho tất cả
                    mặt hàng .</p>
                <div class="space20">&nbsp;</div>
                <form action="#" method="post" class="contact-form">
                    <div class="form-block">
                        <input name="ten" type="text" placeholder="Tên người nhận">
                    </div>
                    <div class="form-block">
                        <input name="email" type="email" placeholder="Email liên hệ">
                    </div>
                    <div class="form-block">
                        <input name="sdt" type="text" placeholder="Số điện thoại">
                    </div>
                    <div class="form-block">
                        <input name="diachi" type="text" placeholder="Địa chỉ người nhận">
                    </div>
                    <div class="form-block">
                        <textarea name="note" placeholder="Ghi Chú hoặc lời thiệp"></textarea>
                    </div>
                    <div class="form-block">
                       <label ><b>Hình thức thanh toán </b></label>
                        
                    </div>
                    <input type="radio" name="thanhtoan" style="width:5%;margin-bottom:10px">Thanh toán khi nhận hàng
                    <input type="radio" name="thanhtoan" style="width:5%;margin-bottom:10px">Thanh toán online
                    <input type="radio" name="thanhtoan" style="width:5%;margin-bottom:10px">Thanh toán trực tiếp tại shop
                     
                    <div class="form-block" style="margin-top:10px">
                        <button type="button" class="beta-btn primary">Xác nhận<i
                                class="fa fa-chevron-right"></i></button>
                    </div>
                </form>
            </div> 
            <div style="margin-right:0px" class="col-sm-4">
                    <div class="your-order">
                        <div style="background-color:#0277b8" class="your-order-head">
                            <h5>Đơn hàng của bạn</h5>
                        </div>
                        <div
                            class="your-order-body"
                            style="padding: 0px 10px"
                        >
                            <div class="your-order-item">
                                <div>
                                        @if(Session::has('cart'))
                                        @foreach($product_cart as $cart)
                                    <!--  one item	 -->
                                    <div style="border:1px solid gray; padding:5px" class="media">
                                        <img
                                            width="25%" 
                                            src="source/assets/dest/images/product/{{$cart['item']['image']}}"
                                            alt=""
                                            class="pull-left"
                                        />
                                        <div style="padding-top:30px;padding-left:30px" class="media-body">
                                            <span class=" color-gray font-large">
                                                Tên sản phẩm: <span style="font-weight:bold; font-size:20px;padding-left:10px">{{$cart['item']['name']}}</span>
                                            </span>
                                            <span 
                                                class="color-gray your-order-info"
                                                ></span
                                            >
                                            <span
                                                class="color-gray your-order-info"
                                                >Số lượng: <span style="font-weight:bold; font-size:20px;padding-left:50px">{{$cart['qty']}}</span>
                                            </span
                                            >
                                            <span
                                                class="color-gray your-order-info"
                                                >Đơn giá: <span style="font-weight:bold; font-size:20px;padding-left:60px">{{number_format($cart['item']['unit_price'])}}</span>
                                            </span
                                            >
                                        </div>
                                    </div>
                                    <!-- end one item -->
                                    @endforeach
                                     @endif
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left">
                                    <p class="your-order-f18">
                                        Tổng tiền:
                                    </p>
                                </div>
                                <div class="pull-right">
                                    <h5 class="color-red">{{number_format($totalPrice)}}</h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>  
                    </div>
                    <!-- .your-order -->
                </div>
            
        </div> <!-- #content -->  
    </div> <!-- .container -->
    @endsection