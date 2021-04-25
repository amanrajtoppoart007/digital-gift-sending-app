@extends("layouts.admin")
@section("head")
   @includeIf('layouts.share')
@endsection
@section('styles')
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
                <div class="py-2 justify-content-center text-right">
                    <h6>Share On</h6>
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
@endsection
