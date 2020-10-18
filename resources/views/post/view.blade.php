@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="post-view-wrap">
    <div class="col-md-8 col-md-2 mx-auto">
        <div class="card-wrap">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <a class="no-text-decoration" href="/userpage/{{ $post->user->id }}">
                        @if ($post->user->profile_image_path)
                            <img class="post-profile-icon round-img" src="{{ asset('storage/user_images/' . $post->user->profile_image_path) }}"/>
                        @else
                            <img class="post-profile-icon round-img" src="{{ asset('/images/blank_profile.png') }}"/>
                        @endif
                    </a>
                    <a class="name-color no-text-decoration" title="{{ $post->user->name }}" href="/userpage/{{ $post->user->id }}">
                        <strong>{{ $post->user->name }}</strong>
                    </a>
                </div>
                
                <img src="{{ asset('storage/post_images/' . $post->post_image_path) }}" class="card-img-top">
                
                <div class="card-body">
                    <div id="ml-auto mx-0 my-auto">
                        @if ($post->likedBy(Auth::user())->count() > 0)
                            <a class="loved hide-text" data-remote="true" rel="nofollow" data-method="DELETE" href="/likes/{{ $post->likedBy(Auth::user())->firstOrFail()->id }}"><img class="delete-post-icon" src="/images/like2.png"></a>
                        @else
                            <a class="love hide-text" data-remote="true" rel="nofollow" data-method="POST" href="/posts/{{ $post->id }}/likes"><img class="delete-post-icon" src="/images/like1.png"></a>
                        @endif
                        
                        @if ($post->user->id == Auth::user()->id)
                  	        <a class="delete-image" rel="nofollow" href="/postsdelete/{{ $post->id }}">
                                <img class="delete-post-icon" src="/images/trash.png">
                          	</a>
                        @endif
                    </div>
                </div>
                
                <div class="posts_text">
                    <p>{{ $post->date }} / {{ $prefecture->name }}</p>
                    <p>{{ $post->caption }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
