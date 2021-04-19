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
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <lable>{{ trans('cruds.user.fields.name') }}</lable>
                            <div class="font-weight-bold">{{ $user->name }}</div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <lable>{{ trans('cruds.user.fields.mobile') }}</lable>
                            <div class="font-weight-bold">{{ $user->mobile }}</div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <lable>{{ trans('cruds.user.fields.email') }}</lable>
                            <div class="font-weight-bold">{{ $user->mobile }}</div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <lable>{{ trans('cruds.user.fields.approved') }}</lable>
                            <div class="font-weight-bold">
                                <input type="checkbox" disabled="disabled" {{ $user->approved ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route("admin.users.add-profile", $user) }}" method="POST" enctype="multipart/form-data" id="profile-form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                       type="text" name="username" id="username" value="{{ old('username', '') }}"
                                       placeholder="Username" required>
                                @if($errors->has('username'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="banner">Banner</label>
                                <input class="form-control {{ $errors->has('banner') ? 'is-invalid' : '' }}" type="file"
                                       name="file" id="file" placeholder="Banner" required>
                                <input type="hidden" name="banner" id="banner" value="">
                                @if($errors->has('banner'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('banner') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                          name="description" id="description" placeholder="Description"
                                          rows="2">{{ old('description', '') }}</textarea>
                                @if($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
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
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#user-earned-payments" role="tab" data-toggle="tab">
                    User Earned Payments
                </a>
            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="user-earned-payments">

            </div>

        </div>
    </div>

@endsection


@section("scripts")
    <script>
        $(document).ready(function () {
            $("#file").on("change", function () {

                let form = new FormData(document.getElementById('profile-form'));

                $.ajax({
                    url: "{{route('upload.registration.media')}}",
                    type: 'POST',
                    data: form,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#overlay").show();
                    },
                    success: function (response) {
                        if (response.name) {
                            $("#banner").val(response.name)
                        } else {
                            toastr.error("File upload failed", '', {
                                progressBar: true,
                                timeOut: 2000
                            });
                            alert("File upload failed")
                        }
                    },
                    error: function (jqXhr, json, errorThrown) {

                        let data = jqXhr.responseJSON;

                        if (data.errors) {
                            $.each(data.errors, function (index, item) {
                                $(`#${index}`).addClass("is-invalid").tooltip({title: item[0]});
                                alert(item[0])
                            })
                        }
                        if (data.message) {
                            alert(data.message);
                        }
                    },

                    complete: function () {
                        $("#overlay").hide();
                    }
                });
            });

            $("#user_registration_form").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('store.user.registration')}}",
                    type: 'POST',
                    data: $('#user_registration_form').serialize(),
                    dataType: 'json',
                    beforeSend: function () {
                        $("#overlay").show();
                    },
                    success: function (res) {
                        if (res.response === "success") {
                            toastr.success("Registration successful", '', {
                                progressBar: true,
                                timeOut: 2000
                            });
                            window.open(res.url, '_self');
                        } else {
                            toastr.error(res.message, '', {
                                progressBar: true,
                                timeOut: 2000
                            });
                        }
                    },
                    error: function (jqXhr, json, errorThrown) {
                        console.log('errr')
                        let data = jqXhr.responseJSON;

                        if (data.errors) {
                            $.each(data.errors, function (index, item) {
                                $(`#${index}`).addClass("is-invalid").tooltip({title: item[0]});
                                toastr.error(item[0], '', {
                                    progressBar: true,
                                    timeOut: 2000
                                });
                            })
                        }
                        if (data.message) {
                            toastr.error(data.message, '', {
                                progressBar: true,
                                timeOut: 2000
                            });
                        }
                    },

                    complete: function () {
                        $("#overlay").hide();
                    }
                });
            });


        });
    </script>
@endsection
