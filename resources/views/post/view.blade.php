@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="post-view-wrap">
    <div class="col-md-8 col-md-2 mx-auto">
        <div class="card-wrap">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <a class="no-text-decoration" href="/mypage/{{ $post->user_id }}">
                        @if ($post->user->profile_image_path)
                            <img class="post-profile-icon round-img" src="{{ asset('storage/user_images/' . $post->user->profile_image_path) }}"/>
                        @else
                            <img class="post-profile-icon round-img" src="{{ asset('/images/blank_profile.png') }}"/>
                        @endif
                    </a>
                    <a class="name-color no-text-decoration" title="{{ $post->user->name }}" href="/mypage/{{ $post->user_id }}">
                        <strong>{{ $post->user->name }}</strong>
                    </a>
                </div>
    
                <img src="{{ asset('storage/post_images/' . $post->post_image_path) }}" class="card-img-top">
                <div class="posts_text">
                    <p>{{ $post->date }}</p>
                    <p>{{ $prefecture->name }}</p>
                    <p>{{ $post->caption }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
