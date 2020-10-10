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
