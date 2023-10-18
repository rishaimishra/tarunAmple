<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('meta')
        @yield('title')
    </head>
    <body>


        <div id="wrapper">
            @yield('content')
        </div>
        <div class="wrapper-page">
            @yield('header')
            @yield('body')
            @yield('errors')
            @yield('footer')
        </div>
        @yield('script')
    </div>
</body>
</html>
