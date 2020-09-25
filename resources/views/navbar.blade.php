@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar__brand navbar__mainLogo" href="/"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-md-auto align-items-center">
                    <li>
                        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
