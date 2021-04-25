<nav id="sidebar">
    <div class="sidebar-header">
        <h6>{{trans('panel.site_title')}}</h6>
    </div>

    <ul class="list-unstyled components c-sidebar-nav">
        <li>
            <a href="{{route('home')}}">Dashboard</a>
        </li>
        <li class="active">
            <a href="#page-management-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <img class="c-sidebar-nav-icon mr-2" src="{{ asset('front-assets/images/account.svg') }}" alt="">
                <span>Page Management</span>
            </a>
            <ul class="collapsed list-unstyled" id="page-management-sub-menu">

                @if(!empty(auth()->user()->template))
                    <li>
                        <a href="{{route('template.edit', auth()->user()->template->id)}}">Edit Page</a>
                    </li>
                    <li>
                        <a href="{{route('template', auth()->user()->template->username)}}">View Page</a>
                    </li>
                @else
                    <li>
                        <a href="{{route('template.create')}}">Create Page</a>
                    </li>

                @endif

            </ul>
        </li>

        <li>
            <a href="#bank-detail-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <img class="c-sidebar-nav-icon mr-2" src="{{asset('front-assets/images/delivered.svg')}}" alt="">
                <span>Bank Detail</span>
            </a>
            <ul class="collapsed list-unstyled" id="bank-detail-sub-menu">
                @if(auth()->user()->userUserProfile)
                    <li>
                        <a href="{{route('account.edit',auth()->user()->userUserProfile)}}">Edit Bank Detail</a>
                    </li>
                    <li>
                        <a href="{{route('account.show',auth()->user()->userUserProfile)}}">View Bank Detail</a>
                    </li>
                    
                @else
                    <li>
                        <a href="{{route('account.create')}}">Add Bank Detail</a>
                    </li>
                @endif
                <li>
                        <a href="{{route('payments.history')}}">Received Payments</a>
                    </li>

            </ul>
        </li>
        <li>
            <a href="#profile-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <img class="c-sidebar-nav-icon mr-2" src="{{asset('front-assets/images/profile.svg')}}" alt="">
                <span>Profile</span>
            </a>
            <ul class="collapsed list-unstyled" id="profile-sub-menu">
                <li>
                    <a href="{{ route('profile.edit') }}">Edit Profile</a>
                </li>
                <li>
                    <a href="{{ route('password.change') }}">Change Password</a>
                </li>
            </ul>
        </li>

        <li>

            <a target="_blank" href="{{ route('contact') }}">
                <img class="c-sidebar-nav-icon mr-2" src="{{asset('front-assets/images/contact.svg')}}" alt="">
                <span>Support</span>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('sidebar-logout-form').submit();">
                <img class="c-sidebar-nav-icon mr-2" src="{{asset('front-assets/images/logout.svg')}}" alt="">
                <span>{{ __('Logout') }}</span>
            </a>
            <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
