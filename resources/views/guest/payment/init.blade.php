@extends("user.layout.app")
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h6 class="font-weight-bold text-white">Payment Detail</h6>
            </div>
            <div class="card-body">
                @if(request()->has('retry'))
                        <div class="alert alert-danger" role="alert">
                            <p>Payment gateway returned failure response,You can retry again</p>
                            <p>If amount deducted from your account,write as at help@example.com and mention the UserId : {{$template->username}}</p>
                            @if(request()->has('message'))
                                {!! request()->input('message') !!}}
                            @endif
                        </div>
                    @endif
                <form id="store_payment_form" action="{{route('gift.store')}}">
                    @csrf
                    <input type="hidden" name="payment_type" value="{{$template->payment_type}}">
                    <input type="hidden" name="username" value="{{$template->username}}">
                    <input type="hidden" name="user_id" value="{{$template->user_id}}">
                    <input type="hidden" name="template_id" value="{{$template->id}}">
                    <table class="table">
                    <tbody>
                    <tr>
                        <th>Amount</th>
                        <td>
                            <input type="text" name="amount" id="amount" class="form-control" minlength="3" maxlength="10"
                             pattern="[0-9]+"  onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"     value="" required>
                        </td>
                        <th></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Paying to</th>
                        <td>{{$template->user->name}}</td>
                        <th>Address</th>
                        <td>{{str_replace(',,',',',$template->user->address.','.$template->user->city.','.$template->user->state->name??null)}}</td>
                    </tr>
                    @if($template->payment_type==='with_sender_detail')
                        <tr>
                            <th>Name</th>
                            <td>
                                <input type="text" name="name" id="name" class="form-control" value=""
                                       placeholder="Enter your name" required>
                            </td>
                            <th>Email</th>
                            <td>
                                <input type="email" name="email" id="email" class="form-control" value=""
                                       placeholder="Enter your email" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Mobile No</th>
                            <td>
                                <input type="text" name="mobile" id="mobile" class="form-control" value=""
                                   pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10"
                                       onkeypress=" if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"  placeholder="Enter your mobile number" required>
                            </td>
                            <th>Address</th>
                            <td>
                                <textarea name="address" id="address" class="form-control"
                                          placeholder="Enter your address" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>
                                <select class="form-control" name="state_id" id="state_id">
                                    <option value="" disabled selected>Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <th>City</th>
                            <td>
                                <input type="text" name="city" id="city" class="form-control" value=""
                                       placeholder="Enter your city" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Pincode</th>
                            <td>
                                <input type="text" name="pin_code" id="pin_code" class="form-control" value=""
                                       placeholder="Enter your pincode" minlength="6" maxlength="6"
                             pattern="[0-9]+"  onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"  required>
                            </td>
                            <th></th>
                            <td></td>
                        </tr>
                    @endif

                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#store_payment_form").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('gift.store')}}",
                    type: 'POST',
                    data: $('#store_payment_form').serialize(),
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
                                console.log(index);
                                $(`#${index}`).addClass("is-invalid").tooltip({title: item[0]});
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
        });
    </script>
@endsection

