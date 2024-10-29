@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật sản phẩm
                        <?php 
                                $message=Session::get('message');
                                if($message){
                                    echo '<br/>'.$message;
                                    Session::put('message',null);
                                }
                                
                            ?>
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            @foreach ($edit_product as $key => $edit_value)
                            <form role="form" action="{{URL::to('/update-product/'.$edit_value->product_id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input value="{{($edit_value->product_name)}}" type="text" class="form-control" name="product_name" id="product_name" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="product_price">Giá sản phẩm</label>
                                <input value="{{($edit_value->product_price)}}" type="text" class="form-control" name="product_price" id="product_price" placeholder="Giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="product_image">Hình ảnh sản phẩm</label>
                                <input type="file" class="form-control" name="product_image" id="product_image" placeholder="Hình ảnh sản phẩm">
                                <img src="{{ URL::to('public/uploads/product/'.$edit_value->product_image)}}" width="100px" height="100px" />
                            </div>
                            <div class="form-group">
                                <label for="ckeditor_product_desc">Mô tả nội dung sản phẩm</label>
                                <textarea style="resize: none;" rows="5" class="form-control" id="ckeditor_product_desc" name="product_desc" placeholder="Mô tả nội dung sản phẩm"> {{($edit_value->product_desc)}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="ckeditor_product_content">Nội dung sản phẩm</label>
                                <textarea style="resize: none;" rows="5" class="form-control" id="ckeditor_product_content" name="product_content" placeholder="Nội dung sản phẩm"> {{($edit_value->product_content)}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Danh mục sản phẩm</label>
                                <select class="form-control input-sm m-bot15" id="category_id" name="category_id">
                                    @foreach ($category_product as $key =>$category)
                                        @if($category->category_id==$edit_value->category_id)
                                            <option selected="selected" value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @else
                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="brand_id">Thương hiệu sản phẩm</label>
                                <select class="form-control input-sm m-bot15" id="brand_id" name="brand_id">
                                    @foreach ($brand_product as $key =>$brand)
                                    @if($brand->brand_id==$edit_value->brand_id)
                                            <option selected="selected" value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @else
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endif
                                    
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="product_status">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" id="product_status" name="product_status">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị </option>
                                </select>
                            </div>
                            <button type="submit" name="update_product" class="btn btn-info">Cập nhật sản phẩm</button>
                        </form>
                        @endforeach
                        </div>

                    </div>
                </section>

        </div>
        
    </div>
    <script>
	
		CKEDITOR.replace("ckeditor_product_desc");
		CKEDITOR.replace("ckeditor_product_content");
	</script>
@endsection