<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website description">

    <!-- Bootstrap 4.5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Google Fonts Nunito -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/index.css') }}">

    <!-- Website Title -->
    <title>Website Title</title>

</head>

<body>

<!-- Header (Start) -->
<header id="header">
    <nav class="navbar navbar-expand-md shadow-sm">
        <div class="container py-3">
            <a href="#" class="navbar-brand logo font-weight-bold">Logo</a>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav ml-auto">
                    <hr>
                    <li class="nav-item mx-auto px-1">
                        <a href="{{ route('index') }}" class="nav-link text-secondary">Home</a>
                    </li>
                    <hr>
                    <li class="nav-item mx-auto px-1"><a href="#" class="nav-link text-secondary">How it Works</a></li>
                    <hr>
                    <li class="nav-item mx-auto px-1"><a href="#" class="nav-link text-secondary">Why us</a></li>
                    <hr>
                    <li class="nav-item mx-auto px-1"><a href="#" class="nav-link text-secondary">Contact us</a></li>
                    <hr>
                </ul>
            </div>
            <div class="ml-auto">
                <a href="{{ route('register') }}" class="btn btn-theme-1 mx-1 shadow-sm">Register</a>
                <a href="{{ route('login') }}" class="btn btn-theme-2 mx-1 shadow-sm">Login</a>
            </div>
            <button class="navbar-toggler" id="navbar-toggler">
                <img src="{{ asset('front-assets/images/menu.svg') }}" alt="navbar-menu">
            </button>
        </div>
    </nav>
</header>
<!-- Header (End) -->

<!-- Main (Start) -->
<main id="main">

    <!-- First Section (Start) -->
    <section id="first-section">
        <br>
        <div class="container" align="center">

            <h1 class="display-4 text-white font-weight-bold">Lorem ipsum dolor</h1>
            <hr class="w-25 bg-white">
            <h3 class="text-light">Utenim ad minim veniam,
                quis nostrud et dolore magna aliqua</h3>
            <hr class="w-25 bg-white">
            <div class="px-lg-5 px-md-3 px-sm-1">
                <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br>
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud <br> exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
            </div>

            <a href="#" class="btn btn-lg btn-theme-2 m-1 shadow">Get Started</a>
            <a href="{{ route('register') }}" class="btn btn-lg btn-theme-2 m-1 shadow">Register</a>
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
                            <img src="{{ asset('front-assets/images/account.svg') }}" alt="img-1" class="img-fluid how-work-img">
                            <h3 class="font-weight-bold mt-3 text-theme-1">Signup</h3>
                            <hr class="w-50">
                            <p class="text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos iste.</p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <br>
                            <img src="{{ asset('front-assets/images/create.svg') }}" alt="img-2" class="img-fluid how-work-img">
                            <h3 class="font-weight-bold mt-3 text-theme-1">Create</h3>
                            <hr class="w-50">
                            <p class="text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos iste.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <br>
                            <img src="{{ asset('front-assets/images/link.svg') }}" alt="img-3" class="img-fluid how-work-img">
                            <h3 class="font-weight-bold mt-3 text-theme-1">Share</h3>
                            <hr class="w-50">
                            <p class="text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos iste.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <br>
                            <img src="{{ asset('front-assets/images/delivered.svg') }}" alt="img-4" class="img-fluid how-work-img">
                            <h3 class="font-weight-bold mt-3 text-theme-1">Recive</h3>
                            <hr class="w-50">
                            <p class="text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos iste.</p>
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
            <h1 class="text-theme-1 font-weight-bold">Why us ?</h1>
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
                        <h4 class="text-theme-1 mt-4 font-weight-bold">First Feature</h4>
                        <hr class="w-50">
                        <p class="text-dark">Lorem ipsum dolor sit amet consectetur <br> adipisicing elit. Fugiat sapiente consequatur.</p>
                        <a href="#" class="card-link text-theme-1">Learn more <img src="{{ asset('front-assets/images/arrow-right-circle.svg') }}" class="ml-1" alt="learn more"></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card-body">
                        <div class="card feature-img-card">
                            <div class="card-body">
                                <img src="{{ asset('front-assets/images/feature-2.svg') }}" alt="feature-2">
                            </div>
                        </div>
                        <h4 class="text-theme-1 mt-4 font-weight-bold">Second Feature</h4>
                        <hr class="w-50">
                        <p class="text-dark">Lorem ipsum dolor sit amet consectetur <br> adipisicing elit. Fugiat sapiente consequatur.</p>
                        <a href="#" class="card-link text-theme-1">Learn more <img src="{{ asset('front-assets/images/arrow-right-circle.svg') }}" class="ml-1" alt="learn more"></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card-body">
                        <div class="card feature-img-card">
                            <div class="card-body">
                                <img src="{{ asset('front-assets/images/feature-3.svg') }}" alt="feature-3">
                            </div>
                        </div>
                        <h4 class="text-theme-1 mt-4 font-weight-bold">Third Feature</h4>
                        <hr class="w-50">
                        <p class="text-dark">Lorem ipsum dolor sit amet consectetur <br> adipisicing elit. Fugiat sapiente consequatur.</p>
                        <a href="#" class="card-link text-theme-1">Learn more <img src="{{ asset('front-assets/images/arrow-right-circle.svg') }}" class="ml-1" alt="learn more"></a>
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
            <p class="text-light">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi, numquam exercitationem omnis illo veritatis, <br> libero nam maxime cupiditate ducimus totam delectus reiciendis, quam atque ea deleniti perspiciatis laboriosam eveniet natus?</p>
            <a href="#" class="btn btn-theme-2 shadow">Learn more</a>

        </div>
        <br>
    </section>
    <!-- Fourth Section (End) -->

