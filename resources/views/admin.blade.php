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

		<!-- PLUGINS -->
		<!-- Wow -->
		{{-- <link href="{{asset('admin/plugins/wow/wow.min.css')}}" rel="stylesheet"> --}}
		<!-- Highlight.JS -->
		{{-- <link href="{{asset('admin/plugins/highlight.js/highlight.min.css')}}" rel="stylesheet"> --}}
		<!-- Perfect Scrollbar -->
		{{-- <link href="{{asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet"> --}}
		<!-- Data Tables -->
		{{-- <link href="{{asset('admin/plugins/datatables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}
		{{-- <link href="{{asset('admin/plugins/datatables/fixedHeader.dataTables.min.css')}}" rel="stylesheet"> --}}
		{{-- <link href="{{asset('admin/plugins/datatables/responsive.dataTables.min.css')}}" rel="stylesheet"> --}}
		<!-- Smart Menus -->
		{{-- <link href="{{asset('admin/plugins/smart-menus/sm-core-css')}}.css" rel="stylesheet"> --}}

		<!-- Owl Carousel -->
		{{-- <link href="{{asset('admin/plugins/owl/owl.carousel.min.css')}}" rel="stylesheet"> --}}

		<!-- FORM PLUGINS -->
		<!-- Full Calendar -->
		{{-- <link href="{{asset('admin/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet"> --}}
		<!-- Select 2 -->
		<link href="{{asset('admin/plugins/select2/select2.min.css')}}" rel="stylesheet">
		<!-- Tagify -->
		{{-- <link href="{{asset('admin/plugins/tagify/tagify.min.css')}}" rel="stylesheet"> --}}
		<!-- Flat Picker -->
		{{-- <link href="{{asset('admin/plugins/flatpickr/flatpickr.min.css')}}" rel="stylesheet"> --}}
		<!-- IntlTell Input -->
		{{-- <link href="{{asset('admin/plugins/intlTelInput/intlTelInput.min.css')}}" rel="stylesheet"> --}}
		<!-- Mini Colors -->
		{{-- <link href="{{asset('admin/plugins/minicolors/minicolors.min.css')}}" rel="stylesheet"> --}}
		<!-- RateYo -->
		{{-- <link href="{{asset('admin/plugins/rateyo/rateyo.min.css')}}" rel="stylesheet"> --}}
		<!-- Audio Player -->
		{{-- <link href="{{asset('admin/plugins/audioplayer/audioplayer.min.css')}}" rel="stylesheet"> --}}
		<!-- Range Slider -->
		{{-- <link href="{{asset('admin/plugins/rangeslider/rangeslider.min.css')}}" rel="stylesheet"> --}}
		<!-- Ion.RangeSlider -->
		{{-- <link href="{{asset('admin/plugins/ion.rangeSlider/ion.rangeSlider.min')}}.css" rel="stylesheet"> --}}

		{{-- <link href="{{asset('admin/plugins/charts/stiff-chart/stiff-chart')}}.min.css" rel="stylesheet">
		<link href="{{asset('admin/plugins/charts/org-chart/jquery.orgchart')}}.css" rel="stylesheet">
		<link href="{{asset('admin/plugins/charts/apexcharts/apexcharts.css')}}" rel="stylesheet">
		<link href="{{asset('admin/plugins/charts/morrischarts/morris.min.css')}}" rel="stylesheet">
		<link href="{{asset('admin/plugins/charts/jvectormap/jvectormap.min.css')}}" rel="stylesheet"> --}}

        <link rel="stylesheet" href="{{asset('admin/css/ltr.css')}}">
        {{-- <link rel="stylesheet" href="{{asset('admin/css/rtl.css')}}"> --}}

        <style>#app{height: 100%;}</style>
        <style>.error-messages {
            color: red;
            font-size: 12px; }</style>
            <style>.disable-anchor{pointer-events: none}</style>
    </head>
    <body class="login-page-2">
        @inertia
        @routes

        <!-- Scripts -->

        <div class="main-body" id="loader" style="display: none">
            <div class="th-loader loader-page">
                <svg class="spinner-container" viewBox="0 0 52 52">
                    <circle class="path" cx="26px" cy="26px" r="20px" fill="none" />
                </svg>
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{asset('admin/js/jquery/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/js/jquery/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/js/bootstrap/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
        {{-- <script src="{{asset('admin/js/plugins.min.js')}}" type="text/javascript"></script> --}}
        {{-- <script src="{{asset('admin/js/charts.min.js')}}" type="text/javascript"></script> --}}
        {{-- <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> --}}
        {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script> --}}
        {{-- <script>new WOW().init();</script> --}}
        <script src="{{asset('admin/js/custom.min.js')}}" type="text/javascript"></script>
        {{-- <script src="{{asset('admin/js/charts-custom.min.js')}}" type="text/javascript"></script> --}}


    </body>
</html>
