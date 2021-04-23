@extends("user.layout.app")
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="my-1">
                    @includeIf('user.includes.back-home')
                </div>
                <div class="card">
                    <div class="card-header">
                        Edit Profile
                    </div>
                    <div class="card-body" style="min-height:450px">
                        <form id="profileForm" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="username"><strong>Name </strong> <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{$user->name}}"
                                       aria-describedby="name_help">
                            </div>
                            <div class="form-group">
                                <label for="state_id"><strong>State </strong> <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select select2" name="state_id" id="state_id"
                                        required>
                                    <option value="" disabled selected>Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}" {{ $user->state_id == $state->id ? 'selected' : '' }}>{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="city"><strong>City </strong> <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="city" name="city"
                                       value="{{$user->city}}"
                                       aria-describedby="city_help">
                            </div>
                            <div class="form-group">
                                <label for="pin_code"><strong>Pincode </strong> <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="pin_code" name="pin_code"
                                       value="{{$user->pin_code}}"
                                       aria-describedby="pin_code_help">
                            </div>
                            <div class="form-group">
                                <label for="description"><strong>Address </strong> <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="address" name="address"
                                          aria-describedby="address_help">{{ $user->address }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        $(document).ready(function () {
            $("#profileForm").on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('profile.update')}}",
                    type: 'POST',
                    data: $('#profileForm').serialize(),
                    dataType: 'json',
                    beforeSend: function () {
                        $("#overlay").show();
                    },
                    success: function (res) {
                        if (res.response === "success") {
                            $.notify(res.message, 'success', 'top-right');
                            window.location = "{{ route('home') }}"
                        } else {
                            $.notify(res.message, 'error', 'top-right');
                        }
                    },
                    error: function (jqXhr, json, errorThrown) {

                        let data = jqXhr.responseJSON;
                        if (data.errors) {
                            let error = '';
                            $.each(data.errors, function (index, item) {
                                console.log(index);
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
            })
        });
    </script>
@endsection
