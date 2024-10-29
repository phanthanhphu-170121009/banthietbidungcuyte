@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm thương hiệu sản phẩm
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
                            
                            <form role="form" action="{{URL::to('/save-brand-product')}}" method="POST">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="brand_product">Tên thương hiệu</label>
                                <input type="text" class="form-control" name="brand_product" id="brand_product" placeholder="Tên thương hiệu">
                            </div>
                            <div class="form-group">
                                <label for="brand_product_desc">Mô tả thương hiệu</label>
                                <textarea style="resize: none;" rows="5" class="form-control" id="brand_product_desc" name="brand_product_desc" placeholder="Mô tả thương hiệu"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="brand_product_status">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" id="brand_product_status" name="brand_product_status">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị </option>
                                </select>
                            </div>
                            <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
        <script>
	
            CKEDITOR.replace("brand_product_desc");
            
        </script>
    </div>
@endsection