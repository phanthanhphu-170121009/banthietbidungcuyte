@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật thương hiệu sản phẩm
                        <?php 
                                $message=Session::get('message');
                                if($message){
                                    echo '<br/>'.$message;
                                    Session::put('message',null);
                                }
                                
                            ?>
                    </header>
                    <div class="panel-body">
                        @foreach ($edit_brand_product as $key => $edit_value)
                            
                        
                            <div class="position-center">
                                
                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="brand_product">Tên thương hiệu</label>
                                        <input value="{{($edit_value->brand_name)}}" type="text" class="form-control" name="brand_product" id="brand_product" placeholder="Tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="brand_product_desc">Mô tả thương hiệu</label>
                                        <textarea   style="resize: none;" rows="5" class="form-control" id="brand_product_desc" name="brand_product_desc" >{{($edit_value->brand_desc)}}</textarea>
                                        {{-- <input value="{{($edit_value->brand_desc)}}" type="text" class="form-control" name="brand_product_desc" id="brand_product_desc" placeholder="Tên danh mục"> --}}
                                    </div>
                                    
                                    <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật thương hiệu</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </section>

        </div>
        <script>
	
            CKEDITOR.replace("brand_product_desc");
        </script>
    </div>
@endsection