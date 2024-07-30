<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Beauty Studio')</title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .navbar {
      background-color: black; 
    }
    .navbar-brand,
    .navbar-nav .nav-link {
      color: gold !important; 
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
      background-color: black; 
      color: gold; 
      border: 1px solid gold; 
      margin-bottom: 20px; 
      overflow: hidden; 
      transition: transform 0.5s ease; 
    }
    .card:hover {
      transform: scale(1.02); 
    }
    .card-text {
      color: black; 
    }
    .services-title {
      text-align: center; 
      color: gold; 
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Beauty Studio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Servicios
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('servicios.showServicios', 'cabello') }}">Cabello</a>
            <a class="dropdown-item" href="{{ route('servicios.showServicios', 'maquillaje') }}">Maquillaje</a>
            <a class="dropdown-item" href="{{ route('servicios.showServicios', 'pedicura') }}">Pedicura</a>
            <a class="dropdown-item" href="{{ route('servicios.showServicios', 'manicura') }}">Manicura</a>
          </div>
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

<div class="image-container">
  <img src="{{ asset('imagenes/fondo4.jpg') }}" alt="Imagen horizontal" class="img-fluid">
</div>

@yield('content')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
