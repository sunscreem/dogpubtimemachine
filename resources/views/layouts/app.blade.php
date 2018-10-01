<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.partials.head-tags-and-scripts')
</head>
<body>
    <div id="app">
         @yield('content')
    </div>
     @include('layouts.partials.footer')
     @include('layouts.partials.footer-tags-and-scripts')
</body>
</html>


