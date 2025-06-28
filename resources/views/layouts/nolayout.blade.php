<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Links Of CSS File -->
		<link rel="stylesheet" href="{{ asset('') }}assets/css/sidebar-menu.css">
		<link rel="stylesheet" href="{{ asset('') }}assets/css/simplebar.css">
		<link rel="stylesheet" href="{{ asset('') }}assets/css/apexcharts.css">
		<link rel="stylesheet" href="{{ asset('') }}assets/css/prism.css">
		<link rel="stylesheet" href="{{ asset('') }}assets/css/rangeslider.css">
		<link rel="stylesheet" href="{{ asset('') }}assets/css/sweetalert.min.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/quill.snow.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/google-icon.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/remixicon.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/swiper-bundle.min.css">
        <link rel="stylesheet" href="{{ asset('') }}assets/css/fullcalendar.main.css">
		<link rel="stylesheet" href="{{ asset('') }}assets/css/style.css">

        @stack('css')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="boxed-size">
        {{ $slot }}

        <!-- Link Of JS File -->
        <script src="{{ asset('') }}assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('') }}assets/js/sidebar-menu.js"></script>
        <script src="{{ asset('') }}assets/js/dragdrop.js"></script>
        <script src="{{ asset('') }}assets/js/rangeslider.min.js"></script>
        <script src="{{ asset('') }}assets/js/sweetalert.js"></script>
        <script src="{{ asset('') }}assets/js/quill.min.js"></script>
        <script src="{{ asset('') }}assets/js/data-table.js"></script>
        <script src="{{ asset('') }}assets/js/prism.js"></script>
        <script src="{{ asset('') }}assets/js/clipboard.min.js"></script>
        <script src="{{ asset('') }}assets/js/feather.min.js"></script>
        <script src="{{ asset('') }}assets/js/simplebar.min.js"></script>
        <script src="{{ asset('') }}assets/js/apexcharts.min.js"></script>
        <script src="{{ asset('') }}assets/js/swiper-bundle.min.js"></script>
        <script src="{{ asset('') }}assets/js/fullcalendar.main.js"></script>
        <script src="{{ asset('') }}assets/js/custom/apexcharts.js"></script>
        <script src="{{ asset('') }}assets/js/custom/custom.js"></script>

        @stack('js')

    </body>
</html>
