@extends("user.layout.app")
@section("content")
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h6 class="font-weight-bold text-white">Change Password</h6>
            </div>
            <div class="card-body">
                <form id="passwordForm" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="current_password"><strong>Current Password </strong> <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="current_password"
                                       name="current_password" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="password"><strong>Password </strong> <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="password_confirmation"><strong>Confirm Password </strong> <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password_confirmation"
                                       name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#passwordForm").on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('password.change.submit')}}",
                    type: 'POST',
                    data: $('#passwordForm').serialize(),
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
