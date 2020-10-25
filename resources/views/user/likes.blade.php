@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="profile-wrap">
    <div class="page-title my-favorites">
        <p>likes</p>
    </div>
    <div class="container-fluid">
        <div class="row posts-img">
            @foreach ($likes as $like) 
                <div class="col-4">
                    <a href="/posts/{{ $like->post_id }}">
                        <img class="photo-trim" src="/storage/post_images/{{ $like->post->post_image_path }}" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
