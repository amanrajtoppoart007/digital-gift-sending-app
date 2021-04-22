@extends("layouts.admin")
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div
                    style="background-image: url('{{$template->banner_image->url}}'); background-repeat: no-repeat;background-size: cover;-moz-background-size: cover;
                        -o-background-size: cover;opacity: 0.8;" class="jumbotron jumbotron mt-3">
                    <div style="min-height: 200px;"
                         class="d-flex flex-column justify-content-center align-items-center">
                        <h1 class="font-weight-bold text-white my-auto text-center">{{$template->banner_title}}</h1>
                    </div>
                </div>
                <div class="class">
                    <h3 class="font-weight-bold">About Us</h3>
                    <p class="lead">{!! $template->description !!}.</p>
                    <a href="{{route('admin.template.edit',['id'=>$template->id])}}" class="btn btn-success">Edit Template</a>
                </div>
            </div>
        </div>
    </div>
@endsection
