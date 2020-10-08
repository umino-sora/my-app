@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="col-md-8 col-md-2 mx-auto">
    <div class="card-wrap">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <a class="no-text-decoration" href="/mypage/{{ $post->user->id }}">
                    @if ($post->user->profile_image_path)
                        <img class="post-profile-icon round-img" src="{{ asset('storage/user_images/' . $post->user->profile_image_path) }}"/>
                    @else
                        <img class="post-profile-icon round-img" src="{{ asset('/images/blank_profile.png') }}"/>
                    @endif
                </a>
                <a class="black-color no-text-decoration" title="{{ $post->user->name }}" href="/mypage/{{ $post->user->id }}">
                    <strong>{{ $post->user->name }}</strong>
                </a>
            </div>

            <img src="/storage/post_images/{{ $post->post_image_path }}" class="card-img-top">
            <p>{{ $post->caption }}</p>
        </div>
    </div>
</div>
@endsection
