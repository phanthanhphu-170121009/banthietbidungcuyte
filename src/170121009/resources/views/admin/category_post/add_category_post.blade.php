@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm danh mục bài viết
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
                            
                            <form role="form" action="{{URL::to('/save-post')}}" method="POST">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="cate_post_name">Tên danh mục</label>
                                <input type="text" class="form-control" name="cate_post_name" id="cate_post_name" placeholder="Tên bài viết">
                            </div>
                            <div class="form-group">
                                <label for="cate_post_slug">Slug</label>
                                <input type="text" class="form-control" name="cate_post_slug" id="cate_post_slug" placeholder="Slug">
                                
                            </div>
                            <div class="form-group">
                                <label for="cate_post_desc">Mô tả danh mục</label>
                                <textarea style="resize: none;" rows="5" class="form-control" id="cate_post_desc" name="cate_post_desc" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="cate_post_status">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" id="cate_post_status" name="cate_post_status">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị </option>
                                </select>
                            </div>
                            
                            <button type="submit" name="add_cate_post" class="btn btn-info">Thêm Danh mục bài viết</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
        <script>
	
            CKEDITOR.replace("cate_post_desc");
            
        </script>
    </div>
@endsection