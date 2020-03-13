<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'tuTaller') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            margin: 0;
            text-align: center;
        }

        .title {
            font-size: 5em;
        }

        .title > a {
            color: #636b6f;
            font-family: 'Amaranth', sans-serif;
            text-decoration: none;
        }
        .title > a:hover {
            color: purple;
        }

        .links {
            margin-bottom: 10px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
        }

        .links > a:hover {
            border-bottom: solid 2px purple;
        }

        .carousel-caption {
            color: purple;
            font-weight: bold;
            font-size: 1.5em;
        }
        .carousel-caption h3 {
            color: purple;
            font-weight: bold;
            font-size: 1.5em;
        }

        .marketing {
            margin-top: 20px;
        }

        .marketing .btn-secondary {
            background-color: purple;
            border: none;
        }

        .footer {
            background-color: purple;
            color: #fff;
        }

        .footer > a {
            font-size: 2em;
            color: #fff;
            font-family: 'Amaranth', sans-serif;
            text-decoration: none;
        }

        .feedback input {
            border: solid 1px purple;
        }

        .btn-sm {
            background-color: purple;
            border: solid 1px purple;
            color: white;
        }

        .rrss > a {
            color: #636b6f;
        }
        .rrss > a:hover {
            color: purple;
        }

        .feedback  label {
            color: white;
        }

        .navbar-brand {
            color: #636b6f;
            font-family: 'Amaranth', sans-serif;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="app">
        
        <!-- Aquí empieza el menu superior -->

        @include('layouts.authNavbar')
        
        <!-- Aqui empieza el contenido principal de la página -->

        <main class="py-4">
            @yield('content')
        </main>

    </div>

    @include('footer')

</body>
</html>
