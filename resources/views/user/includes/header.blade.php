<!-- Header (Start) -->
<header id="header">
    <nav class="navbar navbar-expand-md shadow-sm">
        <div class="container py-3">
            <a href="#" class="navbar-brand logo font-weight-bold">Logo</a>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav ml-auto">
                    <hr>
                    <li class="nav-item mx-auto px-1">
                        <a href="{{ route('index') }}" class="nav-link text-secondary">Home</a>
                    </li>
                    <hr>
                    <li class="nav-item mx-auto px-1"><a href="#" class="nav-link text-secondary">How it Works</a></li>
                    <hr>
                    <li class="nav-item mx-auto px-1"><a href="#" class="nav-link text-secondary">Why us</a></li>
                    <hr>
                    <li class="nav-item mx-auto px-1"><a href="#" class="nav-link text-secondary">Contact us</a></li>
                    <hr>
                </ul>
            </div>
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
