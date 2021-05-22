<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @env('production')
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @endenv
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Goaubled | @yield('name', 'home')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="@yield('keywords')" name="keywords">
    <meta content="@yield('description')" name="description">
    <link rel="icon" type="image/png" href="{{ asset('/img/cube-outline.svg') }}"/>

    <link href="{{ asset('/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    @yield('css')

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>

<div id="main">

    @include('flash::message')

    <alert-chat></alert-chat>

    <card-user></card-user>

    <b-overlay :show="show" rounded="sm">

        @include("layouts/includes/nav")

        <main>
            @yield('content')
        </main>

        <!-- #footer -->
        @include('layouts.includes.footer')
         <!-- #footer -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </b-overlay>
</div>

<!-- JavaScript Libraries -->
@yield('js')
<script src="{{ asset("/js/app.js") }}"></script>

<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>

</body>
</html>
