<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Bootstrap CSS (Asumiendo que estás usando Bootstrap para estilos de navegación) -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilo personalizado para la barra de navegación */
    .navbar {
      background-color: black; /* Fondo negro */
    }
    .navbar-brand,
    .navbar-nav .nav-link {
      color: gold !important; /* Letras doradas */
    }
    .navbar-toggler-icon {
      background-color: gold; /* Icono del toggler dorado */
    }
    .image-container {
      width: 100%; /* Ocupa todo el ancho disponible */
      overflow: hidden; /* Evita desbordamientos */
      height: 400px; /* Altura fija de 400 píxeles */
    }
    .image-container img {
      width: 100%; /* Imagen ocupa todo el ancho del contenedor */
      height: 100%; /* Imagen ocupa toda la altura del contenedor */
      object-fit: cover; /* Ajuste de la imagen para cubrir el contenedor */
      display: block; /* Para evitar espacios adicionales */
    }
    .card-container {
      font-family: Georgia, serif; /* Fuente Georgia */
    }
    .card {
      background-color: black; /* Fondo negro */
      color: gold; /* Letras doradas */
      border: 1px solid gold; /* Borde dorado */
      margin-bottom: 20px; /* Espacio entre tarjetas */
    }
    .btn-gold {
      background-color: gold; /* Fondo del botón dorado */
      color: black; /* Texto negro */
      border: none; /* Sin borde */
    }
    .btn-gold:hover {
      background-color: darkgoldenrod; /* Fondo del botón dorado oscuro al pasar el mouse */
      color: white; /* Texto blanco al pasar el mouse */
    }
    .services-title {
      text-align: center; /* Centrar el texto */
      color: gold; /* Color dorado */
      font-family: Georgia, serif; /* Fuente Georgia */
      margin-top: 40px; /* Margen superior */
      margin-bottom: 20px; /* Margen inferior */
    }
    .card img {
      height: 200px; /* Altura fija para las imágenes en las tarjetas */
      object-fit: cover; /* Ajuste de la imagen para cubrir el contenedor */
    }
    img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Beauty Studio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://api.whatsapp.com/send?phone=50489373440" >Contactos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Contenedor para la imagen -->
<div class="image-container">
  <img src="{{ asset('imagenes/fondo.jpeg') }}" alt="Imagen horizontal" class="img-fluid">
</div>

<!-- Título de servicios -->
<h2 class="services-title">Servicios</h2>

<!-- Contenedor para las tarjetas -->
<div class="container card-container mt-4">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <img src="{{ asset('imagenes/manicura.jpg') }}" alt="Servicio 1" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Manicura</h5>
          <p class="card-text">En nuestro salón te ofrecemos una amplia gama de servicios para que tus manos luzcan radiantes nuestro equipo de expertos está altamente calificado Y utilizando técnicas innovadoras y productos de la más alta calidad para garantizarte resultados excepcionales</p>
          <a href="/manicura" class="btn btn-gold">Ver Detalles</a> <!-- Aquí está el enlace actualizado -->
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <img src="{{ asset('imagenes/pedicura.jpg') }}" alt="Servicio 2" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Pedicura</h5>
          <p class="card-text">En nuestro salón te invitamos a sumergir a una experiencia de bienestar y cuidado integral para tus pies, nuestro equipo de pedicuristas profesionales está a tu disposición para brindarte un servicio personalizado y de la más alta calidad</p>
          <a href="/pedicura" class="btn btn-gold">Ver Detalles</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <img src="{{ asset('imagenes/cabello.jpg') }}" alt="Servicio 3" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Cabello</h5>
          <p class="card-text">En nuestro salón tu cabello en nuestra prioridad te ofrecemos una amplia gama de servicios para que luzcas una melena radiante sana y llena de vida Nuestro equipo de estilistas profesionales altamente capacitados y apasionados por el cuidado capilar está a tu disposición para brindarte una experiencia personalizada y de la más alta calidad</p>
          <a href="{{route('cabello')}}" class="btn btn-gold">Ver Detalles</a> 
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <img src="{{ asset('imagenes/maquillajeInicio.jpeg') }}" alt="Servicio 4" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Maquillaje</h5>
          <p class="card-text">En nuestro salón te ofrecemos una amplia gama de servicios de maquillaje para que luzcas radiante en cualquier ocasión nuestro equipo de maquilladores profesionales altamente capacitados y apasionados por el arte del maquillaje está tu disposición para brindarte una experiencia personalizada y de la más alta calidad</p>
          <a href="/maquillaje" class="btn btn-gold">Ver Detalles</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Tu contenido original aquí -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
