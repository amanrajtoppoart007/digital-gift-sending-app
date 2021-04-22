<!-- Header (Start) -->
<header id="header">
    <nav class="navbar navbar-expand-md shadow-sm">
        <div class="container py-3">
            <a href="{{route('home')}}" class="navbar-brand logo font-weight-bold">{{ trans('panel.site_title') }}</a>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav ml-auto">
                    <hr>
                    <li class="nav-item mx-auto px-1">
                        <a href="{{ route('home') }}" class="nav-link text-secondary">Home</a>
                    </li>
                    <hr>
                    <li class="nav-item mx-auto px-1">
                        <a href="{{ route('password.change') }}" class="nav-link text-secondary">Change password</a>
                    </li>
                    <li class="nav-item mx-auto px-1">
                        <form id="logout-form" action="{{ url('logout') }}" method="POST">
                            @csrf
                            <button class=" btn btn-xs nav-link text-secondary" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler" id="navbar-toggler">
                <img src="{{ asset('front-assets/images/menu.svg') }}" alt="navbar-menu">
            </button>
        </div>
    </nav>
</header>
<!-- Header (End) -->
