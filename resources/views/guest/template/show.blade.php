@extends("guest.layout.app")
@section("head")
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60800a553637330018507269&product=inline-share-buttons" async="async"></script>
@endsection
@section('content')
 <div class="container">
     <div style="background-image: url('{{$template->banner_image->url}}'); background-repeat: no-repeat;background-size: cover;-moz-background-size: cover;
  -o-background-size: cover;opacity: 0.8;" class="jumbotron jumbotron mt-3">
         <div style="min-height: 200px;" class="d-flex flex-column justify-content-center align-items-center">
             <h1 class="font-weight-bold text-white my-auto text-center">{{$template->banner_title}}</h1>
         </div>
      </div>
     <div>
         <h3 class="font-weight-bold">About Us</h3>
         <p class="lead">{!! $template->description !!}.</p>
         <a class="btn btn-success" href="{{route('gift.init',$template->username)}}">Send Blessings</a>
     </div>
     <div>
       <div class="sharethis-inline-share-buttons"></div>
     </div>
 </div>
@endsection
