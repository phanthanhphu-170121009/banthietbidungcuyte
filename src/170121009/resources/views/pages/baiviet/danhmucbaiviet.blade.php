@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">{{$meta_title}}</h2>
   
    {{-- <a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}"> --}}
    <div class="col-sm-12">
        <div class="product-image-wrapper">
            @foreach($post as $key => $all_pro)
            <div class="single-products" style="margin:10px;">
                    <div class="text-left">
                        @csrf
                        
                            <img style="float: left;width:30%;" src="{{URL::to('public/uploads/post/'.$all_pro->post_image)}}" alt="" />
                            <h4 style="color: #000;padding:5px">{{($all_pro->post_title)}}</h4>
                            <p style="">{!!$all_pro->post_desc!!}</p>
                            <a style="text-align:center;float:right;" class="btn btn-warning btn-sm" href="{{URL::to('/bai-viet/'.$all_pro->post_slug)}}">Xem bài viết</a>
                    </div>
                    
            </div>
            <div class="clearfix"></div>
            @endforeach
        </div>
    </div>
    {{-- <ul class="pagination pagination-sm m-t-none m-b-none">
        {{$post->link()}}
    </ul> --}}
   
    
</div><!--features_items-->

@endsection