<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Auth | {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
</head>
<body data-bs-theme="light">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark justify-content-center">
                    <span class="avatar avatar-md bg-primary-lt text-primary me-2 app-brand-icon">
                        <i class="ti ti-shield-lock"></i>
                    </span>
                    <span class="fw-bold">{{ config('app.name') }}</span>
                </a>
                <div class="text-secondary mt-2">Sign in to continue</div>
            </div>

            @yield('content')
        </div>
    </div>

    @stack('script')
</body>
</html>
