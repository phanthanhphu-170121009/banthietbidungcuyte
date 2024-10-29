<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Models\CatePost;
session_start();
use App\Models\Slider;
class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            Redirect::to('/admin.dashboard');  
        }else{
            Redirect::to('/admin')->send();   
        }
    }
    #check out
    public function login_checkout(){
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.checkout.login_checkout')
        ->with('category_product',$category_product)
        ->with('brand_product',$brand_product)->with('all_slider',$all_slider)->with('all_cate_post',$all_cate_post);
    }
    public function login_customer(Request $request){
        $data= array();
        $email=$request->email_account;
        $password=md5($request->password_account);
        
        $result=DB::table('tbl_customers')->where('customers_email',$email)->where('customers_password',$password)->first();
        if($result){
            Session::put('customers_id',$result->customers_id);
            Session::put('customers_name',$result->customers_name);
        
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login-checkout');
        }
        
        
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }
    public function add_customer(Request $request){
        $data= array();
        $data['customers_name']=$request->customers_name;
        $data['customers_email']=$request->customers_email;
        $data['customers_password']=md5($request->customers_password);
        $data['customers_phone']=$request->customers_phone;
        $customer_id=DB::table('tbl_customers')->insertGetId($data);
        Session::put('customers_id',$customer_id);
        Session::put('customers_name',$request->customers_name);
        return Redirect::to('/checkout');
        
    }
    public function checkout(){
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
         $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
         $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
         return view('pages.checkout.show_checkout')
         ->with('category_product',$category_product)
         ->with('brand_product',$brand_product)->with('all_slider',$all_slider)->with('all_cate_post',$all_cate_post);
        
    }
    public function save_checkout_customer(Request $request){
        $data= array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_phone']=$request->shipping_phone;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_notes']=$request->shipping_notes;
        $shipping_id=DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
       
    }
    public function payment(){
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
         $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
         return view('pages.checkout.payment')
         ->with('category_product',$category_product)
         ->with('brand_product',$brand_product)->with('all_slider',$all_slider)->with('all_cate_post',$all_cate_post);

        
       
    }
    public function order_place(Request $request){
        $data= array();
        $payment_method = $request->payment_option;
        $payment_status = 'Đang chờ xử lý';
        $data['payment_method']=$payment_method;
        $data['payment_status']=$payment_status;
        $payment_id=DB::table('tbl_payment')->insertGetId($data);

        $order_data= array();
        $order_data['customers_id']=Session::get('customers_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$payment_id;
        $order_data['order_total']=Cart::total();
        $order_data['order_status']='Đang chờ xử lý';
        $order_id=DB::table('tbl_order')->insertGetId($order_data);
        $order_d_data= array();
        $content=Cart::content();
        foreach ($content as $key => $value) {
            
            $order_d_data['order_id']=$order_id;
            $order_d_data['product_id']=$value->id;
            $order_d_data['product_name']=$value->name;
            $order_d_data['product_price']=$value->price;
            $order_d_data['product_sales_quantity']=$value->qty;
            $result=DB::table('tbl_order_detailts')->insert($order_d_data);
        }
        if($data['payment_method']=='1'){
            echo 'Thanh toán thẻ ATM';
        }elseif($data['payment_method']=='2'){
            Cart::destroy();
            //echo 'Tiền mặt';
            $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
            $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
            $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
            return view('pages.checkout.handcash')->with('category_product',$category_product)
            ->with('brand_product',$brand_product)->with('all_slider',$all_slider)->with('all_cate_post',$all_cate_post);
        }else{
            echo 'Ghi nợ';
        }
        //return Redirect::to('/payment');
    
    }
    public function manage_order(){
         
        $this->AuthLogin();
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
        $all_order=DB::table('tbl_order')
        ->join('tbl_customers','tbl_customers.customers_id','=','tbl_order.customers_id')
        ->select('tbl_order.*','tbl_customers.customers_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manage_order=view('admin.manage_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.manage_order', $manage_order)->with('all_slider',$all_slider)->with('all_cate_post',$all_cate_post);
        
       
   }
    public function view_order($order_id){
         
        $this->AuthLogin();
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
        $order_by_id=DB::table('tbl_order')
        ->join('tbl_customers','tbl_customers.customers_id','=','tbl_order.customers_id')
        ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        ->join('tbl_order_detailts','tbl_order_detailts.order_id','=','tbl_order.order_id')
        ->where('tbl_order.order_id',$order_id)
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_detailts.*')->first();
        $order_detail=DB::table('tbl_order')
        ->join('tbl_customers','tbl_customers.customers_id','=','tbl_order.customers_id')
        ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        ->join('tbl_order_detailts','tbl_order_detailts.order_id','=','tbl_order.order_id')
        ->where('tbl_order.order_id',$order_id)
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_detailts.*')->get();
        
        // print_f($order_by_id);
        $manage_order_order_by_id=view('admin.view_order')->with('order_by_id', $order_by_id)->with('order_detail', $order_detail);
        return view('admin_layout')->with('admin.view_order', $manage_order_order_by_id)->with('all_slider',$all_slider)->with('all_cate_post',$all_cate_post);
    
   
    }
}
