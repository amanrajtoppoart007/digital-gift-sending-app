@extends("guest.layout.view")
@section('meta')
    <meta property="og:title" content="{{$template->banner_title}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="Keeping the current pandemic situation in mind, our team of young enthusiasts,
                    came up with this idea to create a platform where physical presence in not required to send or
                    receive the gifts. We want you to enjoy your special moment"/>
    <meta property="og:url" content="{{route('template',$template->username)}}"/>
    <meta property="og:image" content="{{$template->banner_image->thumb}}"/>
@endsection
@section("head")
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6081b96b1c703400184e0d6d&product=sop' async='async'></script>
@endsection
@section("styles")
    <style>
        div.background-image-section {
            background-image: url("{{$template->banner_image->url}}");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        div.card-header-content
        {
            min-height: 300px;
        }
    </style>
@endsection
@section('content')
    <main id="main">
        <section id="second-section" class="py-2">
            <div class="container">
                @if(request()->has('retry'))
                    <div class="card my-5">
                        <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                <p>Payment gateway returned failure response,You can retry again</p>
                                <p>If amount deducted from your account,write as at help@example.com and mention the
                                    UserId : {{$template->username}}</p>
                                @if(request()->has('message'))
                                    {!! request()->input('message') !!}}
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header background-image-section">
                        <div class="d-flex flex-column justify-content-center align-items-center card-header-content">
                        <h1 class="font-weight-bold text-white my-auto text-center">{{$template->banner_title}}</h1>
                    </div>
                    </div>
                    <div class="card-body">

                <div class="text-center mb-3">
                    <p class="lead">{!! $template->description !!}.</p>
                </div>
                    <div class="card">
                        <div class="card-body">
                            <form id="store_payment_form" method="post" action="{{route('gift.store')}}">
                                @csrf
                            <input type="hidden" name="payment_type" value="{{$template->payment_type}}">
                            <input type="hidden" name="username" value="{{$template->username}}">
                            <input type="hidden" name="user_id" value="{{$template->user_id}}">
                            <input type="hidden" name="template_id" value="{{$template->id}}">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="row">

                                    @if($template->payment_type==='with_sender_detail')
                                        @foreach($template->inputs as $input)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @php
                                                        $inputFile = "partials.input.$input";
                                                    @endphp
                                                    @if($input=='state')
                                                        @includeIf($inputFile,['states'=>$states,'readonly'=>true])
                                                    @else
                                                        @includeIf($inputFile,['readonly'=>true])
                                                    @endif

                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="amount" id="amount" class="form-control"
                                                   minlength="3"
                                                   maxlength="10"
                                                   placeholder="Amount"
                                                   pattern="[0-9]+"
                                                   onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"
                                                   value="" required>
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <textarea type="text" name="short_note" id="short_note" class="form-control" placeholder="Add Note"></textarea>
                                            </div>
                                        </div>

                                </div>
                                        @if(($template->payment_type==='with_sender_detail')&&(!empty($template->inputs)))

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       id="consent" required>
                                                <label class="form-check-label" for="consent">
                                                    By clicking on this button, you provide your
                                                consent to share your name,mobile and
                                                address with {{trans('panel.site_title')}}.
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                             <div class="form-group mx-3 d-block text-center">
                                 <button type="submit" class="btn btn-success">Send Gift</button>
                             </div>
                            </form>
                        </div>
                    </div>
                <div class="py-2 justify-content-center">
                    <h6>Share this page</h6>
                    <div
                        class="sharethis-inline-share-buttons"
                        data-url="{{route('template',$template->username)}}"
                        data-image="{{$template->banner_image->thumb}}"
                        data-title="{{$template->title}}"
                        data-description="Hey there,here is my profile url , where you can send blessings to me very easy , safe and secure."
                    >

                    </div>
                </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
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
