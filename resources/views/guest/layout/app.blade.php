<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website description">

    <!-- Bootstrap 4.6 -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">

    <!-- Google Fonts Nunito -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-toast/jquery.toast.min.css') }}">
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/index.css') }}">

    <!-- Website Title -->
    <title>Website Title</title>
    @yield("styles")
</head>

<body>
@include('guest.includes.navbar')
@yield('content')
@include("guest.includes.footer")

<!-- Jquery (Start) -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/popper/popper.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/jquery-toast/jquery.toast.min.js')}}"></script>
<script src="{{asset('js/function.js')}}"></script>
<script>
    $(document).ready(function(){

        $("#navbar-toggler").click(function(){
            $("#navbar-menu").toggle(0);
        })
        $("#navbar-toggler").blur(function(){
            $("#navbar-collapse").hide(0);
        })

        $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}});
    });
</script>


@yield("script")
</body>

</html>
