<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Panel</title>

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="{{asset('admin/js/jquery/jquery-ui/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/owl/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/ltr.css')}}">
        {{-- <link rel="stylesheet" href="{{asset('admin/css/rtl.css')}}"> --}}

        <style>#app{height: 100%;}</style>
        <style>.error-messages {
            color: red;
            font-size: 12px; }</style>
    </head>
    <body class="login-page-2">
        @inertia
        @routes

        <!-- Scripts -->

        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{asset('admin/js/jquery/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/js/jquery/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/js/bootstrap/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
        {{-- <script src="{{asset('admin/js/plugins.min.js')}}" type="text/javascript"></script> --}}
        <script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>
        <script>new WOW().init();</script>
        <script src="{{asset('admin/js/custom.min.js')}}" type="text/javascript"></script>
        {{-- <script src="{{asset('admin/js/charts-custom.min.js')}}" type="text/javascript"></script> --}}


    </body>
</html>
