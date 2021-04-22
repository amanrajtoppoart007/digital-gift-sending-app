@extends('user.layout.app')
@section('content')
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body" style="min-height:450px">

                        <div class="row mt-3">

                            <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                                @if(!empty($template->id))
                                    <a href="{{route('template.edit',$template->id)}}">
                                        <div class="card border-0 shadow" style="cursor: pointer;text-decoration: none;">
                                            <div class="card-body">
                                                <br>
                                                <img src="http://127.0.0.1:8000/front-assets/images/account.svg"
                                                     alt="img-1" class="img-fluid how-work-img">
                                                <h3 class="font-weight-bold mt-3 text-theme-1">Edit Template</h3>
                                                <hr class="w-50">
                                                <p class="text-secondary">Create your blessing page to get started.</p>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('template.create')}}">
                                        <div class="card border-0 shadow" style="cursor: pointer;text-decoration: none;">
                                            <div class="card-body">
                                                <br>
                                                <img src="http://127.0.0.1:8000/front-assets/images/account.svg"
                                                     alt="img-1" class="img-fluid how-work-img">
                                                <h3 class="font-weight-bold mt-3 text-theme-1">Create Template</h3>
                                                <hr class="w-50">
                                                <p class="text-secondary">Create your blessing page to get started.</p>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                                @if(!empty($profile))
                                    <a href="{{route('profile.edit',$profile->id)}}">
                                        <div class="card border-0 shadow" style="cursor: pointer;text-decoration: none;">
                                            <div class="card-body">
                                                <br>
                                                <img src="{{asset('front-assets/images/create.svg')}}" alt="img-2"
                                                     class="img-fluid how-work-img">
                                                <h3 class="font-weight-bold mt-3 text-theme-1">Edit Account</h3>
                                                <hr class="w-50">
                                                <p class="text-secondary">Add your bank account detail to get paid.</p>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('profile.create')}}">
                                        <div class="card border-0 shadow" style="cursor: pointer;text-decoration: none;">
                                            <div class="card-body">
                                                <br>
                                                <img src="{{asset('front-assets/images/create.svg')}}" alt="img-2"
                                                     class="img-fluid how-work-img">
                                                <h3 class="font-weight-bold mt-3 text-theme-1">Add Account</h3>
                                                <hr class="w-50">
                                                <p class="text-secondary">Add your bank account detail to get paid.</p>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                            @if(!empty($template))
                                <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                                    <a target="_blank" href="{{route('template',$template->username)}}">
                                        <div class="card border-0 shadow" style="cursor: pointer;text-decoration: none;">
                                            <div class="card-body">
                                                <br>
                                                <img src="{{asset('front-assets/images/link.svg')}}" alt="img-3"
                                                     class="img-fluid how-work-img">
                                                <h3 class="font-weight-bold mt-3 text-theme-1">Share Profile</h3>
                                                <hr class="w-50">
                                                <p class="text-secondary">Share your profile with people to receive
                                                    blessings.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif

                            <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                                <a href="{{route('payments.history')}}">

                                    <div class="card border-0 shadow" style="cursor: pointer;text-decoration: none;">
                                        <div class="card-body">
                                            <br>
                                            <img src="{{asset('front-assets/images/delivered.svg')}}" alt="img-4"
                                                 class="img-fluid how-work-img">
                                            <h3 class="font-weight-bold mt-3 text-theme-1">Received Amount</h3>
                                            <hr class="w-50">
                                            <p class="text-secondary">Payment history of received blessings.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>


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
                        <p class="text-danger">Please double check the bank details. We won’t be responsible for any transfer made to wrong
                            bank account shared by you.</p>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th class="w-25">Name</th>
                                <td>{{ $profile->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Bank Name</th>
                                <td>{{ $profile->bank_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Account Number</th>
                                <td>{{ $profile->account_number ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>IFSC Code</th>
                                <td>{{ $profile->ifsc_code ?? '' }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

