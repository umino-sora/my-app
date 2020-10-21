@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="profile-wrap">
    <div class="row">
        <div class="col-md-4 text-center">
            @if ($user->profile_image_path)
                <p>
                    <img class="round-img" src="{{ asset('storage/user_images/' . $user->profile_image_path) }}" alt="avatar" />
                </p>
                @else
                    <img class="round-img" src="{{ asset('/images/blank_profile.png') }}"/>
            @endif
            <p>
                {{ $user->name }}
            </p>
        </div>
        <div class="col-md-8">
            <div class="introduction-text">
                <p>
                    {{ $user->introduction }}
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($user->id == Auth::user()->id)
            <a class="btn btn-outline-dark common-btn edit-profile-btn" href="/likes/index"><i class="fas fa-heart"></i> 一覧</a>
        @endif
        
        @if ($user->id == Auth::user()->id)
            <a class="btn btn-outline-dark common-btn edit-profile-btn" href="/mypage/edit">プロフィールを編集</a>
        @endif

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">設定</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="japan-map">
        <ul class="jp_map">
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
            <li>
                <a href="#"></a></li>
        </ul>
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
