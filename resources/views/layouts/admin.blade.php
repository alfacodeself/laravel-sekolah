<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Alfa" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <x-logo />

    <!-- App css -->
    @include('layouts.styles-admin')

    <!-- icons -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<!-- body start -->

<body class="loading" data-layout-mode="horizontal" data-layout-color="light" data-layout-size="fluid"
    data-topbar-color="dark" data-leftbar-position="fixed">

    <!-- Begin page -->
    <div id="wrapper">
        <x-navbar-admin />
        @include('layouts.sidebar')
        <div class="content-page" style="margin-top: 100px">
            <div class="content">

                @yield('content')

            </div>
            <x-footer-admin />
        </div>
    </div>
    @include('layouts.scripts-admin')

</body>

</html>
