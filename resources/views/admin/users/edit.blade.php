@extends('layouts.admin')
@section('content')
    <form class="form-group" id="user_registration_form" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">

            <h5 class="font-weight-bold">Edit User Details</h5>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="mt-3">
                        <label class="font-weight-bolder text-dark" for="name">Name</label><label
                            class="text-danger ml-2 font-weight-bolder">*</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" required>
                    </div>

                    <div class="mt-3">
                        <label class="font-weight-bolder text-dark" for="mobile">Mobile</label><label
                            class="text-danger ml-2 font-weight-bolder">*</label>
                        <input type="number" name="mobile"
                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               id="mobile" maxlength="10"
                               pattern="[1-9]{1}[0-9]{9}"
                               class="form-control"  value="{{$user->mobile}}" required autocomplete>
                    </div>


                    <div class="mt-3">
                        <label class="font-weight-bolder text-dark" for="email">Email</label><label
                            class="text-danger ml-2 font-weight-bolder">*</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}" required autocomplete>
                    </div>

                    <div class="mt-3">
                        <label class="font-weight-bolder text-dark"
                               for="password">Password</label><label
                            class="text-danger ml-2 font-weight-bolder">*</label>
                        <input type="password" name="password" id="password" class="form-control" required autocomplete>
                    </div>

                    <div class="mt-3">
                        <label class="font-weight-bolder text-dark" for="address">Address</label><label
                            class="text-danger ml-2 font-weight-bolder">*</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{$user->address}}" required>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">


                    <div class="mt-3">
                        <label class="font-weight-bolder text-dark" for="state_id">State</label><label
                            class="text-danger ml-2 font-weight-bolder">*</label>
                        <select class="custom-select select2 w-100" name="state_id" id="state_id"
                                required>
                            <option value="" disabled selected>Select State</option>
                            @foreach($states as $id=>$state)
                                <option value="{{$id}}" {{$id===$user->state_id?'selected':''}}>{{$state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="font-weight-bolder text-dark" for="city">City</label><label
                            class="text-danger ml-2 font-weight-bolder">*</label>
                        <input type="text" name="city" id="city" class="form-control" value="{{$user->city}}" required>
                    </div>

                    <div class="mt-3">
                        <label class="font-weight-bolder text-dark" for="pin_code">Pincode</label><label
                            class="text-danger ml-2 font-weight-bolder">*</label>
                        <input type="number" name="pin_code" id="pin_code"
                               maxlength="6"
                               pattern="[0-9]+"
                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               class="form-control" value="{{$user->pin_code}}" required>
                    </div>

                    <div class="mt-3">

                        <div class="row">
                            <div class="col">
                                <h6>Account type</h6>
                            </div>
                            @foreach($account_types as $account)
                            <div class="col form-check">
                                <input class="form-check-input" type="radio" value="{{$account['value']}}" name="account_type"
                                       id="{{$account['id']}}" checked>
                                <label class="form-check-label" for="{{$account['id']}}">
                                    {{$account['title']}}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="font-weight-bolder text-dark" for="identity_proof">Id
                                    card self </label><label
                                    class="text-danger ml-2 font-weight-bolder">*</label>
                                <input type="file" name="identity_proof_file" id="identity_proof_file"
                                       class="form-control" required>
                                <input type="hidden" name="identity_proof" id="identity_proof" value="">
                            </div>
                            <div class="col other-person-id-proof-div" {{$user->account_type==='other-person'?'':'style="display: none"'}} >
                                <label class="font-weight-bolder text-dark" for="identity_proof_other_person">Id
                                    card of other person </label><label
                                    class="text-danger ml-2 font-weight-bolder">*</label>
                                <input type="file" name="identity_proof_other_file" id="identity_proof_other_file"
                                       class="form-control" {{$user->account_type==='other-person'?'required':''}}>
                                <input type="hidden" name="identity_proof_other_person" id="identity_proof_other_person"
                                       value="" >
                            </div>
                        </div>

                    </div>


                </div>
            </div>

        </div>
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-primary shadow">Update<img src="{{ asset('assets/assets/icons/circle-arrow.svg') }}" alt="submit" class="btn-icon ml-2"></button>
        </div>
    </div>
    </form>
@endsection
@section("scripts")
    <script>
        $(document).ready(function () {

            $("#identity_proof_file").on("change",function(){

                let form = new FormData();
                form.append('file',$("#identity_proof_file")[0].files[0]);
                form.append('_token','{{csrf_token()}}');

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
                        if (response.name)
                        {
                            $("#identity_proof").val(response.name)

                        } else
                        {
                           $.notify('File upload failed','error','top-right');
                        }


                    },
                    error: function () {

                        $.notify('File upload failed','error','top-right');
                    },

                    complete: function () {
                        $("#overlay").hide();
                    }
                });
            });


            $("#identity_proof_other_file").on("change",function(){

                let form = new FormData();
                form.append('file',$("#identity_proof_other_file")[0].files[0]);
                form.append('_token','{{csrf_token()}}');
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
                        if (response.name)
                        {
                            $("#identity_proof_other_person").val(response.name)

                        } else
                        {
                            $.notify('File upload failed','error','top-right');
                        }


                    },
                    error: function () {

                       $.notify('File upload failed','error','top-right');
                    },

                    complete: function () {
                        $("#overlay").hide();
                    }
                });
            });


            $("#user_registration_form").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('admin.users.update',$user->id)}}",
                    type: 'PUT',
                    data: $('#user_registration_form').serialize(),
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
                    error: function (jqXhr, json, errorThrown) {
                        let data = jqXhr.responseJSON;

                        if (data.errors) {
                            let error = '';
                            $.each(data.errors, function (index, item) {
                               error += item[0]+"\n";
                            });

                             $.notify(error,'error','top-right');
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
            });
        });
    </script>
@endsection

