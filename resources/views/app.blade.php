<!DOCTYPE html>
<html lang="{{config('app.locale')}}" dir={{config('app.locale') == 'en' ? 'ltr' : 'rtl'}}>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Maximus') }}</title>

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/wow.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        @if(config('app.locale') == 'en')
            <link rel="stylesheet" href="{{asset('css/ltr.css')}}">
        @else
            <link rel="stylesheet" href="{{asset('css/rtl.css')}}">
        @endif
        <style>#app{height: 100%;}</style>
    </head>
    <body>
        @inertia
        @routes

        <!-- Scripts -->

        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/jquery-ui.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/bootstrap/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/flatpickr.min.js')}}" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>
        <script>new WOW().init();</script>
        <script src="{{asset('js/owl.carousel.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/grid.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/custom.js')}}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        @if(Route::currentRouteName() == 'assessmentTest')

        window.onbeforeunload = function() {
            return "Changes you made may not be saved, do you really want to leave?";
        };
        @endif
        </script>
    </body>
</html>
