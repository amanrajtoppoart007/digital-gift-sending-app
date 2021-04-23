@extends("user.layout.app")
@section("head")
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6081b96b1c703400184e0d6d&product=sop' async='async'></script>
@endsection
@section('content')
 <div class="py-3">
     <div style="background-image: url('{{$template->banner_image->url}}'); background-repeat: no-repeat;background-size: cover;-moz-background-size: cover;
  -o-background-size: cover;opacity: 0.8;" class="jumbotron jumbotron mt-3">
         <div style="min-height: 200px;" class="d-flex flex-column justify-content-center align-items-center">
             <h1 class="font-weight-bold text-white my-auto text-center">{{$template->banner_title}}</h1>
         </div>
      </div>
     <div class="text-center">
         <h3 class="font-weight-bold">About Us</h3>
         <p class="lead">{!! $template->description !!}.</p>
         <a href="{{route('template.edit',['id'=>$template->id])}}" class="btn btn-success">Edit Template</a>
     </div>
     <div>
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
@endsection
