<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\Models\Slider;
use App\Models\CatePost;
class HomeController extends Controller
{
    public function index(){
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        // $all_product=DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        // ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
        // ->orderby('product_id','desc')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();
        return view('pages.home')->with('category_product',$category_product)->with('brand_product',$brand_product)->with('all_product',$all_product)->with('all_slider',$all_slider)->with('all_cate_post',$all_cate_post);
    
    }
    public function tim_kiem(Request $request){
        $keywords =$request->keywords_submit;
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        // $all_product=DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        // ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
        // ->orderby('product_id','desc')->get();
        $all_product=DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->orderby('product_id','desc')->get();
        return view('pages.product.search')->with('category_product',$category_product)->with('brand_product',$brand_product)->with('all_product',$all_product)->with('all_slider',$all_slider)->with('all_cate_post',$all_cate_post);
    }
}
