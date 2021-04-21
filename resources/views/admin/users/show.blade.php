@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.mobile') }}
                        </th>
                        <td>
                            {{ $user->mobile }}
                        </td>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td>{{$user->address}}</td>
                        <th>City</th>
                        <td>{{$user->city}}</td>
                    </tr>
                     <tr>
                        <th>State</th>
                        <td>{{$user->state->name}}</td>
                        <th>PinCode</th>
                        <td>{{$user->pin_code}}</td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.approved') }}
                        </th>
                        <td>
                            <input type="checkbox"  {{ $user->approved ? 'checked' : '' }}>
                        </td>
                        <th>
                            {{ trans('cruds.user.fields.verified') }}
                        </th>
                        <td>
                            <input type="checkbox"  {{ $user->verified ? 'checked' : '' }}>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                        <th>
                            {{ trans('cruds.user.fields.mobile_verified_at') }}
                        </th>
                        <td>
                            {{ $user->mobile_verified_at }}
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#user_payments" role="tab" data-toggle="tab">
                Payments
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_templates" role="tab" data-toggle="tab">
                Template
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_profile" role="tab" data-toggle="tab">
                Bank Account Detail
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_payments">

        </div>
        <div class="tab-pane" role="tabpanel" id="user_templates">

        </div>
        <div class="tab-pane" role="tabpanel" id="user_profile">

        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">

        </div>
    </div>
</div>

@endsection
