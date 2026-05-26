<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name')) | {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
</head>
<body data-bs-theme="light">
    <div class="page">
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <a class="navbar-brand navbar-brand-autodark" href="{{ url('/') }}">
                    <span class="avatar avatar-sm bg-primary-lt text-primary me-2">
                        <i class="ti ti-shield-lock"></i>
                    </span>
                    <span class="fw-bold">{{ config('app.name') }}</span>
                </a>

                <div class="navbar-nav flex-row order-md-last gap-2">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                        @endif
                    @else
                        <a href="{{ route('dashboard.index') }}" class="btn btn-primary btn-sm">Dashboard</a>
                    @endguest
                </div>
            </div>
        </header>

        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @stack('script')
</body>
</html>
