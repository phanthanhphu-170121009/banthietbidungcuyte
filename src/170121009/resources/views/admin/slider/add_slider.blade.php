@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm Slider
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
                            
                            <form role="form" action="{{URL::to('/save-slider')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="slider_name">Tên Slide</label>
                                <input type="text" class="form-control" name="slider_name" id="slider_name" placeholder="Tên slide">
                            </div>
                            <div class="form-group">
                                <label for="slider_desc">Mô tả Slide</label>
                                <textarea style="resize: none;" rows="5" class="form-control" id="slider_desc" name="slider_desc" placeholder="Mô tả slide"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="slider_image">Hình ảnh Slide</label>
                                <input type="file" class="form-control" name="slider_image" id="slider_image" placeholder="Hình ảnh slide">
                            </div>
                            <div class="form-group">
                                <label for="slider_status">Hiển thị</label>
                                <select class="form-control input-sm m-bot15" id="slider_status" name="slider_status">
                                    <option value="0">Ẩn Slide</option>
                                    <option value="1">Hiển thị Slide</option>
                                </select>
                            </div>
                            <button type="submit" name="add_slider" class="btn btn-info">Thêm Slide</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
        <script>
	
            CKEDITOR.replace("slider_desc");
        </script>
    </div>
@endsection