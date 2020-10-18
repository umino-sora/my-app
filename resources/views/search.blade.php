@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="profile-wrap">
    <div class="page-title my-favorites">
        <p></p>
        <p>index</p>
    </div>
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
