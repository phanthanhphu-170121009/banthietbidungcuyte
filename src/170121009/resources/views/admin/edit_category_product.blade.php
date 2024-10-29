@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật danh mục sản phẩm
                        <?php 
                                $message=Session::get('message');
                                if($message){
                                    echo '<br/>'.$message;
                                    Session::put('message',null);
                                }
                                
                            ?>
                    </header>
                    <div class="panel-body">
                        @foreach ($edit_category_product as $key => $edit_value)
                            
                        
                            <div class="position-center">
                                
                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="category_product">Tên danh mục</label>
                                        <input value="{{($edit_value->category_name)}}" type="text" class="form-control" name="category_product" id="category_product" placeholder="Tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_product_desc">Mô tả danh mục</label>
                                        <textarea   style="resize: none;" rows="5" class="form-control" id="category_product_desc" name="category_product_desc" >{{($edit_value->category_desc)}}</textarea>
                                        {{-- <input value="{{($edit_value->category_desc)}}" type="text" class="form-control" name="category_product_desc" id="category_product_desc" placeholder="Tên danh mục"> --}}
                                    </div>
                                    
                                    <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                                </form>
                            </div>
                            <script>
	
                                CKEDITOR.replace("category_product_desc");
                            </script>
                        @endforeach
                    </div>
                </section>

        </div>
        
    </div>
@endsection