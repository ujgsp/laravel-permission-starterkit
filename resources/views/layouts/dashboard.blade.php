<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('static-admin/img/icons/icon-48x48.png') }}" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title>@yield('title') | YourWebsite</title>

    <link href="{{ asset('static-admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('static-admin/css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    @stack('css')
</head>

<body>
    <div class="wrapper">
        @include('layouts._partials.sidebar')

        <div class="main">
            @include('layouts._partials.header')

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3">
                        <span class="ml-2">@yield('title')</span>
                    </h1>
                    <span class="mb-3">@yield('description')</span>

                    @yield('content')

                </div>
            </main>

            @include('layouts._partials.footer')

        </div>
    </div>

    <script src="{{ asset('static-admin/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    @stack('script')
</body>

</html>
