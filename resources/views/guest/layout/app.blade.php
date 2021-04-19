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

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/toastr.min.css') }}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="{{asset('assets/vendor/toastr.min.js')}}"></script>
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
