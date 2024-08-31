<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Media Pembelajaran">
    <meta name="author" content="bagas12dwi">
    <title>Media Pembelajaran</title>

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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    @vite('resources/sass/app.scss')
</head>

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->


    @include('components.sidebar')

    <main class="content">

        @include('components.navbar')

        @yield('konten')

        @include('components.footer')
    </main>

    <!-- Core -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    @vite('resources/js/app.js')

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
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    @stack('script')


</body>

</html>
