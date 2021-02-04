<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <x-navbar/>
    <main>
        {{$slot}}

    <div id="tornasu" class="mb-3">
        <i class="fas fa-arrow-circle-up tornasu fa-3x" width="60px" height="60px"></i>
        {{-- <img src= "/img/arrowUp.png" class="tornasu" width="40px" height="40px"> --}}
    </div>
    </main>
    <x-footer/>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>