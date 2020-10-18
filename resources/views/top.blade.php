@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<!-- 画像&言葉 -->
<div class="row">
    <div class="main-introduction">
        <img class="main-img" src="/images/main.png">
        <div class="main-letter">
            <p>旅先や日常でのひとこまを記憶するために…</p>
            <br>
            <p>ひっそりと佇む喫茶店、木漏れ日の綺麗な公園。</p>
            <p>昨日までは知らなかった新しい景色。</p>
            <br>
            <p>新しい景色を見つけに、さんぽをしよう。</p>
        </div>
    </div>
</div>

<!-- 検索部分 -->
<script type="text/javascript">
    // モーダルウインドウ表示
    function displayModal() {
        $('.modal').fadeIn();
    }
    
    function closeModal() {
        $('.modal').css('display', 'none');
    }
</script>

<!-- 検索マーク -->
<div class="search-area">
    <a onclick="displayModal();">
        <i class="fas fa-search serch-icon"></i>
    </a>
</div>

<!-- モーダルウィンドウ -->
<form action="{{ url('serch')}}" method="get">
    <div class="modal">
        <div class="modal-window">
            <div class="modal-contents">
                <div class="cross-icon">
                    <a onclick="closeModal();"><i class="fas fa-times"></i></a>
                </div>
                <div class="form-group">
                    <label for="serch_words">フリーワード</label>
                    <input class="form-control" type="text" name="cond_title">
                </div>
                
                <div class="form-group">
                    <label for="date">都道府県</label>
                        <p>北海道地方</p>
                        <input type="checkbox" id="prefecture1" name="serect_prefectures" class="box-pref">
                        <label for="prefecture1" class="checkbox-pref">
                            <option>{{ $prefecture1->name }}</option>
                        </label>
                        <p>東北地方</p>
                        @foreach ($prefectures2 as $prefecture2)
                            <input type="checkbox" id="prefecture2" name="serect_prefectures" class="box-pref">
                            <label for="prefecture2" class="checkbox-pref">
                                <option>{{ $prefecture2->name }}</option>
                            </label>
                        @endforeach
                        <p>関東地方</p>
                        @foreach ($prefectures3 as $prefecture3)
                            <input type="checkbox" id="prefecture3" name="serect_prefectures" class="box-pref">
                            <label for="prefecture3" class="checkbox-pref">
                                <option>{{ $prefecture3->name }}</option>
                            </label>
                        @endforeach
                        <p>中部地方</p>
                        @foreach ($prefectures4 as $prefecture4)
                            <input type="checkbox" id="prefecture4" name="serect_prefectures" class="box-pref">
                            <label for="prefecture4" class="checkbox-pref">
                                <option>{{ $prefecture4->name }}</option>
                            </label>
                        @endforeach
                        <p>近畿地方</p>
                        @foreach ($prefectures5 as $prefecture5)
                            <input type="checkbox" id="prefecture5" name="serect_prefectures" class="box-pref">
                            <label for="prefecture5" class="checkbox-pref">
                                <option>{{ $prefecture5->name }}</option>
                            </label>
                        @endforeach
                        <p>中国地方</p>
                        @foreach ($prefectures6 as $prefecture6)
                            <input type="checkbox" id="prefecture6" name="serect_prefectures" class="box-pref">
                            <label for="prefecture6" class="checkbox-pref">
                                <option>{{ $prefecture6->name }}</option>
                            </label>
                        @endforeach
                        <p>四国地方</p>
                        @foreach ($prefectures7 as $prefecture7)
                            <input type="checkbox" id="prefecture7" name="serect_prefectures" class="box-pref">
                            <label for="prefecture7" class="checkbox-pref">
                                <option>{{ $prefecture7->name }}</option>
                            </label>
                        @endforeach
                        <p>九州地方</p>
                        @foreach ($prefectures8 as $prefecture8)
                            <input type="checkbox" id="prefecture8" name="serect_prefectures" class="box-pref">
                            <label for="prefecture8" class="checkbox-pref">
                                <option>{{ $prefecture8->name }}</option>
                            </label>
                        @endforeach
                    </label>
                </div>

                <input type="submit" value="serch" class="btn post-btn">
            </div>
        </div>
    </div>
</form>

<!-- 新着post部分 -->
<div class="form-wrap">
    <div class="container-fluid">
        <div class="row posts-img">
            @foreach ($posts as $post) 
            <div class="col-md-4">
                <a href="/posts/{{ $post->id }}">
                  <img class="photo-trim" src="/storage/post_images/{{ $post->post_image_path }}" />
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
