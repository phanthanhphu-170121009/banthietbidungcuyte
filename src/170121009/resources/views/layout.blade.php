<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>170121009 | Shop bán hàng vật tư, trang thiết bị y tế</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{('public/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
	<?php
		//echo Session::get('customers_id'); 
		//echo Session::get('shippings_id'); 
	?>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#" style="font-weight:bold;"><i class="fa fa-phone"></i> 0939456258</a></li>
								<li><a href="#" style="font-weight:bold;"><i class="fa fa-envelope"></i> 170121009@rdi.edu.vn</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							{{-- <ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul> --}}
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							{{-- <a href="index.html"><img src="{{('public/frontend/images/logo.png')}}" alt="" /></a> --}}
							{{-- <p style="color: blue;font-size:14pt;">Cửa hàng 170121009</p> --}}
						</div>
						{{-- <div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div> --}}
					</div>
					<div class="col-sm-8" >
						<div class="shop-menu pull-right" >
							<ul class="nav navbar-nav" >
								<?php 
									$customer_id=Session::get('customers_id');
									$customers_name=Session::get('customers_name');
									//echo '11111'.$customer_id;
									if($customer_id!=NULL){
								?>
								<li ><a href="" style="font-weight:bold;"><i class="fa fa-user"></i> Xin chào <?php echo $customers_name;?>, Chúc 1 ngày vui vẻ! </a></li>
								
								
								<?php } ?>
								
								{{-- <li><a href="#"  style="font-weight:bold;"><i class="fa fa-star"></i> Yêu thích</a></li> --}}
								<?php 
									$customer_id=Session::get('customers_id');
									//echo '11111'.$customer_id;
									if($customer_id!=NULL){
								?>
								<li><a href="{{URL::to('/checkout')}}" style="font-weight:bold;"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								
								<?php }else{ ?>
									<li><a href="{{URL::to('/logout-checkout')}}" style="font-weight:bold;"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php } ?>
								
								
								<?php 
									$customer_id=Session::get('customers_id');
									if($customer_id!=NULL){
								?>
								<li><a href="{{URL::to('/logout-checkout')}}" style="font-weight:bold;"><i class="fa fa-lock"></i> Đăng xuất</a></li>
								
								<?php }else{ ?>
									<li><a href="{{URL::to('/login-checkout')}}" style="font-weight:bold;"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active" style="font-weight:bold;">Trang chủ</a></li>
								<li class="dropdown"><a href="#" style="font-weight:bold;">Danh mục Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        {{-- <li><a href="shop.html" style="font-weight:bold;">Products</a></li> --}}
										@foreach($category_product as $key => $cate_pro)	
											<li><a href="{{URL::to('/danh-muc-san-pham/'.$cate_pro->category_id)}}" style="font-weight:bold;">{{$cate_pro->category_name}}</a></li>	
										@endforeach
										
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#" style="font-weight:bold;">Thương hiệu<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        {{-- <li><a href="shop.html" style="font-weight:bold;">Products</a></li> --}}
										@foreach($brand_product as $key => $brand_pro)	
											<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand_pro->brand_id)}}" style="font-weight:bold;">{{$brand_pro->brand_name}}</a></li>	
										@endforeach
										
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#" style="font-weight:bold;">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        {{-- <li><a href="shop.html" style="font-weight:bold;">Products</a></li> --}}
										@foreach($all_cate_post as $key => $brand_pro)	
											<li><a href="{{URL::to('/danh-muc-bai-viet/'.$brand_pro->cate_post_slug)}}" style="font-weight:bold;">{{$brand_pro->cate_post_name}}</a></li>	
										@endforeach
										
                                    </ul>
                                </li>
								{{-- <li class="dropdown">
									<a href="#" style="font-weight:bold;">Tin tức<i class="fa fa-angle-down"></i></a>
                                    
                                </li>  --}}
								{{-- <?php 
									$customer_id=Session::get('customers_id');
									//echo '11111'.$customer_id;
									if($customer_id!=NULL){
								?>
								<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								
								<?php }else{ ?>
									<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php } ?> --}}
								<li><a href="{{URL::to('/lien-he')}}" style="font-weight:bold;">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="search_box pull-right">
							
							<form action="{{URL::to('/tim-kiem')}}" method="post">
								{{ csrf_field() }}
								<input type="text" name="keywords_submit" placeholder="Tìm kiếm"/>
								<input type="submit" name="search_item" class="btn btn-primary btn-sm" value="Tìm kiếm" style="margin-top: 0px;color:black;width:80px;"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							@php
								$i=0;
							@endphp
							@foreach($all_slider as $key => $cate_pro)	
							@php
								$i++;
							@endphp
							<div class="item {{$i==1 ? 'active' : ''}}">
								{{-- <div class="col-sm-6">
									{{($cate_pro->slider_desc)}}
								</div> --}}
								<div class="col-sm-12">
									<img src="public/uploads/slider/{{$cate_pro->slider_image}}" class="img img-responsive" alt="{{$cate_pro->slider_desc}}" width="100%"  />
									
									
								</div>
							</div>
							@endforeach
							
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" ><!--category-productsr-->
							@foreach($category_product as $key => $cate_pro)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="{{URL::to('/danh-muc-san-pham/'.$cate_pro->category_id)}}">
											{{$cate_pro->category_name}}
										</a>
									</h4>
								</div>
							</div>
							@endforeach
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($brand_product as $key => $brand_pro)
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand_pro->brand_id)}}">{{$brand_pro->brand_name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
						{{-- <div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="{{('public/frontend/images/shipping.jpg')}}" alt="" />
						</div><!--/shipping--> --}}
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<!--/chua trang home-->
					@yield('content')
					
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © <?php echo date('Y');?>. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>