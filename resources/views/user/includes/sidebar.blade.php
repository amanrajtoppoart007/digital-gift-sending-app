<aside class="h-100" style="min-height: 100vh">
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <img class="c-sidebar-nav-icon" src="{{asset('front-assets/images/house.svg')}}" alt="">
            <a href="{{ route("home") }}" class="c-sidebar-nav-link">Home</a>
        </li>

        @if(auth()->user()->template)
            <li class="c-sidebar-nav-item">
                <img class="c-sidebar-nav-icon" src="{{ asset('front-assets/images/account.svg') }}" alt="">
                <a href="{{route('template.edit', auth()->user()->template->id)}}" class="c-sidebar-nav-link">Edit
                    Template</a>
            </li>
        @else
            <li class="c-sidebar-nav-item">
                <img class="c-sidebar-nav-icon" src="{{ asset('front-assets/images/account.svg') }}" alt="">
                <a href="{{route('template.create')}}" class="c-sidebar-nav-link">Add Template</a>
            </li>
        @endif

        @if(auth()->user()->userUserProfile)
            <li class="c-sidebar-nav-item">
                <img class="c-sidebar-nav-icon" src="{{asset('front-assets/images/create.svg')}}" alt="">
                <a href="{{route('account.edit',auth()->user()->userUserProfile)}}" class="c-sidebar-nav-link">Edit
                    Account</a>
            </li>
        @else
            <li class="c-sidebar-nav-item">
                <img class="c-sidebar-nav-icon" src="{{asset('front-assets/images/create.svg')}}" alt="">
                <a href="{{route('account.create')}}" class="c-sidebar-nav-link">Add Account</a>
            </li>
        @endif
        @if(auth()->user()->template)
            <li class="c-sidebar-nav-item">
                <img class="c-sidebar-nav-icon" src="{{asset('front-assets/images/link.svg')}}" alt="">
                <a href="{{route('template', auth()->user()->template->username)}}" class="c-sidebar-nav-link">Share
                    Profile</a>
            </li>
        @endif
        <li class="c-sidebar-nav-item">
            <img class="c-sidebar-nav-icon" src="{{asset('front-assets/images/delivered.svg')}}" alt="">
            <a href="{{route('payments.history')}}" class="c-sidebar-nav-link">Received Amount</a>
        </li>
        <li class="c-sidebar-nav-item">
            <img class="c-sidebar-nav-icon" src="{{asset('front-assets/images/padlock.svg')}}" alt="">
            <a href="{{ route('password.change') }}" class="c-sidebar-nav-link">Change Password</a>
        </li>
        <li class="c-sidebar-nav-item align-items-center">
            <img class="c-sidebar-nav-icon" src="{{asset('front-assets/images/contact.svg')}}" alt="">
            <a href="{{ route('contact') }}" class="c-sidebar-nav-link">Contact Us</a>
        </li>

        <li class="c-sidebar-nav-item">
            <img class="c-sidebar-nav-icon" src="{{asset('front-assets/images/logout.svg')}}" alt="">
            <a class="c-sidebar-nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</aside>
