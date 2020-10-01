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
    </div>
</div>
@endsection
