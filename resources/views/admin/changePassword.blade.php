@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Change Password
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('admin.password.change.submit') }}">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="required" for="current_password">Current Password</label>
                            <input class="form-control {{ $errors->has('current_password') ? 'is-invalid' : '' }}" type="password" name="current_password" id="current_password" required>
                            @if($errors->has('current_password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('current_password') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="required" for="password">New Password</label>
                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="required" for="password_confirmation">Confirm New Password</label>
                            <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" name="password_confirmation" id="password_confirmation" required>
                            @if($errors->has('password_confirmation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
