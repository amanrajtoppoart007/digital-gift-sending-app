@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                               name="name" id="name" value="{{ old('name', $user->name) }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="required" for="mobile">{{ trans('cruds.user.fields.mobile') }}</label>
                        <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text"
                               name="mobile" id="mobile" value="{{ old('mobile', $user->mobile) }}" required>
                        @if($errors->has('mobile'))
                            <div class="invalid-feedback">
                                {{ $errors->first('mobile') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.mobile_helper') }}</span>
                    </div>




                    <div class="form-group">
                        <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                               name="email" id="email" value="{{ old('email', $user->email) }}" required>
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                               name="password" id="password">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <div class="form-check {{ $errors->has('approved') ? 'is-invalid' : '' }}">
                            <input type="hidden" name="approved" value="0">
                            <input class="form-check-input" type="checkbox" name="approved" id="approved"
                                   value="1" {{ $user->approved || old('approved', 0) === 1 ? 'checked' : '' }}>
                            <label class="form-check-label"
                                   for="approved">{{ trans('cruds.user.fields.approved') }}</label>
                        </div>
                        @if($errors->has('approved'))
                            <div class="invalid-feedback">
                                {{ $errors->first('approved') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.approved_helper') }}</span>
                    </div>


                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">


                    <div class="form-group">
                        <label for="address">{{ trans('cruds.userAddress.fields.address') }}</label>
                        <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address"
                                  id="address">{{ old('address', $user->address) }}</textarea>
                        @if($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.userAddress.fields.address_helper') }}</span>
                    </div>



                    <div class="form-group">
                        <label class="required" for="state_id">{{ trans('cruds.userAddress.fields.state') }}</label>
                        <select class="form-control select2 {{ $errors->has('state') ? 'is-invalid' : '' }}"
                                name="state_id" id="state_id" required>
                            @foreach($states as $id => $state)
                                <option
                                    value="{{ $id }}" {{ (old('state_id') ? old('state_id') : $user->state->id ?? '') == $id ? 'selected' : '' }}>{{ $state }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('state'))
                            <div class="invalid-feedback">
                                {{ $errors->first('state') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.userAddress.fields.state_helper') }}</span>
                    </div>











            <div class="form-group">
                <label class="required" for="pincode">{{ trans('cruds.userAddress.fields.pincode') }}</label>

                <input class="form-control {{ $errors->has('pin_code') ? 'is-invalid' : '' }}" type="text" name="pincode" id="pincode" value="{{ old('pincode', $user->pin_code) }}" required>

                @if($errors->has('pin_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pin_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userAddress.fields.pincode_helper') }}</span>
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

