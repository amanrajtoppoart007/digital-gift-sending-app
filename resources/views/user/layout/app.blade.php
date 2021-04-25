<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{trans('panel.site_title')}}</title>

    <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">

    <!-- Google Fonts Nunito -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-toast/jquery.toast.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/index.css') }}">
    <link rel="stylesheet" href="{{asset('custom-css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/user-panel.css') }}">
    @yield('head')
    @yield('style')
</head>

<body>
    <div class="wrapper">
        <div id="overlay">
            <img class="spinner" src="{{asset('img/spinner.gif')}}" alt="spinner">
        </div>
        <!-- Sidebar  -->
        @includeIf('user.includes.sidebar')

        <!-- Page Content  -->
        <div id="content">
            @includeIf('user.includes.navbar')
            <div class="px-2" style="min-height: 80vh">
                 @yield("content")
            </div>
           @includeIf('user.includes.footer')
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/popper/popper.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('plugins/ckeditor5-build/ckeditor.js')}}"></script>
    <script src="{{asset('plugins/jquery-toast/jquery.toast.min.js')}}"></script>
    <script src="{{asset('js/function.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}});
        });
    </script>
    @yield("script")
</body>

</html>
