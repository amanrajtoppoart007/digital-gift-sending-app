@extends('guest.layout.app')
@section('content')
<main id="main">
    <section id="second-section">
        <div class="container">

            <div class="row justify-content-center mb-5">
    <div class="col-md-8">
        <a href="{{URL::to('/')}}" class="btn btn-theme-2 shadow my-2">
                    <img src="{{asset('assets/assets/icons/back.svg')}}" class="img-fluid btn-icon ml-0 mr-1">Back</a>
        <div class="card">
            <div class="card-body p-4">
                <h1 class="text-theme-1">{{ trans('panel.site_title') }}</h1>

                <p class="text-muted">{{ trans('global.login') }}</p>

                @if(session('message'))
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ request()->email?? old('email', null) }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>

                        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-4">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                {{ trans('global.remember_me') }}
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-theme-2 shadow">
                                {{ trans('global.login') }}
                                <img src="{{asset('assets/assets/icons/circle-arrow.svg')}}" alt="submit" class="btn-icon ml-2">
                            </button>
                        </div>
                        <div class="col-6 text-right">
                            @if(Route::has('password.request'))
                                <a class="card-link px-0" href="{{ route('password.request') }}">
                                    {{ trans('global.forgot_password') }}
                                </a><br>
                            @endif
                            <a class="card-link px-0" href="{{ route('register') }}">
                                {{ trans('global.register') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        </div>
    </section>

</main>
@endsection
