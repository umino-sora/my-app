@extends('layouts.app')
@include('navbar')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

<div class="d-flex flex-column align-items-center mt-3">
    <div class="col-xl-7 col-lg-8 col-md-10 col-sm-11 post-card">
        <div class="card">
            <div class="card-header">
                新規投稿
            </div>
            <div class="card-body">
                <form class="upload-images p-0 border-0" id="new_post" enctype="multipart/form-data" action="{{ url('posts')}}" accept-charset="UTF-8" method="POST">
                {{csrf_field()}} 
                    <div class="mb-3">
                        <input type="file" name="post_image_path" accept="image/jpeg,image/gif,image/png" />
                    </div>
                    <div class="form-group">
                        <label for="date">日付</label>
                        <input class="form-control" id="date_picker" type="text" name="date" />
                        <!-- jQueryの読み込み -->
                        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                        <!-- flatpickr読み込み -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.4.3/flatpickr.min.js"></script>
                        <script>
                            (function($, window) {
                                $(function() {
                                    $('#date_picker').flatpickr();
                                });
                            })(jQuery, window);
                        </script>
                    </div>
                    <!-- 都道府県のプルダウン入れたい -->
                    
                    <div class="form-group">
                        <label for="introduction">キャプション</label>
                        <textarea class="form-control" name="caption"></textarea>
                    </div>
                    
                    <input type="submit" name="commit" value="post" class="btn post-btn" data-disable-with="投稿する" />
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
