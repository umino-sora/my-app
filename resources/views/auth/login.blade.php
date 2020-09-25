@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="main">
    <div class="card devise-card">
        <div class="form-wrap">
            <div class="page-title">
                <p>sign</p>
                <p>in</p>
            </div>
            <form class="new_user" id="new_user" action="{{ route('login') }}" accept-charset="UTF-8" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>
                        メールアドレス
                        <br>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    </label>
                </div>
        
                <div class="form-group">
                    <label>
                        パスワード
                        <br>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </label>
                </div>
        
                <div class="actions">
                    <input type="submit" name="commit" value="sign in" class="btn btn-primary w-100">
                </div>
            </form>
    
            <br>
    
            <p class="devise-link">
                アカウントをお持ちでないですか？
                <a href="{{ route('register') }}">登録する</a>
            </p>
    
        </div>
    </div>
</div>
@endsection
