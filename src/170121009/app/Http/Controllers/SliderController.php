<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Slider;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class SliderController extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            Redirect::to('/admin.dashboard');  
        }else{
            Redirect::to('/admin')->send();   
        }
    }
    public function manage_banner(){
        $this->AuthLogin();
        $manage_banner= Slider::orderBy('slider_id','DESC')->get();
        
        return view('admin.slider.list_slider')->with(compact('manage_banner'));
        //return view('admin.all_brand_product');
    }
    public function add_banner(){
        $this->AuthLogin();
        return view('admin.slider.add_slider');
        //return view('admin.all_brand_product');
    }
    public function save_slider(Request $request){
        $this->AuthLogin();
        $data= $request->all();
        $get_image=$request->file('slider_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=(explode('.',$get_name_image));
            if($name_image['1']=='jpg' || $name_image['1']=='png'){
                $new_image = $name_image[0].rand(10,99).date('YmdHis').'.'.$get_image->getClientOriginalExtension();
                //echo $new_image;
                $get_image->move('public/uploads/slider',$new_image);
                $slider  = new Slider();
                $slider->slider_name = $data['slider_name'];
                $slider->slider_image = $new_image;
                $slider->slider_status = $data['slider_status'];
                $slider->slider_desc = $data['slider_desc'];   
                
            }else{
                
                Session::put('message','Chỉ hổ trợ hình ảnh JPG hoặc PNG');
                return Redirect::to('add-banner');
            }
            
        }else{
            $data['slider_image']='';
        } 
        $slider->save();
        Session::put('message','Thêm Slider thành công!');
        return Redirect::to('add-banner');
    }
    public function unactive_slider($slider_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status' =>0]);
        Session::put('message','Ẩn slider thành công.');
        return Redirect::to('manage-banner');
        
    }
    public function active_slider($slider_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status' =>1]);
        Session::put('message','Hiện slider thành công.');
        return Redirect::to('manage-banner');
        
    }
    public function delete_slider($slider_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id', $slider_id)->delete();
        Session::put('message','Xóa slider thành công.');
        return Redirect::to('manage-banner');
    }
}
