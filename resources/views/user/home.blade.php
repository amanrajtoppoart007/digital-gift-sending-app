@extends('user.layout.app')
@section('content')
    <style>
        .bg-blue {
            background-color: #0070ba !important;
            color: white !important;
        }
    </style>
    <div>
        <div class="row">
            <div class="col-12 p-4">
                <h5>Welcome, {{ auth()->user()->name }}</h5>
            </div>
            <div class="col-lg-12">
                <div class="row my-2 gap-4">
                    <div class="col-7">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header bg-blue">Teamplate</div>
                                    <div class="card-body align-items-center">
                                        <div class="row">
                                            <div class="col-12 align-items-center">
                                                @if(auth()->user()->template)
                                                    <a href="{{route('template.edit', auth()->user()->template->id)}}"
                                                       class="text-info">
                                                        <img height="35"
                                                             src="{{ asset('front-assets/images/account.svg') }}"
                                                             alt="">
                                                        <span class="ml-2">Edit Template</span>
                                                    </a>
                                                @else
                                                    <a href="{{route('template.create')}}" class="text-info">
                                                        <img height="35"
                                                             src="{{ asset('front-assets/images/account.svg') }}"
                                                             alt="">
                                                        <span class="ml-2">Add Template</span>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                <div class="card">
                                    <div class="card-header bg-blue">Account</div>
                                    <div class="card-body align-items-center">
                                        <div class="row">
                                            <div class="col-4 align-items-center">
                                                @if(auth()->user()->userUserProfile)
                                                    <a href="{{route('account.edit',auth()->user()->userUserProfile)}}"
                                                       class="text-info">
                                                        <img height="35" class=""
                                                             src="{{asset('front-assets/images/create.svg')}}" alt="">
                                                        <span class="ml-2">Edit Account</span>
                                                    </a>
                                                @else
                                                    <a href="{{route('account.create')}}" class="text-info">
                                                        <img height="35" class=""
                                                             src="{{asset('front-assets/images/create.svg')}}" alt="">
                                                        <span class="ml-2">Add Account</span>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col align-items-center">
                                                <a href="{{route('payments.history')}}" class="text-info">
                                                    <img height="35" class=""
                                                         src="{{asset('front-assets/images/delivered.svg')}}" alt="">
                                                    <span class="ml-2">Received Amount</span>
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
                                                       class="text-info">
                                                        <img height="35" class=""
                                                             src="{{asset('front-assets/images/link.svg')}}" alt="">
                                                        <span class="ml-2">Share Profile</span>
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
                        <div class="card">

                            <div class="card-header bg-blue">
                                Dashboard
                            </div>

                            <div class="card-body" style="min-height:450px">

                                <h6><strong>User Detail</strong></h6>

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
                                <h6><strong>Account Detail</strong></h6>
                                <p class="text-danger">Please double check the bank details. We won’t be responsible for
                                    any
                                    transfer made to wrong
                                    bank account shared by you.</p>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th class="w-25">Name</th>
                                        <td>{{ $account->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bank Name</th>
                                        <td>{{ $account->bank_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Number</th>
                                        <td>{{ $account->account_number ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>IFSC Code</th>
                                        <td>{{ $account->ifsc_code ?? '' }}</td>
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

