<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title', 'Aplikasi Sekolah')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <x-logo></x-logo>
    {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}
    @include('layouts.styles')
</head>

<body>

    <x-navbar></x-navbar>

    @yield('content')

    <!-- ======= Footer ======= -->
    <x-landingpage.footer></x-landingpage.footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    @include('layouts.scripts')
</body>

</html>
