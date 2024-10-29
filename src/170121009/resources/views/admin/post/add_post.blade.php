@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm bài viết
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
                            
                            <form role="form" action="{{URL::to('/save-postt')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="cate_post_id">Danh mục bài biết</label>
                                <select class="form-control input-sm m-bot15" id="cate_post_id" name="cate_post_id">
                                    @foreach ($all_cate_post as $key =>$category)
                                    <option value="{{$category->cate_post_id}}">{{$category->cate_post_name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="post_title">Tên bài viết</label>
                                <input type="text" class="form-control" name="post_title" id="post_title" placeholder="Tên bài viết">
                            </div>
                            <div class="form-group">
                                <label for="post_slug">Slug</label>
                                <input type="text" class="form-control" name="post_slug" id="post_slug" placeholder="Slug">
                            </div>
                            <div class="form-group">
                                <label for="post_content">Nội dung</label>
                                <textarea style="resize: none;" rows="5" class="form-control" id="post_content" name="post_content" placeholder="Nội dung"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="post_image">Hình ảnh</label>
                                <input type="file" class="form-control" name="post_image" id="post_image" placeholder="Hình ảnh">
                            </div>
                            <div class="form-group">
                                <label for="post_desc">Mô tả</label>
                                <input type="text" class="form-control" name="post_desc" id="post_desc" placeholder="Mô tả">
                                
                            </div>
                            <div class="form-group">
                                <label for="post_meta_desc">Mô tả Meta</label>
                                <input type="text" class="form-control" name="post_meta_desc" id="post_meta_desc" placeholder="Slug">
                            </div>
                            <div class="form-group">
                                <label for="post_meta_keyword">Từ khóa Meta</label>
                                <input type="text" class="form-control" name="post_meta_keyword" id="post_meta_keyword" placeholder="Tên tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="post_status">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" id="post_status" name="post_status">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị </option>
                                </select>
                            </div>
                            
                            <button type="submit" name="add_postt" class="btn btn-info">Thêm bài viết</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
        <script>
	
            CKEDITOR.replace("post_content");
            CKEDITOR.replace("post_meta_desc");
        </script>
    </div>
    
@endsection