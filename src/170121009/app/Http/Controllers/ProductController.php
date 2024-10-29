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
class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            Redirect::to('/admin.dashboard');  
        }else{
            Redirect::to('/admin')->send();   
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $category_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('category_product',$category_product)->with('brand_product',$brand_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
        ->orderby('product_id','desc')->get();
        ;
        $manager_product= view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
        //return view('admin.all_product');
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $data= array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['product_price']=$request->product_price;
       // $data['product_image']=$request->product_image;
        $data['product_status']=$request->product_status;
        $get_image=$request->file('product_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=(explode('.',$get_name_image));
            $new_image = $name_image[0].rand(10,99).date('YmdHis').'.'.$get_image->getClientOriginalExtension();
            //echo $new_image;
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image']=$new_image;
            
        }else{
            $data['product_image']='';
        } 
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công!');
        return Redirect::to('add-product');
    }
    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' =>0]);
        Session::put('message','Ẩn sản phẩm thành công.');
        return Redirect::to('all-product');
        
    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' =>1]);
        Session::put('message','Hiện sản phẩm thành công.');
        return Redirect::to('all-product');
        
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $edit_product=DB::table('tbl_product')->where('product_id', $product_id)->get();
        
        
         $category_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $manager_product= view('admin.edit_product')->with('edit_product', $edit_product)->with('category_product', $category_product)->with('brand_product', $brand_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
        
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công.');
        return Redirect::to('all-product');
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data= array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['product_price']=$request->product_price;
       // $data['product_image']=$request->product_image;
        $data['product_status']=$request->product_status;
        $get_image=$request->file('product_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=(explode('.',$get_name_image));
            $new_image = $name_image[0].rand(10,99).date('YmdHis').'.'.$get_image->getClientOriginalExtension();
                //echo $new_image;
                $get_image->move('public/uploads/product',$new_image);
                $data['product_image']=$new_image;
            
        }else{
            //$data['product_image']=$new_image;
        } 
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công.');
        return Redirect::to('all-product');
        
    }
    # end admin
    public function show_detail($product_id){
        $all_cate_post= CatePost::orderBy('cate_post_id','DESC')->get();
        $all_slider= Slider::where('slider_status','1')->orderBy('slider_id','DESC')->take(4)->get();
        $category_product=DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $detail_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();
        foreach ($detail_product as $key => $value) {
            $category_id=$value->category_id;
        }

        $related_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)
        ->whereNotIn('tbl_product.product_id',[$product_id])
        ->get();
        ;
        //echo print_f($related_product);
        return view('pages.product.show_detail')
        ->with('category_product',$category_product)
        ->with('brand_product',$brand_product)
        ->with('detail_product',$detail_product)
        ->with('related_product',$related_product)->with('all_slider',$all_slider)->with('all_cate_post',$all_cate_post);
    }
    public function export_csv(){
        return Excel::download(new ExcelExport , 'product.xlsx');
    }
        
    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
        return back();
    }
}
