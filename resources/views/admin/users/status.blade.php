<script>
    $(document).ready(function () {
        $(document).on('change', '.user-approval-status', function (e) {
            if (confirm("Are you sure want to change approved status?")) {
                $.ajax({
                    headers: {'x-csrf-token': _token},
                    url: "{{route('admin.users.changeApprovalStatus')}}",
                    type: 'POST',
                    data: {
                        id: $(this).attr('data-id'),
                        status: $(this).attr('data-status')
                    },
                    dataType: 'json',
                    beforeSend: function () {
                        $("#overlay").show();
                    },
                    success: function (res) {
                        if (res.response === "success") {
                            $.notify(res.message, 'success', 'top-right');

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
            } else {
                if (this.checked) {
                    $(this).prop('checked', false)
                } else {
                    $(this).prop('checked', true)
                }
            }
        })
        $(document).on('change', '.user-verification-status', function (e) {
            if (confirm("Are you sure want to change verified status?")) {
                $.ajax({
                    headers: {'x-csrf-token': _token},
                    url: "{{route('admin.users.changeVerificationStatus')}}",
                    type: 'POST',
                    data: {
                        id: $(this).attr('data-id'),
                        status: $(this).attr('data-status')
                    },
                    dataType: 'json',
                    beforeSend: function () {
                        $("#overlay").show();
                    },
                    success: function (res) {
                        if (res.response === "success") {
                            $.notify(res.message, 'success', 'top-right');

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
            } else {
                if (this.checked) {
                    $(this).prop('checked', false)
                } else {
                    $(this).prop('checked', true)
                }

            }
        })
    });
</script>
