<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

use App\Models\Post;
use App\Models\CatePost;
use App\Models\Slider;
class PostController extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            Redirect::to('/admin.dashboard');  
        }else{
            Redirect::to('/admin')->send();   
        }
    }
    public function add_postt(){
        $this->AuthLogin();
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        return view('admin.post.add_post')->with(compact('all_cate_post'));
    }
    public function all_postt(){
        $this->AuthLogin();
       
        $all_postt= Post::orderBy('post_id','DESC')->get();
        return view('admin.post.list_post')->with(compact('all_postt'));
    }
    public function save_postt(Request $request){
        $this->AuthLogin();
        $data= $request->all();
        $CategoryPost_post  = new Post();
        $CategoryPost_post->post_title = $data['post_title'];
        $CategoryPost_post->post_desc = $data['post_desc'];
        $CategoryPost_post->post_content = $data['post_content'];
        $CategoryPost_post->post_meta_desc = $data['post_meta_desc']; 
        $CategoryPost_post->post_meta_keyword = $data['post_meta_keyword'];
        $CategoryPost_post->post_status = $data['post_status'];
        $CategoryPost_post->cate_post_id = $data['cate_post_id'];
        $CategoryPost_post->post_slug = $data['post_slug'];
        //$CategoryPost_post->post_image = $data['post_image'];  
       
        $get_image=$request->file('post_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=(explode('.',$get_name_image));
            $new_image = $name_image[0].rand(10,99).date('YmdHis').'.'.$get_image->getClientOriginalExtension();
                //echo $new_image;
                $get_image->move('public/uploads/post',$new_image);
                $CategoryPost_post->post_image =$new_image;
            
        }else{
            $CategoryPost_post->post_image ='';
        } 
        $CategoryPost_post->save();
        Session::put('message','Thêm bài viết thành công!');
        return redirect()->back();
    }
    public function unactive_postt($post_id){
        $this->AuthLogin();
        DB::table('tbl_posts')->where('post_id',$post_id)->update(['post_status' =>0]);
        Session::put('message','Ẩn bài viết thành công.');
        return redirect()->back();
        
    }
    public function active_postt($post_id){
        $this->AuthLogin();
        DB::table('tbl_posts')->where('post_id',$post_id)->update(['post_status' =>1]);
        Session::put('message','Hiện bài viết thành công.');
        return redirect()->back();
        
    }
    // public function edit_category_product($category_product_id){
    //     $this->AuthLogin();
    //     $edit_category_product=DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
    //     $manager_category_product= view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
    //     return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    //     //return view('admin.all_category_product');
        
    // }
    public function delete_postt($post_id){
        $this->AuthLogin();
        DB::table('tbl_posts')->where('post_id', $post_id)->delete();
        Session::put('message','Xóa bài viết thành công.');
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
    public function danh_muc_bai_viet(Request $request,$post_slug){
        
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
        
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        $all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();
        $catepost= CatePost::where('cate_post_slug', $post_slug)->take(1)->get();
        foreach ($catepost as $key => $value) {
            $meta_desc= $value->cate_post_desc;
            $meta_keyword= $value->cate_post_slug;
            $meta_title= $value->cate_post_name;
            $cate_id= $value->cate_post_id;
            $url_canonical= $request->url();
        }
        $post=Post::where('post_status',1)->where('cate_post_id',$cate_id)->paginate(10);
        
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        return view('pages.baiviet.danhmucbaiviet')
        ->with('category_product',$category_product)
        ->with('brand_product',$brand_product)
        ->with('all_product',$all_product)
        ->with('all_slider',$all_slider)
        ->with('post',$post)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keyword',$meta_keyword)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('all_cate_post',$all_cate_post);
        
    }
    public function bai_viet(Request $request,$post_slug){
        
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
        
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        $all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();
        
        $post=Post::where('post_status',1)->where('post_slug',$post_slug)->take(1)->get();
        foreach ($post as $key => $value) {
            $meta_desc= $value->post_meta_desc;
            $meta_keyword= $value->post_meta_keyword;
            $meta_title= $value->post_title;
            $cate_id= $value->cate_post_id;
            $url_canonical= $request->url();
        }
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        return view('pages.baiviet.baiviet')
        ->with('category_product',$category_product)
        ->with('brand_product',$brand_product)
        ->with('all_product',$all_product)
        ->with('all_slider',$all_slider)
        ->with('post',$post)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keyword',$meta_keyword)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('all_cate_post',$all_cate_post);
        
    }
}
