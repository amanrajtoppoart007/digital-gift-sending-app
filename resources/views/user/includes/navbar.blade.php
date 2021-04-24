<!-- Header (Start) -->
<header id="header">
    <nav class="navbar bg-theme-1 navbar-dark  navbar-expand-md shadow-sm">
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
                        <a class="nav-link text-secondary" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
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