</main>
<!-- Main (End) -->

<!-- Footer (Start) -->
<footer class="bg-light" id="footer">
    <br>
    <div class="container py-5">

        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-12">
                <h5 class="font-weight-bold text-theme-1">Logo</h5>
                <p class="text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis autem, nobis non inventore accusantium minus, voluptatum, cupiditate tempora neque id placeat qui velit animi quas laboriosam perferendis eaque accusamus cumque.</p>
                <a href="#" class="card-link text-theme-1">Learn more <img src="{{ asset('front-assets/images/arrow-right-circle.svg') }}" class="ml-1" alt="learn more"></a>
                <br>
                <br>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-12 card-body">
                <h5 class="font-weight-bold text-theme-1 mb-2">Quick Links</h5>
                <ul class="ml-4">
                    <li class="my-2"><a href="#" class="card-link text-theme-1">Home</a></li>
                    <li class="my-2"><a href="#" class="card-link text-theme-1">How it works ?</a></li>
                    <li class="my-2"><a href="#" class="card-link text-theme-1">Who are we ?</a></li>
                    <li class="my-2"><a href="#" class="card-link text-theme-1">About us</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-12 card-body">
                <h5 class="font-weight-bold text-theme-1 mb-2">Quick Links</h5>
                <ul class="ml-4">
                    <li class="my-2"><a href="#" class="card-link text-theme-1">Home</a></li>
                    <li class="my-2"><a href="#" class="card-link text-theme-1">How it works ?</a></li>
                    <li class="my-2"><a href="#" class="card-link text-theme-1">Who are we ?</a></li>
                    <li class="my-2"><a href="#" class="card-link text-theme-1">About us</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-12 card-body">
                <h5 class="font-weight-bold text-theme-1 mb-2">Quick Links</h5>
                <ul class="ml-4">
                    <li class="my-2"><a href="#" class="card-link text-theme-1">Home</a></li>
                    <li class="my-2"><a href="#" class="card-link text-theme-1">How it works ?</a></li>
                    <li class="my-2"><a href="#" class="card-link text-theme-1">Who are we ?</a></li>
                    <li class="my-2"><a href="#" class="card-link text-theme-1">About us</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 card-body">
                <h5 class="font-weight-bold text-theme-1">Follow us on</h5>
                <p class="text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis autem, nobis non inventore accusantium minus.</p>
                <ul class="mt-3">
                    <li class="d-inline-block mr-1"><a href="#"><img src="{{ asset('front-assets/images/facebook.svg') }}" alt="facebook"></a></li>
                    <li class="d-inline-block mx-1"><a href="#"><img src="{{ asset('front-assets/images/linkedin.svg') }}" alt="linkedin"></a></li>
                    <li class="d-inline-block mx-1"><a href="#"><img src="{{ asset('front-assets/images/twitter.svg') }}" alt="twitter"></a></li>
                </ul>
            </div>

        </div>

    </div>
    <div class="card-body bg-theme-1 pb-2" align="center">
        <h6 class="text-white">Copyright @Lorem Ispum 2021</h6>
    </div>
</footer>
<!-- Footer (End) -->

<!-- Jquery (Start) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){

        $("#navbar-toggler").click(function(){
            $("#navbar-menu").toggle(0);
        })
        $("#navbar-toggler").blur(function(){
            $("#navbar-collapse").hide(0);
        })
    });
</script>

</body>

</html>
