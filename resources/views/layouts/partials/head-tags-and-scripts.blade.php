<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta description="Whats on tap, right, now at all the Brewdog Bars. Includes historical data too.">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

@include('layouts.partials.favicons')
@routes
<title>{{ config('app.name', 'Laravel') }}</title>
<script> window.releaseStage = "{{ config('app.env') }}";</script>
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>

<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
