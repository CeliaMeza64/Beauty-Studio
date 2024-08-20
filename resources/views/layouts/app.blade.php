<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Beauty Studio</title>
    <link rel="icon" href="{{ asset('imagenes/log.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

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

        .truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 460px; 
    }

    .table {
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    .table tbody tr:last-child {
        border-bottom: 1px solid #ddd; 
    }

    .d-flex.align-items-center {
        justify-content: center;
        margin-bottom: 0;
        border-bottom: none;
    }

    .breadcrumb {
        padding: 0.2rem;
        margin: 0;
        border: none;
        background-color: transparent;
        border-radius: 0;
    }

    .breadcrumb-item {
        margin-right: 0.5rem;
    }

    .breadcrumb-item a {
        color: #007bff;
        text-decoration: none;
        font-size: 1.25rem; 
    }

    .breadcrumb-item.active {
        color: #6c757d;
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
                            <a class="nav-link" href="{{ route('trends.show') }}">Tendencias</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Login</a>
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
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
 
  
 


    @stack('js')
</body>
</html>
