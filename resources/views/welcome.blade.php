<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main id="main" class="py-4">
                <div class="intro bg-dark">
                    <p>Strathmore University
                    <span>Stratigram</span>
                    <a href="/login" class="btn btn-lg">Login</a>
                    <a href="/register" class="btn btn-lg">Register</a><br><br>
                  &mdash; Let's Chat &mdash;</p>
                </div>
        </main>
    </div>
</body>
</html>
