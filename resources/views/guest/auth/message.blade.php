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
                                    <p>Welcome to {{trans('panel.site_title')}} , you are successfully registered with us.You will get account confirmation email once admin will verify your account.</p>
                                    <p>Your login credential is as follows.</p>
                                    <p>Email    - <span>{{$user->email}}</span>.</p>
                                    <p>password - <span>{{$token}}</span></p>
                                    <hr/>
                                    <a href="{{route('login',['email'=>$user->email])}}" class="btn btn-primary">Login</a>
                                    <hr>
                                    <span class="text-danger">Please do not share your login credentials with anyone for your account security,In case of password compromise please reset your password or contact us.</span>
                                    <p class="mb-0">Thank You For Joining Us.</p>
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
