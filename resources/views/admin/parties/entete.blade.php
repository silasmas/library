<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | {{ isset($titre)?$titre:"" }}</title>
   <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link rel="icon" href="{{ asset('assets/images/PlaLogo.ico') }}" type="image/rdp-icon"> --}}

     <!-- Styles -->

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/custom/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    {{-- @vite(['resources/js/app.js']) --}}
    {{-- @livewireStyles(); --}}
    @yield("autres_style")
</head>
<body class="">
