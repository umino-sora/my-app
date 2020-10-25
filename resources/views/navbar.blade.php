@section('navbar')
    <nav class="navbar navbar-expand navbar-light">
        @if (Auth::check())
            <!-- ログインしている時 -->
            <div class="container">
                <a class="navbar__brand navbar__mainLogo" href="/"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-md-auto align-items-center">
                        <li>
                            <a href="/posts/edit"><img class="nav-link postNavIcon" src="/images/post-icon.png"></a>
                        </li>
                        <li>
                            <a href="/mypage/{{ Auth::id() }}"><img class="nav-link commonNavIcon" src="/images/mypage-icon.png"></a>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <!-- ログインしていない時 -->
            <div class="container">
                <a class="navbar__brand navbar__mainLogo" href="/"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-md-auto align-items-center">
                        <li>
                            <a class="btn btn-primary" href="{{ route('login') }}">login</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </nav>
@endsection
