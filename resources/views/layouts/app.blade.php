<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Inventory</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/meta-logo.png') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @include('layouts.includes.css_links')

</head>

<body class='bg-lg-primary'>

    <div id="app">
        @auth
            @if (Auth::user()->role == 'admin')
                @include('layouts.includes.admin_navigations')
            @elseif (Auth::user()->role == 'barangay_account')
                @include('layouts.includes.barangay_navigations')
            @endif
        @endauth

        <main
            class="@guest d-flex justify-content-center align-items-center vh-100 vw-100 @endguest @auth auth-main @endauth ">
            @yield('content')
        </main>
    </div>

    @include('layouts.includes.js_links')
</body>

</html>
