@extends("guest.layout.app")
@section("content")

    <main id="main">

        <!-- First Section (Start) -->
        <section id="first-section">
            <br>
            <div class="container" align="center">

                <h1 class="display-4 text-white font-weight-bold">Lorem ipsum dolor</h1>
                <hr class="w-25 bg-white">
                <h3 class="text-light">Keeping the current pandemic situation in mind, our team of young enthusiasts,
                    came up with this idea to create a platform where physical presence in not required to send or
                    receive the gifts. We want you to enjoy your special moment.</h3>

                <a href="{{route('register')}}" class="btn btn-lg btn-theme-2 m-1 shadow">Get Started</a>
            </div>
            <br>
        </section>
        <!-- First Section (End) -->

        <!-- Second Section (Start) -->
        <section id="second-section">
            <br>
            <div class="container" align="center">

                <hr class="w-25">
                <h1 class="text-theme-1 font-weight-bold">How it Works ?</h1>
                <hr class="w-25">
                <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br>
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud <br> exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
                <br>

                <div class="row mt-3">

                    <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                        <div class="card border-0 shadow">
                            <a href="{{ route('register') }}" class="card-body">
                                <br>
                                <img src="{{ asset('front-assets/images/account.svg') }}" alt="img-1"
                                     class="img-fluid how-work-img">
                                <h3 class="font-weight-bold mt-3 text-theme-1">Signup</h3>
                                <hr class="w-50">
                                <p class="text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos
                                    iste.</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <br>
                                <img src="{{ asset('front-assets/images/create.svg') }}" alt="img-2"
                                     class="img-fluid how-work-img">
                                <h3 class="font-weight-bold mt-3 text-theme-1">Create</h3>
                                <hr class="w-50">
                                <p class="text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos
                                    iste.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <br>
                                <img src="{{ asset('front-assets/images/link.svg') }}" alt="img-3"
                                     class="img-fluid how-work-img">
                                <h3 class="font-weight-bold mt-3 text-theme-1">Share</h3>
                                <hr class="w-50">
                                <p class="text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos
                                    iste.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <br>
                                <img src="{{ asset('front-assets/images/delivered.svg') }}" alt="img-4"
                                     class="img-fluid how-work-img">
                                <h3 class="font-weight-bold mt-3 text-theme-1">Recive</h3>
                                <hr class="w-50">
                                <p class="text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos
                                    iste.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <br>
        </section>
        <!-- Second Section (End) -->

        <!-- Third Section (Start) -->
        <section id="third-section">
            <br>
            <div class="container" align="center">

                <br>
                <hr class="w-25">
                <h1 class="text-theme-1 font-weight-bold">Why should you use our platform?</h1>
                <hr class="w-25">
                <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br>
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud <br> exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
                <br>

                <div class="row mt-3">

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card-body">
                            <div class="card feature-img-card">
                                <div class="card-body">
                                    <img src="{{ asset('front-assets/images/feature-1.svg') }}" alt="feature-1">
                                </div>
                            </div>
                            <h4 class="text-theme-1 mt-4 font-weight-bold">Quick registration</h4>
                            <hr class="w-50">
                            <p class="text-dark">Registration process is very simple. Just by filling some basic info,
                                you are good to start.</p>
                            <a href="#" class="card-link text-theme-1">Learn more <img
                                    src="{{ asset('front-assets/images/arrow-right-circle.svg') }}" class="ml-1"
                                    alt="learn more"></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card-body">
                            <div class="card feature-img-card">
                                <div class="card-body">
                                    <img src="{{ asset('front-assets/images/feature-2.svg') }}" alt="feature-2">
                                </div>
                            </div>
                            <h4 class="text-theme-1 mt-4 font-weight-bold">Easy to build page</h4>
                            <hr class="w-50">
                            <p class="text-dark">It’s very easy to build the page which you share with others.</p>
                            <a href="#" class="card-link text-theme-1">Learn more <img
                                    src="{{ asset('front-assets/images/arrow-right-circle.svg') }}" class="ml-1"
                                    alt="learn more"></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card-body">
                            <div class="card feature-img-card">
                                <div class="card-body">
                                    <img src="{{ asset('front-assets/images/feature-3.svg') }}" alt="feature-3">
                                </div>
                            </div>
                            <h4 class="text-theme-1 mt-4 font-weight-bold">Full control over page</h4>
                            <hr class="w-50">
                            <p class="text-dark">You have to control to change almost everything on page.</p>
                            <a href="#" class="card-link text-theme-1">Learn more <img
                                    src="{{ asset('front-assets/images/arrow-right-circle.svg') }}" class="ml-1"
                                    alt="learn more"></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card-body">
                            <div class="card feature-img-card">
                                <div class="card-body">
                                    <img src="{{ asset('front-assets/images/feature-3.svg') }}" alt="feature-3">
                                </div>
                            </div>
                            <h4 class="text-theme-1 mt-4 font-weight-bold">Real time update</h4>
                            <hr class="w-50">
                            <p class="text-dark">Data in dashboard is real time. You can see the exact amount you
                                received as blessing.</p>
                            <a href="#" class="card-link text-theme-1">Learn more <img
                                    src="{{ asset('front-assets/images/arrow-right-circle.svg') }}" class="ml-1"
                                    alt="learn more"></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card-body">
                            <div class="card feature-img-card">
                                <div class="card-body">
                                    <img src="{{ asset('front-assets/images/feature-3.svg') }}" alt="feature-3">
                                </div>
                            </div>
                            <h4 class="text-theme-1 mt-4 font-weight-bold">Fast customer support</h4>
                            <hr class="w-50">
                            <p class="text-dark">Our customer support is always willing to assist you in best possible
                                way.</p>
                            <a href="#" class="card-link text-theme-1">Learn more <img
                                    src="{{ asset('front-assets/images/arrow-right-circle.svg') }}" class="ml-1"
                                    alt="learn more"></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card-body">
                            <div class="card feature-img-card">
                                <div class="card-body">
                                    <img src="{{ asset('front-assets/images/feature-3.svg') }}" alt="feature-3">
                                </div>
                            </div>
                            <h4 class="text-theme-1 mt-4 font-weight-bold">Transparent</h4>
                            <hr class="w-50">
                            <p class="text-dark">We are fully transparent. That’s why, we share all the data with
                                you.</p>
                            <a href="#" class="card-link text-theme-1">Learn more <img
                                    src="{{ asset('front-assets/images/arrow-right-circle.svg') }}" class="ml-1"
                                    alt="learn more"></a>
                        </div>
                    </div>

                </div>

            </div>
            <br>
        </section>
        <!-- Third Section (End) -->

        <!-- Fourth Section (Start) -->
        <section id="fourth-section">
            <br>
            <div class="container">

                <h1 class="text-white font-weight-bold display-4">Lorem ipsum dolor sit</h1>
                <h3 class="text-light font-weight-bold">Iure, culpa? Quia eos dignissimos ipsa</h3>
                <p class="text-light">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi, numquam
                    exercitationem omnis illo veritatis, <br> libero nam maxime cupiditate ducimus totam delectus
                    reiciendis, quam atque ea deleniti perspiciatis laboriosam eveniet natus?</p>
                <a href="#" class="btn btn-theme-2 shadow">Learn more</a>

            </div>
            <br>
        </section>
        <!-- Fourth Section (End) -->

    </main>
    <!-- Main (End) -->
@endsection
