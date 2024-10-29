@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center" style="margin:0;position: inherit;">{{$meta_title}}</h2>
   
    {{-- <a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}"> --}}
    <div class="col-sm-12">
        <div class="product-image-wrapper">
            @foreach($post as $key => $all_pro)
            <div class="single-products" style="margin:10px;">
                <p style="">{!!$all_pro->post_content!!}</p>
                    
            </div>
            <div class="clearfix"></div>
            @endforeach
        </div>
    </div>
    
   
    
</div><!--features_items-->

@endsection