@extends('layouts.admin')
@section('content')
    <style>
        .underline-none {
            text-decoration: none !important;
        }

        .font-20 {
            font-size: 30px !important;
        }
    </style>
    <div class="content">
        <div class="row">
            <div class="col-8">
                <!--User Management -->
                @can('user_management_access')
                    <div class="card">
                        <div class="card-header bg-secondary"><i
                                class="fas fa-fw fa-users"></i> {{ trans('cruds.userManagement.title') }}</div>
                        <div class="card-body">
                            <div class="row">
                                @can('user_access')
                                    <div class="col-4">
                                        <a href="{{ route("admin.users.index") }}" class="text-dark underline-none">
                                            <img class="align-middle" width="30" height="30"
                                                 src="{{ asset('img/menu/black/group.svg') }}" alt="">
                                            <span class="ml-2">{{ trans('cruds.user.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                <div class="col-4">
                                    <a href="{{ route("admin.enquiries.index") }}" class="text-dark underline-none">
                                        <img class="align-middle" width="30" height="30"
                                             src="{{ asset('img/menu/black/customer-service-agent.svg') }}" alt="">
                                        <span class="ml-2">Enquiries</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endcan
            <!--User Management -->
                <!--Payment Management -->

                <div class="card">
                    <div class="card-header bg-secondary"><i
                            class="fas fa-fw fa-money-bill"></i> Payments
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-4">
                                <a href="{{ route("admin.payments.index") }}" class="text-dark underline-none">
                                    <img class="align-middle" width="30" height="30"
                                         src="{{ asset('img/menu/black/credit-card.svg') }}" alt="">
                                    <span class="ml-2">Payments</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{ route("admin.transactions.index") }}" class="text-dark underline-none">
                                    <img class="align-middle" width="30" height="30"
                                         src="{{ asset('img/menu/black/money-transaction.svg') }}" alt="">
                                    <span class="ml-2">Transactions</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Payment Management -->
                <!--Admin Management -->
                @can('admin_management_access')
                    <div class="card">
                        <div class="card-header bg-secondary"><i
                                class="fas fa-fw fa-users-cog"></i> {{ trans('cruds.adminManagement.title') }}</div>
                        <div class="card-body">
                            <div class="row">
                                @can('permission_access')
                                    <div class="col-4">
                                        <a href="{{ route("admin.permissions.index") }}"
                                           class="text-dark underline-none">
                                            <img class="align-middle" width="30" height="30"
                                                 src="{{ asset('img/menu/black/privacy.svg') }}" alt="">

                                            <span class="ml-2">{{ trans('cruds.permission.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('role_access')
                                    <div class="col-4">
                                        <a href="{{ route("admin.roles.index") }}" class="text-dark underline-none">
                                            <img class="align-middle" width="30" height="30"
                                                 src="{{ asset('img/menu/black/role.svg') }}" alt="">
                                            <span class="ml-2">{{ trans('cruds.role.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('admin_access')
                                    <div class="col-4">
                                        <a href="{{ route("admin.admins.index") }}" class="text-dark underline-none">
                                            <img class="align-middle" width="30" height="30"
                                                 src="{{ asset('img/menu/black/administrative.svg') }}" alt="">

                                            <span class="ml-2">{{ trans('cruds.admin.title') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
            @endcan
            <!--Admin Management -->

                <!--Settings Management -->
                <div class="card">
                    <div class="card-header bg-secondary"><i
                            class="fa fa-fw fa-cogs"></i> {{ trans('cruds.setting.title') }}</div>
                    <div class="card-body">
                        <div class="row">
                            @can('setting_access')
                                <div class="col-4">
                                    <a href="{{ route("admin.settings.index") }}" class="text-dark underline-none">
                                        <img class="align-middle" width="30" height="30"
                                             src="{{ asset('img/menu/black/settings.svg') }}" alt="">
                                        <span class="ml-2">{{ trans('cruds.setting.title') }}</span>
                                    </a>
                                </div>
                            @endcan

                            @can('user_alert_access')
                                <div class="col-4">
                                    <a href="{{ route("admin.user-alerts.index") }}" class="text-dark underline-none">
                                        <img class="align-middle" width="30" height="30"
                                             src="{{ asset('img/menu/black/notification.svg') }}" alt="">
                                        <span class="ml-2">{{ trans('cruds.userAlert.title') }}</span>
                                    </a>
                                </div>
                            @endcan
                            <div class="col-4">
                                <a href="{{ route("admin.messages.index") }}" class="text-dark underline-none">
                                    <img class="align-middle" width="30" height="30"
                                         src="{{ asset('img/menu/black/comment.svg') }}" alt="">
                                    <span class="ml-2">Messages</span>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-4">

                            @can('profile_password_edit')
                                <div class="col-4">
                                    <a href="{{ route('admin.password.change') }}" class="text-dark underline-none">
                                        <img class="align-middle" width="30" height="30"
                                             src="{{ asset('img/menu/black/password.svg') }}" alt="">
                                        <span class="ml-2">{{ trans('global.change_password') }}</span>
                                    </a>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
                <!--Settings Management -->
            </div>
            <!-- Right Side -->
            <div class="col-4">
                <div class="card">
                    <div class="card-header bg-secondary">
                        Dashboard
                    </div>
                    <div class="card-body">

                        <div class="card text-white bg-danger text-center">
                            <div class="card-body pb-0">
                                <div class="text-value font-20">{{ number_format($settings2['total_number']) }}</div>
                                <div>{{ $settings2['chart_title'] }}</div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Side -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        Statistics
                    </div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">

                            <div class="{{ $chart9->options['column_class'] }}">
                                <h3>{!! $chart9->options['chart_title'] !!}</h3>
                                {!! $chart9->renderHtml() !!}
                            </div>
                            <div class="{{ $chart10->options['column_class'] }}">
                                <h3>{!! $chart10->options['chart_title'] !!}</h3>
                                {!! $chart10->renderHtml() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart9->renderJs() !!}{!! $chart10->renderJs() !!}
@endsection
