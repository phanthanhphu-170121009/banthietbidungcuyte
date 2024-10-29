@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Tìm kiếm</h2>
    @foreach($all_product as $key => $all_pro)
    <a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}">
    <div class="col-sm-4">
        
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to('public/uploads/product/'.$all_pro->product_image)}}" alt="" />
                        <h2>{{number_format($all_pro->product_price).' VNĐ'}}</h2>
                        <p>{{($all_pro->product_name)}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                    </div>
                    {{-- <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{number_format($all_pro->product_price).' VNĐ'}}</h2>
                            <p>{{($all_pro->product_name)}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                        </div>
                    </div> --}}
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm so sánh</a></li>
                </ul>
            </div>
        </div>
       
    </div>
    </a>
    @endforeach
    
</div><!--features_items-->

@endsection