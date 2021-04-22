@extends("guest.layout.app")
@section("content")
 <main id="main">
     <section id="second-section" class="py-2">
            <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        @if(!empty($message))
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Success!</h4>
                                <p>{{$message}}.</p>
                                <hr>
                                <p class="mb-0"></p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
     </section>
 </main>
@endsection
