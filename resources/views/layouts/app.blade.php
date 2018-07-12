<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script> window.releaseStage = "{{ env('APP_ENV') }}";</script>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @routes
</head>
<body>
    <div id="app">
         @yield('content')
    </div>
</body>
</html>