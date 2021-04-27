@extends("guest.layout.app")
@section("content")
    <!-- Main (Start) -->
    <main id="main">

        <section id="second-section">
            <div class="container">
                <div class="card border-0 shadow">
                    <form class="form-group"
                          id="user_registration_form" enctype="multipart/form-data">
                    @csrf
                    <!-- Card Header -->
                        <!-- Card Body (Start) -->
                        <div class="card-body">

                            <h5 class="font-weight-bolder text-theme-1">Personal Details</h5>
                            <div class="row">
                                <input type="hidden" name="account_type" value="{{ $user->account_type }}">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="col-lg-6 col-md-12 col-sm-12">

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark">Name</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input value="{{ $user->name }}"
                                               class="form-control input-group-text bg-transparent w-100 text-left"
                                               disabled>
                                    </div>

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark">Mobile</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input value="{{ $user->mobile }}"

                                               class="form-control input-group-text bg-transparent w-100 text-left"
                                               disabled>
                                    </div>


                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark">Email</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input value="{{ $user->email }}"
                                               class="form-control input-group-text bg-transparent w-100 text-left"
                                               disabled>
                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12">

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark">Address</label>
                                        <input value="{{ $user->address }}"
                                               class="form-control input-group-text bg-transparent w-100 text-left"
                                               id="address"
                                               disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark">City</label>
                                        <input type="text" value="{{ $user->city }}"
                                               class="form-control input-group-text bg-transparent w-100 text-left"
                                               disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark">State</label>
                                        <input type="text" value="{{ $user->state->name }}"
                                               class="form-control input-group-text bg-transparent w-100 text-left"
                                               disabled>
                                    </div>

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="pin_code">Pincode</label>
                                        <input type="text" name="pin_code" id="pin_code" value="{{ $user->pin_code }}"
                                               class="form-control input-group-text bg-transparent w-100 text-left"
                                               disabled>
                                    </div>

                                    <div class="mt-3">

                                        <div class="row">
                                            <div class="col">
                                                <h6>Account type</h6>
                                            </div>
                                            <div class="col form-check">
                                                <input class="form-check-input" type="radio" disabled
                                                    {{ $user->account_type == 'self' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="checkbox-for-self">
                                                    Creating for self
                                                </label>
                                            </div>
                                            <div class="col form-check">
                                                <input class="form-check-input" type="radio" disabled
                                                    {{ $user->account_type != 'self' ? 'checked' : '' }}>
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
                                                       class="input-group-text bg-transparent w-100 text-left"
                                                       accept=".jpg, .jpeg, .png, .pdf" required>
                                                <input type="hidden" name="identity_proof" id="identity_proof" value="">
                                            </div>
                                            <div
                                                class="col other-person-id-proof-div {{ $user->account_type != 'self' ? '' : 'd-none' }}">
                                                <label class="font-weight-bolder text-dark"
                                                       for="identity_proof_other_person">Id
                                                    card of other person </label><label
                                                    class="text-danger ml-2 font-weight-bolder">*</label>
                                                <input type="file" name="identity_proof_other_file"
                                                       id="identity_proof_other_file" accept=".jpg, .jpeg, .png, .pdf"
                                                       class="input-group-text bg-transparent w-100 text-left" {{ $user->account_type != 'self' ? 'required' : '' }}>
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
        $(document).ready(function () {

            let isVerified = false;

            $('#submit-button').mouseenter(function () {
                $(this).find('img').attr('src', "{{ asset('assets/assets/icons/circle-arrow-blue.svg') }}")
            });
            $('#submit-button').mouseleave(function () {
                $(this).find('img').attr('src', "{{ asset('assets/assets/icons/circle-arrow.svg') }}")
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
                $.ajax({
                    url: "{{route('upload.submit')}}",
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

            });
        });
    </script>
@endsection
