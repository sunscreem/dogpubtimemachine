<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.partials.head-tags-and-scripts')
</head>
<body>
    @include('layouts.partials.admin-nav')
    <div id="app" class="py-4">
        @yield('content')
    </div>
</body>
</html>