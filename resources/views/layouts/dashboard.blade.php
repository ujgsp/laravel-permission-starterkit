<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="author" content="{{ config('app.name') }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
</head>
<body data-bs-theme="light">
    <div class="page">
        @include('layouts._partials.navbar')

        <div class="page-wrapper">
            @unless(View::hasSection('hide_page_header'))
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">@yield('title')</h2>
                            @hasSection('description')
                                <div class="text-secondary mt-1">@yield('description')</div>
                            @endif
                        </div>
                        <div class="col-auto ms-auto">
                            @yield('actions')
                        </div>
                    </div>
                </div>
            </div>
            @endunless

            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>

            @include('layouts._partials.footer')
        </div>
    </div>

    @stack('script')
</body>
</html>
