@extends("guest.layout.app")
@section("content")
    <!-- Main (Start) -->
    <main id="main">

        <section id="second-section">
            <div class="container">

                <!-- Back Buttton -->
                <a href="{{ URL::to('/') }}" class="btn btn-theme-2 shadow">
                    <img
                        src="{{ asset('assets/assets/icons/back.svg') }}" class="img-fluid btn-icon ml-0 mr-1">Back</a>
                <br>
                <br>

                <!-- Registration Form Card (Start) -->
                <div class="card border-0 shadow">
                    <form class="form-group"
                          id="user_registration_form" enctype="multipart/form-data">
                    @csrf
                    <!-- Card Header -->
                        <div class="card-header bg-white" align="center">
                            <h4 class="font-weight-bolder text-theme-1 mt-2">Fill the Registration Details</h4>
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
                                               class="input-group-text bg-transparent w-100 text-left" required>
                                    </div>

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="mobile">Mobile</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="number" name="mobile"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               id="mobile" maxlength="10"
                                               pattern="[1-9]{1}[0-9]{9}" required
                                               class="input-group-text bg-transparent w-100 text-left" required>
                                    </div>


                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="email">Email</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="email" name="email" id="email"
                                               class="input-group-text bg-transparent w-100 text-left" required>
                                    </div>

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark"
                                               for="password">Password</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="password" name="password" id="password"
                                               class="input-group-text bg-transparent w-100 text-left" required>
                                    </div>

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="confirm_password">Confirm
                                            Password</label><label class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="password" name="confirm_password" id="confirm_password"
                                               class="input-group-text bg-transparent w-100 text-left" required>
                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12">

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="address">Address</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="address" name="address"
                                               class="input-group-text bg-transparent w-100 text-left" id="address"
                                               required>
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
                                        <label class="font-weight-bolder text-dark" for="city">City</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="text" name="city" id="city"
                                               class="input-group-text bg-transparent w-100 text-left" required>
                                    </div>

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="pin_code">Pincode</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="text" name="pin_code" id="pin_code"
                                               class="input-group-text bg-transparent w-100 text-left" required>
                                    </div>

                                    <div class="mt-3">

                                        <div class="row">
                                            <div class="col">
                                                <h6>Account type</h6>
                                            </div>
                                            <div class="col form-check">
<input class="form-check-input" type="radio" value="self" name="account_type" id="checkbox-for-self" checked>
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
                                               class="input-group-text bg-transparent w-100 text-left" required>
                                        <input type="hidden" name="identity_proof" id="identity_proof" value="">
                                            </div>
                                            <div class="col other-person-id-proof-div" style="display: none">
                                                <label class="font-weight-bolder text-dark" for="identity_proof_other_person">Id
                                            card of other person </label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="file" name="identity_proof_other_file" id="identity_proof_other_file"
                                               class="input-group-text bg-transparent w-100 text-left">
                                        <input type="hidden" name="identity_proof_other_person" id="identity_proof_other_person" value="">
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
                                       id="agree_checkbox" required>
                                <p class="description-1">By Registering with us,you agree with our <a href="#"
                                                                                                      class="card-link">terms
                                        & conditions </a>and <a href="#" class="card-link">privacy policy</a></p>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-theme-2 shadow">Submit<img
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

            $("#identity_proof_file").on("change",function(){

                let form = new FormData();
                form.append('file',$("#identity_proof_file")[0].files[0]);

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
                        if (response.name)
                        {
                            $("#identity_proof").val(response.name)

                        } else
                        {
                            toastr.error("File upload failed", '', {
                                progressBar: true,
                                timeOut: 2000
                            });
                        }


                    },
                    error: function (jqXhr, json, errorThrown) {

                        let data = jqXhr.responseJSON;

                        if (data.errors) {
                            $.each(data.errors, function (index, item) {
                                $(`#${index}`).addClass("is-invalid").tooltip({title: item[0]});
                                toastr.success(item[0], '', {
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


            $("#identity_proof_other_file").on("change",function(){

                let form = new FormData();
                form.append('file',$("#identity_proof_other_file")[0].files[0]);

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
                        if (response.name)
                        {
                            $("#identity_proof_other_person").val(response.name)

                        } else
                        {
                            toastr.error("File upload failed", '', {
                                progressBar: true,
                                timeOut: 2000
                            });
                        }


                    },
                    error: function (jqXhr, json, errorThrown) {

                        let data = jqXhr.responseJSON;

                        if (data.errors) {
                            $.each(data.errors, function (index, item) {
                                $(`#${index}`).addClass("is-invalid").tooltip({title: item[0]});
                                toastr.success(item[0], '', {
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


            $("input[name='account_type']").on('click',function(){
                if($(this).val()==='self')
                {
                    $(".other-person-id-proof-div").hide();
                    $("#identity_proof_other_file").attr({'required':false});
                }
                else
                {
                    $(".other-person-id-proof-div").show();
                    $("#identity_proof_other_file").attr({'required':true});
                }
            })




        });
    </script>
@endsection
