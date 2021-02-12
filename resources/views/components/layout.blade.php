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
    </main>
    {{-- Freccia torna su  --}}
    <div id="tornasu" class="mb-3 justify-content-end d-none d-lg-flex">
        <i class="fas fa-arrow-circle-up tornasu fa-3x text-violet" width="60px" height="60px"></i>
    </div> 
    {{-- freccia torna su mobile --}}
    <div id="tornasuMobile" class="mb-3 justify-content-end d-flex d-lg-none">
        <i class="fas fa-arrow-circle-up tornasu fa-3x text-violet" width="60px" height="60px"></i>
    </div> 
    <x-footer/>
     
     
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>