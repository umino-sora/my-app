@extends('layouts.app')
@include('navbar')
@include('footer')
@include('common.errors')
@section('content')
<div class="main">
    <div class="card devise-card">
        <div class="form-wrap">
            <div class="page-title">
                <p>my</p>
                <p>profile</p>
            </div>
            <form enctype="multipart/form-data" action="/mypage/update" accept-charset="UTF-8" method="post">
                <input name="utf8" type="hidden" value="&#x2713;" />
                <input type="hidden" name="id" value="{{ $user->id }}" />
                {{csrf_field()}} 
                <div class="form-group">
                    <label for="profile_image_path"></label><br>
                        @if ($user->profile_image_path)
                            <p>
                                <img class="round-img" src="{{ asset('storage/user_images/' . $user->profile_image_path) }}" alt="avatar" />
                            </p>
                        @endif
                    <input type="file" name="profile_image_path"  value="{{ old('profile_image_path',$user->id) }}" accept="image/jpeg,image/gif,image/png" />
                </div>

                <div class="form-group">
                    <label for="user_name">名前</label>
                    <input class="form-control" type="text" value="{{ old('user_name',$user->name) }}" name="user_name" />
                </div>
                
                <div class="form-group">
                    <label for="introduction">プロフィール</label>
                    <textarea class="form-control" name="introduction">{{ old('introduction',$user->introduction) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="user_email">メールアドレス</label>
                    <input class="form-control" type="email" value="{{ old('user_email',$user->email) }}" name="user_email" />
                </div>

                <div class="form-group">
                    <label for="user_password">パスワード</label>
                    <input class="form-control" type="password" name="user_password" />
                </div>

                <div class="form-group">
                    <label for="user_password_confirmation">パスワードの確認</label>
                    <input class="form-control" type="password" name="user_password_confirmation" />
                </div>

                <div class="actions">
                    <input type="submit" name="commit" value="save" class="btn btn-primary w-100" data-disable-with="変更する" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
