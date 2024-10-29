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
class BrandProduct extends Controller
{   
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            Redirect::to('/admin.dashboard');  
        }else{
            Redirect::to('/admin')->send();   
        }
    }
    public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
        $all_brand_product=DB::table('tbl_brand_product')->get();
        $manager_brand_product= view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
        //return view('admin.all_brand_product');
    }
    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data= array();
        $data['brand_name']=$request->brand_product;
        $data['brand_desc']=$request->brand_product_desc;
        $data['brand_status']=$request->brand_product_status;
        DB::table('tbl_brand_product')->insert($data);
        Session::put('message','Thêm thương hiệu sản phẩm thành công.');
        return Redirect::to('add-brand-product');
        //   echo '<pre>1';
        //   print_f( $data);
        //   echo '</pre>';
        // if($result){
        //     Session::put('admin_name',$result->admin_name);
        //     Session::put('admin_id',$result->admin_id);
        //     return Redirect::to('/dashboard');
        // }else{
        //     Session::put('message','Mật khẩu hoặc tài khoản sai. Vui lòng nhập lại!');
            
        //     return Redirect::to('/admin');
        // }
    }
    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status' =>0]);
        Session::put('message','Ẩn thương hiệu sản phẩm thành công.');
        return Redirect::to('all-brand-product');
        
    }
    public function active_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status' =>1]);
        Session::put('message','Hiện thương hiệu sản phẩm thành công.');
        return Redirect::to('all-brand-product');
        
    }
    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();
        $edit_brand_product=DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->get();
        $manager_brand_product= view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
        //return view('admin.all_brand_product');
        
    }
    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công.');
        return Redirect::to('all-brand-product');
    }
    public function update_brand_product(Request $request,$brand_product_id){
        $this->AuthLogin();
        $data= array();
        $data['brand_name']=$request->brand_product;
        $data['brand_desc']=$request->brand_product_desc;
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công.');
        return Redirect::to('all-brand-product');
        
    }
    #end function Admin page
    public function showBrandhome($brand_product_id){
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $brand_by_id=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
        ->where('tbl_product.brand_id','=',$brand_product_id)
        ->orderby('product_id','desc')->get();
        $brand_by_name=DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id','=',$brand_product_id)->get();
        return view('pages.brand.show_brand')->with('category_product',$category_product)->with('brand_product',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_by_name',$brand_by_name)->with('all_slider',$all_slider)->with('all_cate_post',$all_cate_post);
        
    }
}
