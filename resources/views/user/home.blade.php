@extends('user.layout.app')
@section('content')
    <style>
        .bg-blue {
            background-color: #0070ba !important;
            color: white !important;
        }
        .alert-blue {
            color: #c0e0ff;
            background-color: rgba(0, 112, 186, 0.8);
            border-color: #71a5cd;
        }
    </style>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-blue alert-dismissible fade show" role="alert">
                    <span>
                        Welcome <strong> {{ auth()->user()->name }}</strong> thank you for joining online ashirwaad, create your page, share it and start receiving gifts.
                    </span>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row my-2 gap-4">
                    <div class="col-7">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header bg-blue">Page Management</div>
                                    <div class="card-body align-items-center">
                                        <div class="row">

                                                @if(auth()->user()->template)
                                                <div class="col-4 align-items-center">
                                                    <a href="{{route('template.edit', auth()->user()->template->id)}}"
                                                       class="text-info">
                                                        <img height="35"
                                                             src="{{ asset('front-assets/images/account.svg') }}"
                                                             alt="">
                                                        <span class="ml-2">Edit Template</span>
                                                    </a>
                                                </div>
                                                <div class="col-4 align-items-center">
                                                    <a href="{{route('template.show', auth()->user()->template->username)}}"
                                                       class="text-info">
                                                        <img height="35"
                                                             src="{{ asset('front-assets/images/account.svg') }}"
                                                             alt="">
                                                        <span class="ml-2">Show Template</span>
                                                    </a>
                                                </div>
                                                @else
                                                    <div class="col-4 align-items-center">
                                                    <a href="{{route('template.create')}}" class="text-info">
                                                        <img height="35"
                                                             src="{{ asset('front-assets/images/account.svg') }}"
                                                             alt="">
                                                        <span class="ml-2">Add Template</span>
                                                    </a>
                                                    </div>
                                                @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                <div class="card">
                                    <div class="card-header bg-blue">Bank Detail</div>
                                    <div class="card-body align-items-center">
                                        <div class="row">
                                            @if(auth()->user()->userUserProfile)
                                                <div class="col-4 align-items-center">

                                                    <a href="{{route('account.edit',auth()->user()->userUserProfile)}}"
                                                       class="text-info">
                                                        <img height="35" class=""
                                                             src="{{asset('front-assets/images/create.svg')}}" alt="">
                                                        <span class="ml-2">Edit Bank Detail</span>
                                                    </a>
                                                </div>
                                                <div class="col-4 align-items-center">
                                                    <a href="{{route('account.show',auth()->user()->userUserProfile)}}"
                                                       class="text-info">
                                                        <img height="35" class=""
                                                             src="{{asset('front-assets/images/create.svg')}}" alt="">
                                                        <span class="ml-2">Show Bank Detail</span>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="col-4 align-items-center">
                                                    <a href="{{route('account.create')}}" class="text-info">
                                                        <img height="35" class=""
                                                             src="{{asset('front-assets/images/create.svg')}}" alt="">
                                                        <span class="ml-2">Add Bank Detail</span>
                                                    </a>
                                                </div>
                                                @endif

                                            <div class="col align-items-center">
                                                <a href="{{route('payments.history')}}" class="text-info">
                                                    <img height="35" class=""
                                                         src="{{asset('front-assets/images/delivered.svg')}}" alt="">
                                                    <span class="ml-2">Received Payments</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-blue">Profile</div>
                                    <div class="card-body align-items-center">
                                        <div class="row">
                                            @if(auth()->user()->template)
                                                <div class="col-4 align-items-center">
                                                    <a href="{{route('template', auth()->user()->template->username)}}"
                                                       target="_blank" class="text-info">
                                                        <img height="35" class=""
                                                             src="{{asset('front-assets/images/link.svg')}}" alt="">
                                                        <span class="ml-2">View Page</span>
                                                    </a>
                                                </div>
                                            @endif

                                            <div class="col-4 align-items-center">
                                                <a href="{{ route('profile.edit') }}" class="text-info">
                                                    <img height="35" class=""
                                                         src="{{asset('front-assets/images/profile.svg')}}"
                                                         alt="">
                                                    <span class="ml-2">Profile</span>
                                                </a>
                                            </div>
                                            <div class="col align-items-center">
                                                <a href="{{ route('password.change') }}" class="text-info">
                                                    <img height="35" class=""
                                                         src="{{asset('front-assets/images/padlock.svg')}}"
                                                         alt="">
                                                    <span class="ml-2">Change Password</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-5">
                        <div class="card h-100">

                            <div class="card-header bg-blue">
                                <h6><strong>User Detail</strong></h6>
                            </div>

                            <div class="card-body">



                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{auth()->user()->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{auth()->user()->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile</th>
                                        <td>{{auth()->user()->mobile}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

