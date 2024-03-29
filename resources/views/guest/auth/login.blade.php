@extends('guest.layout.app')
@section("styles")
    <style>
        .password-input-box {
            border-right: 0 !important;
        }

        .view-password-button {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-left: 0 !important;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-clip: padding-box;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        .view-password-button a {
            color: #0e0e0e;
        }
    </style>
@endsection
@section('content')
<main id="main">
    <section id="second-section">
        <div class="container">

            <div class="row justify-content-center mb-5">
    <div class="col-md-8">
{{--        <a href="{{URL::to('/')}}" class="btn btn-theme-2 shadow my-2">--}}
{{--                    <img src="{{asset('assets/assets/icons/back.svg')}}" class="img-fluid btn-icon ml-0 mr-1">Back</a>--}}
        <div class="card">
            <div class="card-body p-4">
                <h1 class="text-theme-1">{{ trans('panel.site_title') }}</h1>

                <p class="text-muted">User login</p>

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

                    <div class="mt-3">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" id="password"
                                   class="form-control bg-transparent text-left password-input-box {{ $errors->has('password') ? ' is-invalid' : '' }}" required
                                   placeholder="{{ trans('global.login_password') }}">
                            <div class="input-group-append view-password-button">
                                <a href="javascript:void(0)"  id="toggle-password"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
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
                            <button type="submit" id="submit-button" class="btn btn-theme-2 shadow">
                                {{ trans('global.login') }}
                                <img src="{{asset('assets/assets/icons/circle-arrow.svg')}}" alt="submit" class="btn-icon ml-2">
                            </button>
                        </div>
                        <div class="col-6 text-right">
                            @if(Route::has('password.request'))
                                <a class="card-link px-0" href="{{ route('password.request') }}">
                                    Forgot password?
                                </a><br>
                            @endif
                            <span>New to Online Aashirvaad? </span>
                            <a class="card-link px-0" href="{{ route('register') }}">
                                Sign Up!
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


@section("script")
    <script>
        $(document).ready(function () {

            $('#submit-button').mouseenter(function (){
                $(this).find('img').attr('src', "{{ asset('assets/assets/icons/circle-arrow-blue.svg') }}")
            });
            $('#submit-button').mouseleave(function (){
                $(this).find('img').attr('src', "{{ asset('assets/assets/icons/circle-arrow.svg') }}")
            });

            $('#toggle-password').click(function () {
                if($('#password').attr('type') == 'password'){
                    $('#password').attr('type', 'text');
                    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash')
                }else{
                    $('#password').attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye')
                }
            });
        });
    </script>
@endsection

