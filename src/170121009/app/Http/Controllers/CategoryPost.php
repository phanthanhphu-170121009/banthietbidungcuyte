<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use App\Models\CatePost;
class CategoryPost extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            Redirect::to('/admin.dashboard');  
        }else{
            Redirect::to('/admin')->send();   
        }
    }
    public function add_post(){
        $this->AuthLogin();
        return view('admin.category_post.add_category_post');
    }
    public function all_post(){
        $this->AuthLogin();
        $all_post= CatePost::orderBy('cate_post_id','DESC')->get();
        return view('admin.category_post.list_category_post')->with(compact('all_post'));
    }
    public function save_post(Request $request){
        $this->AuthLogin();
        $data= $request->all();
        $CategoryPost_post  = new CatePost();
                $CategoryPost_post->cate_post_name = $data['cate_post_name'];
                $CategoryPost_post->cate_post_status = $data['cate_post_status'];
                $CategoryPost_post->cate_post_slug = $data['cate_post_slug'];
                $CategoryPost_post->cate_post_desc = $data['cate_post_desc'];   
        $CategoryPost_post->save();
        Session::put('message','Thêm Danh mục bài viết thành công!');
        return redirect()->back();
    }
    public function unactive_post($cate_post_id){
        $this->AuthLogin();
        DB::table('tbl_category_post')->where('cate_post_id',$cate_post_id)->update(['cate_post_status' =>0]);
        Session::put('message','Ẩn danh mục bài viết thành công.');
        return redirect()->back();
        
    }
    public function active_post($cate_post_id){
        $this->AuthLogin();
        DB::table('tbl_category_post')->where('cate_post_id',$cate_post_id)->update(['cate_post_status' =>1]);
        Session::put('message','Hiện danh mục bài viết thành công.');
        return redirect()->back();
        
    }
    // public function edit_category_product($category_product_id){
    //     $this->AuthLogin();
    //     $edit_category_product=DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
    //     $manager_category_product= view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
    //     return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    //     //return view('admin.all_category_product');
        
    // }
    public function delete_post($cate_post_id){
        $this->AuthLogin();
        DB::table('tbl_category_post')->where('cate_post_id', $cate_post_id)->delete();
        Session::put('message','Xóa danh mục bài viết thành công.');
        return redirect()->back();
    }
    // public function update_category_product(Request $request,$category_product_id){
    //     $this->AuthLogin();
    //     $data= array();
    //     $data['category_name']=$request->category_product;
    //     $data['category_desc']=$request->category_product_desc;
    //     DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
    //     Session::put('message','Cập nhật danh mục sản phẩm thành công.');
    //     return Redirect::to('all-category-product');
        
    // }
    // #end function Admin page
    // public function showCategoryhome($category_product_id){
    //     $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
    //     $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
    //     $category_by_id=DB::table('tbl_product')
    //     ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
    //     ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
    //     ->where('tbl_product.category_id','=',$category_product_id)
    //     ->orderby('product_id','desc')->get();
    //     $category_by_name=DB::table('tbl_category_product')->where('tbl_category_product.category_id','=',$category_product_id)->get();
    //     return view('pages.category.show_category')->with('category_product',$category_product)->with('brand_product',$brand_product)->with('category_by_id',$category_by_id)->with('category_by_name',$category_by_name);
        
    // }
}
