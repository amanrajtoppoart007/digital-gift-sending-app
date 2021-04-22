@extends("user.layout.app")
@section("content")
    <div class="py-2">
        @includeIf('user.includes.back-home')
        <div class="card">
            <div class="card-header bg-info">
                <h6 class="font-weight-bold text-white">Edit Bank Account Detail</h6>
            </div>
            <div class="card-body">
                <form id="edit_bank_detail_form" method="post" action="{{route('profile.update',$profile->id)}}">
                    @csrf
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name"><strong>Name </strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$profile->name}}" required>
                        </div>
                    </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="bank_name"><strong>Name Of Bank </strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{$profile->bank_name}}" required>
                        </div>
                        </div>

                </div>
                     <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="account_number"><strong>A/C -No. </strong> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="account_number" name="account_number" value="{{$profile->account_number}}" required>
                                </div>
                            </div>
                          <div class="col-md-8">
                                <div class="form-group">
                                    <label for="ifsc_code"><strong>IFSC Code </strong> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" value="{{$profile->ifsc_code}}" required>
                                </div>
                            </div>

                        </div>
                    <button type="submit" class="btn btn-primary">Edit Account</button>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('script')
     <script>
        $(document).ready(function(){
            $("#edit_bank_detail_form").on('submit',function(e){
                e.preventDefault();
                 $.ajax({
                    url: "{{route('profile.update',$profile->id)}}",
                    type: 'PUT',
                    data: $('#edit_bank_detail_form').serialize(),
                    dataType: 'json',
                    beforeSend: function () {
                        $("#overlay").show();
                    },
                    success: function (res) {
                        if (res.response === "success")
                        {
                            $.notify(res.message,'success','top-right');
                            window.open(res.url, '_self');
                        } else
                            {
                             $.notify(res.message,'error','top-right');
                           }
                    },
                    error: function (jqXhr) {

                        let data = jqXhr.responseJSON;
                        if (data.errors) {
                            let error = '';
                            $.each(data.errors, function (index, item)
                            {
                               error += item[0]+"\n";
                            });

                             $.notify(error,'error','top-right');
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
