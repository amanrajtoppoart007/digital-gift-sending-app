@extends("guest.layout.app")
@section("content")
    <!-- Main (Start) -->
    <main id="main">

        <section id="second-section">
            <div class="container">

                <!-- Back Buttton -->
{{--                <a href="{{ URL::to('/') }}" class="btn btn-theme-2 shadow">--}}
{{--                    <img--}}
{{--                        src="{{ asset('assets/assets/icons/back.svg') }}" class="img-fluid btn-icon ml-0 mr-1">Back</a>--}}
{{--                <br>--}}
{{--                <br>--}}

                <!-- Registration Form Card (Start) -->
                <div class="card border-0 shadow">
                    <form class="form-group"
                          id="user_registration_form" enctype="multipart/form-data">
                    @csrf
                    <!-- Card Header -->
                        <div class="card-header bg-white" align="center">
                            <h4 class="font-weight-bolder text-theme-1 mt-2">Fill the Registration Details</h4>
                            <span class="description-1 ml-3 text-secondary">We don’t use your data other than the verification of your identity to make sure that appropriate use of this platform.</span>
                        </div>

                        <!-- Card Body (Start) -->
                        <div class="card-body">

                            <h5 class="font-weight-bolder text-theme-1">Personal Details</h5>
                            <div class="row">

                                <div class="col-lg-6 col-md-12 col-sm-12">

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="name">Name</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="text" name="name" id="name"
                                               class="form-control input-group-text bg-transparent w-100 text-left" required>
                                    </div>

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="mobile">Mobile</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="number" name="mobile"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               id="mobile" maxlength="10" minlength="10"
                                               pattern="[1-9]{1}[0-9]{9}" required
                                               class="form-control input-group-text bg-transparent w-100 text-left" required
                                               autocomplete>
                                    </div>


                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="email">Email</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="email" name="email" id="email"
                                               class="form-control input-group-text bg-transparent w-100 text-left" required
                                               autocomplete>
                                    </div>

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark"
                                               for="password">Password</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password" id="password"
                                                   class="form-control input-group-text bg-transparent text-left" required
                                                   autocomplete>
                                            <div class="input-group-append">
                                                <button class="btn" type="button" id="toggle-password"><i class="fa fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="password_confirmation">Confirm
                                            Password</label><label class="text-danger ml-2 font-weight-bolder">*</label>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                   class="form-control input-group-text bg-transparent text-left" required
                                                   autocomplete="false">
                                            <div class="input-group-append">
                                                <button class="btn" type="button" id="toggle-conf-password"><i class="fa fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-3 text-danger">
                                        <ul>
                                            <li>Must be at least 8 characters long.</li>
                                            <li>Should contain at-least 1 Uppercase.</li>
                                            <li>Should contain at-least 1 Lowercase.</li>
                                            <li>Should contain at-least 1 Numeric.</li>
                                            <li>Should contain at-least 1 special character.</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12">

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="address">Address</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="address" name="address"
                                               class="form-control input-group-text bg-transparent w-100 text-left" id="address"
                                               required>
                                    </div>
                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="city">City</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="text" name="city" id="city"
                                               class="form-control input-group-text bg-transparent w-100 text-left" required>
                                    </div>
                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="state_id">State</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <select class="custom-select select2 w-100" name="state_id" id="state_id"
                                                required>
                                            <option value="" disabled selected>Select State</option>
                                            @foreach($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="pin_code">Pincode</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="text" name="pin_code" id="pin_code"
                                               class="form-control input-group-text bg-transparent w-100 text-left" required>
                                    </div>

                                    <div class="mt-3">

                                        <div class="row">
                                            <div class="col">
                                                <h6>Account type</h6>
                                            </div>
                                            <div class="col form-check">
                                                <input class="form-check-input" type="radio" value="self"
                                                       name="account_type" id="checkbox-for-self" checked>
                                                <label class="form-check-label" for="checkbox-for-self">
                                                    Creating for self
                                                </label>
                                            </div>
                                            <div class="col form-check">
                                                <input class="form-check-input" type="radio" value="other-person"
                                                       name="account_type" id="checkbox-for-on-behalf">
                                                <label class="form-check-label" for="checkbox-for-on-behalf">
                                                    Creating on behalf of other person
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bolder text-dark" for="identity_proof">Id
                                                    card self </label><label
                                                    class="text-danger ml-2 font-weight-bolder">*</label>
                                                <input type="file" name="identity_proof_file" id="identity_proof_file"
                                                       class="input-group-text bg-transparent w-100 text-left" accept=".jpg, .jpeg, .png, .pdf" required>
                                                <input type="hidden" name="identity_proof" id="identity_proof" value="">
                                            </div>
                                            <div class="col other-person-id-proof-div" style="display: none">
                                                <label class="font-weight-bolder text-dark"
                                                       for="identity_proof_other_person">Id
                                                    card of other person </label><label
                                                    class="text-danger ml-2 font-weight-bolder">*</label>
                                                <input type="file" name="identity_proof_other_file"
                                                       id="identity_proof_other_file" accept=".jpg, .jpeg, .png, .pdf"
                                                       class="input-group-text bg-transparent w-100 text-left">
                                                <input type="hidden" name="identity_proof_other_person"
                                                       id="identity_proof_other_person" value="">
                                            </div>
                                            <div class="col-12 text-danger">
                                                Supported file types JPG, PNG, PDF
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>
                        <!-- Card Body (End) -->

                        <!-- Card Footer -->
                        <div class="card-footer bg-white" align="center">
                            <div class="form-check-inline">
                                <input type="checkbox" name="terms" class="custom-checkbox mt-n3 mr-2"
                                       id="agree_checkbox" value="accept" required>
                                <p class="description-1">
                                    <span>By clicking here,you agree with our</span>
                                    <a target="_blank" href="{{route('terms')}}" class="card-link">terms &
                                        conditions </a>
                                    <span>and</span>
                                    <a target="_blank" href="{{route('privacy')}}" class="card-link">privacy policy</a>
                                </p>
                            </div>
                            <br>
                            <button type="submit" id="submit-button" class="btn btn-theme-2 shadow">Submit<img
                                    src="{{ asset('assets/assets/icons/circle-arrow.svg') }}" alt="submit"
                                    class="btn-icon ml-2"></button>
                            <div class="mt-3">
                                Already a member? <a href="{{ route('login') }}" class="card-link">Login</a>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- Registration Form Card (End) -->

            </div>
            <br>
        </section>

    </main>
    <!-- Main (End) -->

    <div class="modal" id="otpModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="OtpModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="OtpModalTitle">Verify Otp</h5>
                </div>
                <div class="modal-body">
                    <form id="otpForm">
                        <input type="hidden" id="otp_mobile" name="mobile" required>
                        <div class="form-group">
                            <input type="text" name="otp" id="otp" placeholder="Enter otp"
                                   class="input-group-text bg-transparent w-100 text-left" required>
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-primary">Verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section("script")
    <script>
        $(document).ready(function () {

            let isVerified = false;

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
            $('#toggle-conf-password').click(function () {
                if($('#password_confirmation').attr('type') == 'password'){
                    $('#password_confirmation').attr('type', 'text');
                    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash')
                }else{
                    $('#password_confirmation').attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye')
                }
            });

            $("#identity_proof_file").on("change", function () {

                let form = new FormData();
                form.append('file', $("#identity_proof_file")[0].files[0]);

                $.ajax({
                    url: "{{route('upload.media')}}",
                    type: 'POST',
                    data: form,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#overlay").show();
                    },
                    success: function (response) {
                        if (response.name) {
                            $("#identity_proof").val(response.name)

                        } else {
                            $.notify('File upload failed', 'error', 'top-right');
                        }

                    },
                    error: function () {

                        $.notify('File upload failed', 'error', 'top-right');
                    },

                    complete: function () {
                        $("#overlay").hide();
                    }
                });
            });


            $("#identity_proof_other_file").on("change", function () {

                let form = new FormData();
                form.append('file', $("#identity_proof_other_file")[0].files[0]);

                $.ajax({
                    url: "{{route('upload.media')}}",
                    type: 'POST',
                    data: form,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#overlay").show();
                    },
                    success: function (response) {
                        if (response.name) {
                            $("#identity_proof_other_person").val(response.name)

                        } else {
                            $.notify('File upload failed', 'error', 'top-right');
                        }

                    },
                    error: function () {
                        $.notify('File upload failed', 'error', 'top-right');
                    },

                    complete: function () {
                        $("#overlay").hide();
                    }
                });
            });


            $("#user_registration_form").on("submit", function (e) {
                e.preventDefault();
                if (isVerified) {
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

                                $.notify(res.message, 'success', 'top-right');
                                window.open(res.url, '_self');
                            } else {

                                $.notify(res.message, 'error', 'top-right');
                            }
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let data = jqXhr.responseJSON;

                            if (data.errors) {
                                let error = '';
                                $.each(data.errors, function (index, item) {
                                    $(`#${index}`).addClass("is-invalid").tooltip({title: item[0]});
                                    error += item[0] + "\n";
                                });

                                $.notify(error, 'error', 'top-right');
                            }

                        },

                        complete: function () {
                            $("#overlay").hide();
                        }
                    });
                } else {
                    $.ajax({
                        url: "{{route('send.otp.user.registration')}}",
                        type: 'POST',
                        data: $('#user_registration_form').serialize(),
                        dataType: 'json',
                        beforeSend: function () {
                            $("#overlay").show();
                        },
                        success: function (res) {
                            if (res.response === "success") {
                                $.notify(res.message, 'success', 'top-right');
                                $('#otp_mobile').val($('#mobile').val());
                                $('#otpModal').modal({backdrop: 'static', keyboard: false, show: true});
                            } else {
                                $.notify(res.message, 'error', 'top-right');
                            }
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let data = jqXhr.responseJSON;

                            if (data.errors) {
                                let error = '';
                                $.each(data.errors, function (index, item) {
                                    $(`#${index}`).addClass("is-invalid").tooltip({title: item[0]});
                                    error += item[0] + "\n";
                                });

                                $.notify(error, 'error', 'top-right');
                            }

                        },

                        complete: function () {
                            $("#overlay").hide();
                        }
                    });
                }
            });

            $("#otpForm").on("submit", function (e) {
                e.preventDefault();

                    $.ajax({
                        url: "{{route('verify.otp.user.registration')}}",
                        type: 'POST',
                        data: $('#otpForm').serialize(),
                        dataType: 'json',
                        beforeSend: function () {
                            $("#overlay").show();
                        },
                        success: function (res) {
                            if (res.response === "success") {

                                $.notify(res.message, 'success', 'top-right');
                                isVerified = true;
                                $('#user_registration_form').submit();
                                $('#otpModal').modal('hide');
                            } else {

                                $.notify(res.message, 'error', 'top-right');
                            }
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let data = jqXhr.responseJSON;

                            if (data.errors) {
                                let error = '';
                                $.each(data.errors, function (index, item) {
                                    $(`#${index}`).addClass("is-invalid").tooltip({title: item[0]});
                                    error += item[0] + "\n";
                                });

                                $.notify(error, 'error', 'top-right');
                            }

                        },

                        complete: function () {
                            $("#overlay").hide();
                        }
                    });

            });


            $("input[name='account_type']").on('click', function () {
                if ($(this).val() === 'self') {
                    $(".other-person-id-proof-div").hide();
                    $("#identity_proof_other_file").attr({'required': false});
                } else {
                    $(".other-person-id-proof-div").show();
                    $("#identity_proof_other_file").attr({'required': true});
                }
            })


        });
    </script>
@endsection
