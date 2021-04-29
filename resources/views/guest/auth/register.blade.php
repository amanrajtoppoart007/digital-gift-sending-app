@extends("guest.layout.app")
@section("content")
    <!-- Main (Start) -->
    <main id="main">

        <section id="second-section">
            <div class="container">
                <!-- Registration Form Card (Start) -->
                <div class="card border-0 shadow">
                    <form class="form-group"
                          id="user_registration_form" enctype="multipart/form-data" autocomplete="off">
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
                                        <label class="font-weight-bolder text-dark" for="mobile" id="mobile_title">Mobile <span class="text-danger ml-2 font-weight-bolder">*</span> </label>

                                        <div class="input-group mb-3">
                                            <input type="text" name="mobile" id="mobile" class="form-control mobile-validation" placeholder=""
                                                  maxlength="10" minlength="10"  pattern="[1-9]{1}[0-9]{9}" required autocomplete aria-label="User's Mobile" aria-describedby="basic-addon2">
                                            <div class="input-group-append" id="sendOTPButton" style="display: none;">
                                                <span class="input-group-text btn bg-theme-1 text-white" id="sendOTPButtonText">
                                                    Send OTP
                                                </span>
                                            </div>
                                        </div>
                                        <span class="text-danger my-1" id="mobile-validation-suggestion"></span>
                                        <div id="verify_otp_section" style="display: none;">
                                            <label class="font-weight-bolder text-dark" for="OTP">Verify Otp</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="OTP" name="OTP" value="" placeholder=""
                                                   aria-label="OTP" aria-describedby="verifyOTPButton">
                                            <div class="input-group-append">
                                                <span class="input-group-text btn bg-theme-1 text-white" id="verifyOTPButton">
                                                    Verify
                                                </span>
                                            </div>
                                        </div>
                                        </div>

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
                                                   autocomplete onKeyUp="checkPasswordStrength();">
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
                                    <div class="px-3">
                                      <span><strong id="password-strength-status"></strong></span>

                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12">

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="address">Address</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="text" name="address"
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
                                                  minlength="6"
                                                   maxlength="6"
                                                    pattern="[0-9]+"
                                                    onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"
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
                                                <span class="text-danger">Supported file types JPG, PNG, PDF</span>
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
                                                <span class="text-danger">Supported file types JPG, PNG, PDF</span>
                                            </div>

                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>
                        <!-- Card Body (End) -->

                        <!-- Card Footer -->
                        <div class="card-footer bg-white text-center">
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
@endsection


@section("script")
    <script>


        function checkPasswordStrength() {
            let number = /([0-9])/;
            let alphabets = /([a-zA-Z])/;
            let special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
             $('#password-strength-status').removeClass();
            if ($('#password').val().length < 6) {

                $('#password-strength-status').addClass('text-danger');
                $('#password-strength-status').html("Weak (should be at least 6 characters.)");
            } else {
                if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
                    $('#password-strength-status').addClass('text-success');
                    $('#password-strength-status').html("Your password strength is strong");
                    $("#strong-password-suggestion").hide();
                } else {
                    $('#password-strength-status').addClass('text-warning');
                    $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
                }
            }
        }
        $(document).ready(function () {

             let isVerified = false;

            $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}});


            $(document).on('keydown','.mobile-validation', function (e) {

                if (isNaN(String.fromCharCode(e.keyCode))&&(e.keyCode!==8)) {
                     $("#sendOTPButton").hide();
                    return false;
                }
                let mobile = $(this).val();
                let pattern = /^\d{9}$/;

                if(pattern.test(mobile))
                {
                    $("#mobile-validation-suggestion").hide();
                     if ($(this).val().length === 9) {
                        $("#sendOTPButton").show();
                    } else {
                        $("#sendOTPButton").hide();
                    }

                }
                else
                {
                    if(($(this).val().length> 9) && (!isNaN($(this).val()))&&(e.keyCode!==8))
                    {
                        return false;
                    }
                    $("#mobile-validation-suggestion").show();
                    $("#sendOTPButton").hide();
                    $("#mobile-validation-suggestion").html("Please enter 10 digit valid mobile number");

                }

            });

            $(document).on("keydown",".mobile-input-disabled",function(e){
                e.preventDefault();
                return false;
            });

            $("#sendOTPButton").on('click',function(){

                $.ajax({
                        url: "{{route('send.otp.user.registration')}}",
                        type: 'POST',
                        data: $('#user_registration_form').serialize(),
                        dataType: 'json',
                        beforeSend: function () {
                            $("#overlay").show();
                        },
                        success: function (res) {
                            if (res.response === "success")
                            {
                                $.notify(res.message, 'success', 'top-right');
                                $("#verify_otp_section").show();
                                $("#mobile").removeClass('mobile-validation');
                                $("#mobile").addClass('mobile-input-disabled');
                                $("#sendOTPButtonText").html("Re-send OTP");
                            } else {
                                $.notify(res.message, 'error', 'top-right');
                            }
                        },
                        error: function (jqXhr) {
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


            $("#verifyOTPButton").on("click", function (e) {
                e.preventDefault();

                    $.ajax({
                        url: "{{route('verify.otp.user.registration')}}",
                        type: 'POST',
                        data: {
                            mobile: $("#mobile").val(),
                            otp: $("#OTP").val()
                        },
                        dataType: 'json',
                        beforeSend: function () {
                            $("#overlay").show();
                        },
                        success: function (res) {
                            if (res.response === "success")
                            {
                                $("#verify_otp_section").hide();
                                $("#mobile_title").html(`<span>Mobile</span><small class="text-success ml-2">verified</small>`);
                                $("#mobile").addClass('is-valid');
                                $("#sendOTPButtonText").html('Send OTP');
                                $("#sendOTPButton").hide();
                                $.notify(res.message, 'success', 'top-right');
                                isVerified = true;

                            }
                            else
                            {

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




            $('#submit-button').mouseenter(function (){
                $(this).find('img').attr('src', "{{ asset('assets/assets/icons/circle-arrow-blue.svg') }}")
            });
            $('#submit-button').mouseleave(function (){
                $(this).find('img').attr('src', "{{ asset('assets/assets/icons/circle-arrow.svg') }}")
            });

            $('#toggle-password').click(function () {
                if($('#password').attr('type') === 'password'){
                    $('#password').attr('type', 'text');
                    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash')
                }else{
                    $('#password').attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye')
                }
            });
            $('#toggle-conf-password').click(function () {
                if($('#password_confirmation').attr('type') === 'password'){
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



            function registerUser()
            {
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
                        error: function (jqXhr) {
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


            $("#user_registration_form").on("submit", function (e) {
                e.preventDefault();
                if (isVerified) {
                       registerUser();
                } else {
                     $.notify('Please verify user mobile number first', 'error', 'top-right');
                }
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
