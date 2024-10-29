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
class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            Redirect::to('/admin.dashboard');  
        }else{
            Redirect::to('/admin')->send();   
        }
    }
    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();
        $all_category_product=DB::table('tbl_category_product')->get();
        $manager_category_product= view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
        //return view('admin.all_category_product');
    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data= array();
        $data['category_name']=$request->category_product1;
        $data['category_desc']=$request->category_product_desc;
        $data['category_status']=$request->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công.');
        return Redirect::to('add-category-product');
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
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status' =>0]);
        Session::put('message','Ẩn danh mục sản phẩm thành công.');
        return Redirect::to('all-category-product');
        
    }
    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status' =>1]);
        Session::put('message','Hiện danh mục sản phẩm thành công.');
        return Redirect::to('all-category-product');
        
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $edit_category_product=DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
        $manager_category_product= view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
        //return view('admin.all_category_product');
        
    }
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công.');
        return Redirect::to('all-category-product');
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data= array();
        $data['category_name']=$request->category_product;
        $data['category_desc']=$request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công.');
        return Redirect::to('all-category-product');
        
    }
    #end function Admin page
    public function showCategoryhome($category_product_id){
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_by_id=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
        ->where('tbl_product.category_id','=',$category_product_id)
        ->orderby('product_id','desc')->get();
        $category_by_name=DB::table('tbl_category_product')->where('tbl_category_product.category_id','=',$category_product_id)->get();
        return view('pages.category.show_category')->with('category_product',$category_product)->with('brand_product',$brand_product)->with('category_by_id',$category_by_id)->with('category_by_name',$category_by_name)->with('all_slider',$all_slider)->with('all_cate_post',$all_cate_post);
        
    }
}
