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
            <a class="nav-link" href="#user_orders" role="tab" data-toggle="tab">
                {{ trans('cruds.order.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_articles" role="tab" data-toggle="tab">
                {{ trans('cruds.article.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_article_comments" role="tab" data-toggle="tab">
                {{ trans('cruds.articleComment.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_followers" role="tab" data-toggle="tab">
                {{ trans('cruds.follower.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#follow_followers" role="tab" data-toggle="tab">
                {{ trans('cruds.follower.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_article_likes" role="tab" data-toggle="tab">
                {{ trans('cruds.articleLike.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_transactions" role="tab" data-toggle="tab">
                {{ trans('cruds.transaction.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_addresses" role="tab" data-toggle="tab">
                {{ trans('cruds.userAddress.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_profiles" role="tab" data-toggle="tab">
                {{ trans('cruds.userProfile.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_orders">

        </div>
        <div class="tab-pane" role="tabpanel" id="user_articles">

        </div>
        <div class="tab-pane" role="tabpanel" id="user_article_comments">

        </div>
        <div class="tab-pane" role="tabpanel" id="user_followers">

        </div>
        <div class="tab-pane" role="tabpanel" id="follow_followers">

        </div>
        <div class="tab-pane" role="tabpanel" id="user_article_likes">

        </div>
        <div class="tab-pane" role="tabpanel" id="user_transactions">

        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_addresses">

        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_profiles">

        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">

        </div>
    </div>
</div>

@endsection
