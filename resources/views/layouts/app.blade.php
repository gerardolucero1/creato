<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Creato Studio</title>
    <meta name="description" content="Creato web page">
    <meta name="author" content="3DLOG">
    <meta name="user" content="{{ Auth::user() }}">

    <link rel="icon" type="image/png" href="/favicon.ico">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=DM+Serif+Text&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant:300i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Unna:700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @yield('styles')

    <style>
        body{
            background-image: url('/images/textura.png');
            background-size: contain;
            background-position: center;
            position: relative;
            background-repeat: repeat;
        }
    </style>
</head>
<body style="overflow-x: hidden;">
    <div id="app">
        @yield('content')
    </div>

    <!-- END Page Container -->
    
    <!-- Laravel Scaffolding JS -->
    <script src="{{ mix('js/laravel.app.js') }}"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    @yield('scripts')
</body>
</html>
