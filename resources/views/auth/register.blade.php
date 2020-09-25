@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="main">
    <div class="card devise-card">
        <div class="form-wrap">
            <div class="page-title">
                <p>sign</p>
                <p>up</p>
            </div>
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>
                    メールアドレス
                    <br>
                    <input class="form-control" autocomplete="email" type="email" name="email" value="{{ old('email') }}" required>
                </label>
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label>
                    ユーザーネーム
                    <br>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus>
                </label>
            </div>
    
            <div class="form-group">
                <label>
                    パスワード
                    <br>
                    <input class="form-control" autocomplete="off" type="password" name="password" required>
                </label>
            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <label>
                    パスワード確認
                    <br>
                    <input class="form-control" autocomplete="off" type="password" name="password_confirmation" required>
                </label>
            </div>
    
            <div class="actions">
                <input type="submit" name="commit" value="sign up" class="btn btn-primary w-100">
            </div>
        </form>
        <br>
    
        <p class="devise-link">
            アカウントをお持ちですか？
            <a href="/users/sign_in">サインインする</a>
        </p>
        </div>
    </div>
</div>
@endsection
