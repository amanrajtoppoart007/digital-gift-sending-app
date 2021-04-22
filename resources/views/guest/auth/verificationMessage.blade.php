@extends("guest.layout.app")
@section("content")
    <main data-aos="fade-in">
        <!-- Section First (Start) -->
        <section class="bg-light mt-4">
            <br>
            <div class="container">
                <div class="row justify-content-center my-5">
                    <div class="col-12 col-md-8 col-sm-8 col-lg-8 col-xl-8">
                        <div class="card border-0 shadow mt-3">
                            <div class="card-body">
                                <div class="text-success" role="alert">
                                    <h4 class="alert-heading">Well done!</h4>
                                    <p>{{ $message }}</p>
                                    <a href="{{route('login',['email'=>$user->email])}}" class="btn btn-primary">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </section>
        <!-- Section First (End) -->
    </main>
    <!-- Main (End) -->
@endsection
