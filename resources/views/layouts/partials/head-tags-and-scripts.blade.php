<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta description="Whats on tap, right, now at all the Brewdog Bars. Includes historical data too.">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TZHSWNH');</script>
<!-- End Google Tag Manager -->

@include('layouts.partials.favicons')
@routes
<title>{{ config('app.name', 'Laravel') }}</title>
<script> window.releaseStage = "{{ config('app.env') }}";</script>
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>

<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
