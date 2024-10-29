@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm danh mục sản phẩm
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
                            
                            <form role="form" action="{{URL::to('/save-category-product')}}" method="POST">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="category_product1">Tên danh mục</label>
                                <input type="text" class="form-control" name="category_product1" id="category_product1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="category_product_desc">Mô tả danh mục</label>
                                <textarea style="resize: none;" rows="5" class="form-control" id="category_product_desc" name="category_product_desc" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_product_status">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" id="category_product_status" name="category_product_status">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị </option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
        <script>
	
            CKEDITOR.replace("category_product");
            CKEDITOR.replace("category_product_desc");
        </script>
    </div>
@endsection