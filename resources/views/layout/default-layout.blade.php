<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="SIMORA - Sistem Informasi Manajemen Organisasi Mahasiswa">
    <meta name="author" content="bagas12dwi">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('/assets/img/favicon/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('/assets/img/favicon/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('/assets/img/favicon/logo.png') }}">
    <link rel="manifest" href="{{ URL::asset('/assets/img/favicon/site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="{{ URL::asset('/assets/css/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="{{ URL::asset('/assets/css/notyf.min.css') }}" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ URL::asset('/assets/css/volt.css') }}" rel="stylesheet">
</head>

<body>


    <main>
        @yield('konten')
    </main>

    <!-- Core -->
    <script src="{{ URL::asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/bootstrap.min.js') }}"></script>

    <!-- Vendor JS -->
    <script src="{{ URL::asset('/assets/js/on-screen.umd.min.js') }}"></script>

    <!-- Slider -->
    <script src="{{ URL::asset('/assets/js/nouislider.min.js') }}"></script>

    <!-- Smooth scroll -->
    <script src="{{ URL::asset('/assets/js/smooth-scroll.polyfills.min.js') }}"></script>

    <!-- Charts -->
    <script src="{{ URL::asset('/assets/js/chartist.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/chartist-plugin-tooltip.min.js') }}"></script>

    <!-- Datepicker -->
    <script src="{{ URL::asset('/assets/js/datepicker.min.js') }}"></script>

    <!-- Sweet Alerts 2 -->
    <script src="{{ URL::asset('/assets/js/sweetalert2.all.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="{{ URL::asset('/assets/js/datepicker.min.js') }}"></script>

    <!-- Notyf -->
    <script src="{{ URL::asset('/assets/js/notyf.min.js') }}"></script>

    <!-- Simplebar -->
    <script src="{{ URL::asset('/assets/js/simplebar.min.js') }}"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Volt JS -->
    <script src="{{ URL::asset('/assets/js/volt.js') }}"></script>
    @stack('script')


</body>

</html>
