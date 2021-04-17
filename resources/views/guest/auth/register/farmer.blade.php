@extends("guest.layout.app")
@section("content")

    <!-- Main (Start) -->
    <main data-aos="fade-in">

        <!-- Section First (Start) -->
        <section class="bg-light" id="registration-form-section">
            <br>
            <div class="container">

                <!-- Back Buttton -->
                <a href="{{ route('register') }}" class="btn btn-theme-1 btn-sm rounded shadow"><img
                        src="{{ asset('assets/assets/icons/back.svg') }}" class="img-fluid btn-icon ml-0 mr-1">Back to
                    Dashboard</a>
                <br>
                <br>

                <!-- Registration Form Card (Start) -->
                <div class="card border-0 shadow">

                    <form class="form-group"
                          id="farmer_registration_form">
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
                                        <label class="font-weight-bolder text-dark" for="secondary_mobile">Alternative
                                            Mobile</label><label class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="number" name="secondary_mobile"
                                               class="input-group-text bg-transparent w-100 text-left"
                                               id="secondary_mobile" required>
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
                                        <label class="font-weight-bolder text-dark"
                                               for="district_id">District</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <select class="custom-select select2 w-100" name="district_id" id="district_id"
                                                required>
                                            <option value="" disabled selected>Select District</option>
                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="block_id">Block</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <select class="custom-select select2 w-100" name="block_id" id="block_id"
                                                required>
                                            <option value="" disabled selected>Select Block</option>
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="pincode_id">Pincode</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <select class="custom-select select2 w-100" name="pincode_id" id="pincode_id"
                                                required>
                                            <option value="" disabled selected>Select Pincode</option>
                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="village">Village</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="text" name="village" id="village"
                                               class="input-group-text bg-transparent w-100 text-left" required>
                                    </div>


                                </div>

                            </div>

                            <br>

                            <!-- Farmming Details (Start) -->
                            <hr class="mt-2">
                            <h5 class="font-weight-bolder text-theme-1">Farming Details</h5>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="crops">What crops do you
                                            grow</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <select class="custom-select w-100 select2" name="crops[]" id="crops"
                                                aria-label="crops"
                                                multiple="multiple">
                                            <option disabled selected value="">Select Crop</option>
                                            @foreach($crops as $crop)
                                                <option value="{{$crop->id}}">{{$crop->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12">

                                    <div class="mt-3">
                                        <label class="font-weight-bolder text-dark" for="agricultural_land">Agricultural
                                            Land</label><label
                                            class="text-danger ml-2 font-weight-bolder">*</label>
                                        <input type="text" name="agricultural_land"
                                               class="input-group-text bg-transparent w-100 text-left"
                                               id="agricultural_land" required>
                                    </div>

                                </div>
                            </div>
                            <!-- Farmming Details (End) -->

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
                            <button type="submit" class="btn btn-theme-1 rounded px-4">Submit<img
                                    src="{{ asset('assets/assets/icons/circle-arrow.svg') }}" alt="submit"
                                    class="btn-icon"></button>
                        </div>

                    </form>
                </div>
                <!-- Registration Form Card (End) -->

            </div>
            <br>
        </section>
        <!-- Section First (End) -->

    </main>
    <!-- Main (End) -->
@endsection

@section("script")
    <script>
        $(document).ready(function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}});


            $("#farmer_registration_form").on("submit", function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{route('store.farmer.register')}}",
                    type: 'POST',
                    data: $("#farmer_registration_form").serialize(),
                    dataType: 'json',
                    beforeSend: function () {
                        $("#overlay").show();
                    },
                    success: function (res) {
                        if (res.response === "success") {
                            $.notify("Farmers registration successful", 'white');
                            window.open(res.url, '_self');
                        } else {
                            $.notify(res.message, 'white');
                        }


                    },
                    error: function (jqXhr, json, errorThrown) {
                        console.log('errr')
                        let data = jqXhr.responseJSON;

                        if (data.errors) {
                            $.each(data.errors, function (index, item) {
                                $(`#${index}`).addClass("is-invalid").tooltip({title: item[0]});

                                $.notify(item[0], 'white');
                            })
                        }
                        if (data.message) {
                            $.notify(data.message, 'white');
                        }
                    },

                    complete: function () {
                        $("#overlay").hide();
                    }
                });
            });

            $("#state_id").on("change", function () {

                $("#district_id").empty();
                $.ajax({
                    url: "{{route('ajax.district.list')}}",
                    type: 'POST',
                    data: {'state_id': $(this).val()},
                    dataType: 'json',
                    success: function (res) {
                        if (res.response === "success") {
                            let option = $($.parseHTML(`<option value="">Select District</option>`));
                            $("#district_id").append(option);
                            $.each(res.data, function (key, item) {
                                let $option = $($.parseHTML(`<option value="${item.id}">${item.name}</option>`));
                                $("#district_id").append($option);
                            });
                            // $("#district_id").select2();
                        }


                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            });

            $("#district_id").on("change", function () {

                let $_option = `<option value="1">Demo Block</option>`;

                $("#block_id").empty();
                $.ajax({
                    url: "{{route('ajax.block.list')}}",
                    type: 'POST',
                    data: {'district_id': $(this).val()},
                    dataType: 'json',
                    success: function (res) {
                        if (res.response === "success") {
                            let option = $($.parseHTML(`<option value="">Select Block</option>`));
                            $("#block_id").append(option);
                            $.each(res.data, function (key, item) {
                                let $option = $($.parseHTML(`<option value="${item.id}">${item.name}</option>`));
                                $("#block_id").append($option);
                            });

                            // $("#block_id").select2();
                        } else {
                            $("#block_id").append($_option);
                        }


                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            });

            $("#block_id").on("change", function () {

                let $_option = `<option value="1">Demo Block</option>`;

                $("#pincode_id").empty();
                $.ajax({
                    url: "{{route('ajax.pincode.list')}}",
                    type: 'POST',
                    data: {'block_id': $(this).val()},
                    dataType: 'json',
                    success: function (res) {
                        if (res.response === "success") {
                            let option = $($.parseHTML(`<option value="">Select Pincode</option>`));
                            $("#pincode_id").append(option);
                            $.each(res.data, function (key, item) {
                                let $option = $($.parseHTML(`<option value="${item.id}">${item.pincode}</option>`));
                                $("#pincode_id").append($option);
                            });

                            // $("#pincode_id").select2();
                        } else {
                            $("#pincode_id").append($_option);
                        }


                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            });

        });
    </script>
@endsection
