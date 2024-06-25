
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Beauty Studio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body {
            font-family: 'Arial', sans-serif;
            font-size: 24px;
          
        }
        .jumbotron {
            background-image: url('imagenes/portada1.jpg');
            background-size: cover;
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);
            padding: 150px 0;
            margin-bottom: 0;
        }
        .navbar {
            background-color: #000;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #ffc107 !important;
        }
        .navbar-toggler-icon {
            background-color: #ffc107;
        }
    
      
        #contacto {
            background-color: #f8f9fa;
            padding: 60px 0;
        }
        #contacto h2 {
            color: #d63384;
            font-size: 36px;
            font-weight: bold;
        }
        #contacto p {
            color: #6c757d;
            font-size: 24px;
            margin-bottom: 40px;
        }
        .btn-success {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000;
        }
        .btn-success:hover {
            background-color: #ffca28;
            border-color: #ffca28;
            color: #000;
        }
        .titulo {
            font-family: 'Georgia', serif;
        }
        .subtitulo {
            font-family: 'Verdana', sans-serif;
        }
        .card {
            background-color: #000;
            color: #fff;
            border: 1px solid #ffd700;
        }
        .card-title {
            color: #ffd700;
        }
        .jumbotron h1, .jumbotron p {
            text-align: center;
        }
        .card-body {
            max-width: 90%; /* Controla el ancho del contenido */
             margin: 0 auto; /* Centrar el contenido */
        }
        .card-body h2 {
            font-size: 24px;
    
        }
        .card-body p {
            font-size: 20px;
            line-height: 1.4; /* Espaciado entre líneas */
            text-align: left;
           
        }
    </style>
</head>

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="http://beauty-studio.test/">Beauty Studio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#servicios">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">Contacto</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="http://beauty-studio.test/">Página de inicio</a>

                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Jumbotron con imagen -->
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="display-4 titulo">Beauty Studio</h1> <br>
        <p class="lead subtitulo">¡Dale a tus pies el cuidado que merecen!</p>
      
    </div>
  </section>

<!-- Servicios -->
<div id="servicios" class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-6 mb-6">
            <div class="card h-100 text-center">
                <img src="imagenes/pclasica.jpg" alt="pedicura clasica" class="card-img-top img-fluid rounded">
                <div class="card-body">
                    <h2 class="card-title">PEDICURA CLÁSICA</h2>
                    <p class="card-text">El equilibrio perfecto entre cuidado esencial y belleza. Ideal para quienes buscan mantener sus pies impecables con un toque tradicional.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 mb-6">
            <div class="card h-100 text-center">
                <img src="imagenes/acripie.jpeg" alt="imagen acripie" class="card-img-top img-fluid rounded">
                <div class="card-body">
                    <h2 class="card-title">ACRIPIE</h2>
                    <p class="card-text"> Diseñado para ofrecerte la máxima durabilidad y un acabado impecable,
                    el acripie es ideal para quienes buscan una solución de belleza duradera.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contacto -->
<section id="contacto" style="background-color: #000; color: #fff; padding: 60px 0;">
    <div class="container">
        <h2 class="text-center mb-5">Contáctanos</h2>
        <div class="row justify-content-center">
            <div class="col-md-8 mb-4 text-center">
                <p>Si tienes alguna pregunta sobre nuestros servicios, deseas agendar una cita o simplemente necesitas más información, no dudes en contactarnos.</p>
                <h4 class="mb-4">Dirección</h4>
                <p>Residencial los Olivos, El Paraiso, El Paraiso</p>
                <div class="mt-4">
                    <a href="https://api.whatsapp.com/send?phone=50489373440" class="btn btn-success btn-lg" target="_blank">
                        <i class="fa fa-whatsapp" aria-hidden="true"></i> Nuestro WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

