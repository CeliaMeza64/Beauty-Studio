<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Beauty Studio</title>
    <link rel="icon" href="{{ asset('imagenes/logo.jpeg') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('css')

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #FF6EA2; 
        }
        .navbar-brand,
        .navbar-nav .nav-link {
            color: white !important; 
        }
        .navbar-toggler-icon {
            background-color: gold; 
        }
        .image-container {
            width: 100%; 
            overflow: hidden;
            height: 50vh; 
        }
        .image-container img {
            width: 100%; 
            height: 100%;
            object-fit: cover; 
            display: block; 
        }
        .card-container {
            font-family: Arial, sans-serif; 
        }
        .card {
            background-color: #f5e3c3; 
            color: #FF6EA2; 
            border: 1px solid gold; 
            margin-bottom: 20px; 
            overflow: hidden; 
            transition: transform 0.5s ease;
        }
        .card:hover {
            transform: scale(1.02); 
            text-decoration: none; 
        }
        .card-text {
            color: black; 
            overflow: hidden; 
            text-overflow:ellipsis;
            display:-webkit-box;
            -webkit-line-clamp:10;
            -webkit-box-orient:vertical;
            text-decoration: none; 
        }
        .services-title {
            text-align: center; 
            color: black; 
            font-family: Arial, sans-serif;
            margin-top: 40px;
            margin-bottom: 20px; 
        }
        .card img {
            height: 200px; 
            object-fit: cover; 
            transition: transform 0.5s ease; 
        }
        .card:hover img {
            transform: scale(1.1); 
        }
        .card a {
            color: inherit; 
            text-decoration: none; 
        }
        
        img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Beauty Studio</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('servicios.showServicios', 'cabello') }}">Cabello</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('servicios.showServicios', 'maquillaje') }}">Maquillaje</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('servicios.showServicios', 'pedicura') }}">Pedicura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('servicios.showServicios', 'manicura') }}">Manicura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reservas.create') }}">Reserva</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trends.index') }}">Tendencias</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home">Administrador</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @section('background_image')
        <div class="image-container">
            <img src="{{ asset('imagenes/fondo3.png') }}" alt="Imagen horizontal" class="img-fluid">
        </div>
        @show

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('JS/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('JS/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('JS/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('JS/jszip.min.js') }}"></script>
    <script src="{{ asset('JS/pdfmake.min.js') }}"></script>
    <script src="{{ asset('JS/vfs_fonts.js') }}"></script>
    <script src="{{ asset('JS/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('JS/buttons.print.min.js') }}"></script>
    <script src="{{ asset('JS/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('JS/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('JS/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('JS/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('JS/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('JS/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    @stack('js')
</body>
</html>
