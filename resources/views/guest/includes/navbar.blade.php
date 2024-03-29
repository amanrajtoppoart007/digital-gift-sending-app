<!-- Header (Start) -->
<header id="header">
    <nav class="navbar navbar-expand-md shadow-sm">
        <div class="container py-3">
            <a href="{{route('index')}}" class="navbar-brand logo font-weight-bold">
                {{ trans('panel.site_title') }}
            </a>
            <div class="ml-auto">
                <a href="{{ route('register') }}" class="btn btn-theme-1 mx-1 shadow-sm">Register</a>
                <a href="{{ route('login') }}" class="btn btn-theme-2 mx-1 shadow-sm">Login</a>
            </div>
            <button class="navbar-toggler" id="navbar-toggler">
                <img src="{{ asset('front-assets/images/menu.svg') }}" alt="navbar-menu">
            </button>
        </div>
    </nav>
</header>
<!-- Header (End) -->
