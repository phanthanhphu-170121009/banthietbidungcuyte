<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;
use App\Models\Slider;
use App\Models\CatePost;
class CartController extends Controller
{
    public function save_cart(Request $request){
        
        $qty=$request->qty;
        $product_id=$request->productid_hidden;
        $show_cart=DB::table('tbl_product')->where('product_id',$product_id)->first();
        
        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy();
        //Cart::add('293ad', 'Product 1', 1, 9.99);
        $data['id']=$show_cart->product_id;
        $data['name']=$show_cart->product_name;
        $data['qty']=$qty;
        $data['tax']=0;
        $data['price']=$show_cart->product_price;
        $data['options']['image']=$show_cart->product_image;
        
        Cart::add($data);
        //echo 1;
        return Redirect::to('/show-cart');
    }
    public function show_cart(){
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.cart.show_cart')
        ->with('category_product',$category_product)
        ->with('brand_product',$brand_product)->with('all_slider',$all_slider)->with('all_cate_post',$all_cate_post);
    }
    public function delete_to_cart($rowId){
        
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }
    public function update_to_cart(Request $request){
        $rowId=$request->rowId_card;
        $qty=$request->quantity_card;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }
    
}