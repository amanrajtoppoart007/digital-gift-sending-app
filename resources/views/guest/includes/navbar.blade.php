<!-- Header (Start) -->
<header>
    <nav class="navbar navbar-expand-lg bg-white fixed-top" id="navbar">
        <div class="container justify-content-between">
            <!-- Brand Logo -->
            <a href="{{URL::to('/')}}" class="navbar-brand text-theme-1 font-weight-bolder">DEMO WEBSITE</a>

            <!-- Toggler Button -->
            <button class="navbar-toggler" id="navbar-toggler" onclick="$('#navbar-collapse').toggle(300);">
                <img src="{{ asset('assets/assets/icons/menu.svg') }}" alt="toggler-menu">
            </button>

            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse ml-auto" id="navbar-collapse">
                <ul class="navbar-nav ml-auto" align="center">
                    <hr>
                    <li class="nav-item px-1"><a href="{{route('about')}}" class="nav-link text-theme-1">हमारे बारे
                            में</a></li>
                    <hr>

                    <hr>
                    <li class="nav-item px-1"><a href="{{ route('contact') }}" class="nav-link text-theme-1">संपर्क
                            करें</a></li>
                    <hr>
                    <li class="nav-item px-1"><a href="{{ route('career') }}" class="nav-link text-theme-1">कैरियर</a>
                    </li>
                    <hr>
                    <li class="px-1"><a href="{{ route('register') }}" class="btn shadow btn-theme-1 px-4 mx-2 py-2">पंजीकरण<img
                                src="{{asset('assets/assets/icons/circle-arrow.svg')}}" class="btn-icon"
                                alt="arrow-right"></a></li>
                    <hr>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Header (End) -->
