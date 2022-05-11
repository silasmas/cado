<!DOCTYPE html>
<html lang="en">
    <head>
         <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | {{ isset($titre) ? $titre : '' }}</title>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="SovWare" />
        <meta name="description" content="price ever!" />

        <link rel="shortcut icon" type="image/rdp-icon" href="{{ asset('assets/logo/logo-white.png') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('assets/css/jquery.webui-popover.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}" />

        <!-- font awesome 5 -->
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}" />
        <link href="{{ asset('js/sweetalert/sweetalert.css') }}" rel="stylesheet">
        <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

        @yield("autres_style")
    </head>
    <body class="gray-bg">
