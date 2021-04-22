<!-- Footer (Start) -->
<footer class="bg-light" id="footer">
    <br>
    <div class="container py-5">

        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-12">
                <h5 class="font-weight-bold text-theme-1">Logo</h5>
                <p class="text-secondary">Keeping the current pandemic situation in mind, our team of young enthusiasts, came up with this idea to create a platform where physical presence in not required to send or receive the gifts. We want you to enjoy your special moment.</p>
                <a href="#" class="card-link text-theme-1">Learn more <img
                        src="{{ asset('front-assets/images/arrow-right-circle.svg') }}" class="ml-1"
                        alt="learn more"></a>
                <br>
                <br>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 card-body">
                <h5 class="font-weight-bold text-theme-1 mb-2">Quick Links</h5>
                <ul class="ml-4">
                    <li class="my-2"><a href="{{ route('index') }}" class="card-link text-theme-1">Home</a></li>
                    <li class="my-2"><a href="{{ route('contact') }}" class="card-link text-theme-1">Contact Us</a></li>
                    <li class="my-2"><a href="{{ route('terms') }}" class="card-link text-theme-1">Terms of Use</a></li>
                    <li class="my-2"><a href="{{ route('privacy') }}" class="card-link text-theme-1">Privacy Policy</a></li>
                    <li class="my-2"><a href="{{ route('about') }}" class="card-link text-theme-1">About us</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 card-body text-center">
                <img src="{{ asset('img/payumoney.png') }}" alt="">
                    <div class="mt-4">
                        <img height="20px" src="{{ asset('img/american-express.svg') }}" alt="">
                        <img height="20px" src="{{ asset('img/visa.png') }}" alt="">
                        <img height="20px" src="{{ asset('img/maetro.png') }}" alt="">
                        <img height="20px" src="{{ asset('img/mastercard.png') }}" alt="">
                        <img height="20px" src="{{ asset('img/upi.svg') }}" alt="">
                    </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 card-body">
                <h5 class="font-weight-bold text-theme-1">Company</h5>
                <p class="text-secondary">Company address</p>
                <ul class="mt-3">
                    <li class="d-inline-block mr-1"><a href="#"><img
                                src="{{ asset('front-assets/images/facebook.svg') }}" alt="facebook"></a></li>
                    <li class="d-inline-block mx-1"><a href="#"><img
                                src="{{ asset('front-assets/images/linkedin.svg') }}" alt="linkedin"></a></li>
                    <li class="d-inline-block mx-1"><a href="#"><img
                                src="{{ asset('front-assets/images/twitter.svg') }}" alt="twitter"></a></li>
                </ul>
            </div>

        </div>

    </div>
    <div class="card-body bg-theme-1 pb-2" align="center">
        <h6 class="text-white">Copyright @Lorem Ispum 2021</h6>
    </div>
</footer>
<!-- Footer (End) -->
