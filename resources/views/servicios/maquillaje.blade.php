<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Detalles del Servicio de Maquillaje</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/product/">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="product.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
      .site-header {
        background-color: #000; /* Negro */
      }
      .site-header .nav-link {
        margin-left: 10px;
        color: #fff; /* Blanco */
      }
      .site-header .nav-link:hover {
        color: #ffd700; /* Dorado */
      }
      .bg-rosado-palido {
        background-color: #000; /* Negro */
        color: #fff; /* Blanco */
      }
      .btn-outline-secondary {
        color: #ffd700; /* Dorado */
        border-color: #ffd700;
      }
      .btn-outline-secondary:hover {
        background-color: #ffd700;
        color: #000; /* Negro */
      }
      .card {
        background-color: #000; /* Negro */
        color: #fff; /* Blanco */
        border: 1px solid #ffd700; /* Dorado */
      }
      .card-title {
        color: #ffd700; /* Dorado */
      }
      .blockquote-footer {
        color: #ffd700; /* Dorado */
      }
      .btn-success {
        background-color: #ffd700; /* Dorado */
        border-color: #ffd700;
        color: #000; /* Negro */
      }
      .btn-success:hover {
        background-color: #fff; /* Blanco */
        border-color: #ffd700;
        color: #000; /* Negro */
      }
      .btn-primary, .btn-secondary {
        color: #000; /* Negro */
        border-color: #ffd700; /* Dorado */
      }
      .btn-primary {
        background-color: #ffd700; /* Dorado */
      }
      .btn-secondary {
        background-color: #fff; /* Blanco */
      }
      .btn-primary:hover, .btn-secondary:hover {
        color: #fff; /* Blanco */
        background-color: #000; /* Negro */
        border-color: #ffd700;
      }
      .testimonial, .reservas {
        background-color: #000; /* Negro */
        color: #ffd700; /* Dorado */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.2); /* Dorado */
        margin-bottom: 20px;
      }
      .testimonial blockquote {
        border-left: 5px solid #ffd700; /* Dorado */
      }
      .testimonial p {
        font-style: italic;
      }
      .whatsapp-button {
        background-color: #25D366;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
        animation: slideInUp 1s ease-out;
      }
      .whatsapp-button:hover {
        background-color: #1EBEA5;
        transform: scale(1.05);
      }
      .whatsapp-button i {
        margin-right: 8px;
        font-size: 20px;
      }
      @keyframes slideInUp {
        from {
          transform: translateY(20px);
          opacity: 0;
        }
        to {
          transform: translateY(0);
          opacity: 1;
        }
      }

      .btn-custom {
        color: white;
        background-color: #ff4081; /* Color de fondo del botón */
        border: 2px solid white;
        font-size: 1.2rem; /* Tamaño de fuente más grande */
        padding: 15px 30px; /* Más espacio interno */
        border-radius: 50px; /* Bordes redondeados */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Sombra */
        transition: transform 0.3s, box-shadow 0.3s; /* Transición suave */
      }

      .btn-custom:hover {
        transform: scale(1.1); /* Agrandar ligeramente al pasar el cursor */
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.4); /* Aumentar la sombra */
      }
    </style>
  </head>

  <body>

    <nav class="site-header sticky-top py-1">
      <div class="container d-flex justify-content-end">
        <a class="py-2 d-none d-md-inline-block nav-link" href="#">Inicio</a>
        <a class="py-2 d-none d-md-inline-block nav-link" href="#">Servicios</a>
        <a class="py-2 d-none d-md-inline-block nav-link" href="#">Contacto</a>
      </div>
    </nav>

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-rosado-palido" style="background-image: url('imagenes/fondom.jpg'); background-size: cover; background-position: center;">
      <div class="col-md-8 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal text-white">¡Descubre tu Belleza!</h1>
        <p class="lead font-weight-normal text-white">Sumérgete en un mundo de maquillaje diseñado para resaltar tu belleza única en cada momento especial. Nuestro equipo de expertos está aquí para realzar tus rasgos naturales y hacer que te sientas radiante.</p>
        <a class="btn btn-custom mt-3" href="#whatsapp">¡Reserva Ahora y Transforma tu Look!</a>
      </div>
    </div>

    <div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-6 mb-4">
      <div class="card h-100 text-center">
        <img src="{{ asset('imagenes/dia.jpg') }}" alt="Servicio de Maquillaje de Día" class="card-img-top img-fluid rounded">
        <div class="card-body">
          <h2 class="card-title display-5">Maquillaje DIARIO</h2>
          <p class="card-text">Conozca nuestras opciones de maquillaje y elija la que más se adapte a sus necesidades.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
      <div class="card h-100 text-center">
        <img src="{{ asset('imagenes/graduacion.jpg') }}" alt="graduacion" class="card-img-top img-fluid rounded">
        <div class="card-body">
          <h2 class="card-title display-5">Maquillaje GRADUACION</h2>
          <p class="card-text">Conozca nuestras opciones de maquillaje y elija la que más se adapte a sus necesidades.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
      <div class="card h-100 text-center">
        <img src="{{ asset('imagenes/quince.jpg') }}" alt="quinceaños" class="card-img-top img-fluid rounded">
        <div class="card-body">
          <h2 class="card-title display-5">Maquillaje QUINCEAÑOS</h2>
          <p class="card-text">Conozca nuestras opciones de maquillaje y elija la que más se adapte a sus necesidades.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
      <div class="card h-100 text-center">
        <img src="{{ asset('imagenes/boda.jpg') }}" alt="boda" class="card-img-top img-fluid rounded">
        <div class="card-body">
          <h2 class="card-title display-5">Maquillaje BODA</h2>
          <p class="card-text">Conozca nuestras opciones de maquillaje y elija la que más se adapte a sus necesidades.</p>
        </div>
      </div>
    </div>
  </div>
</div>

    <div class="container">
      <div class="row my-md-3">
        <div class="col-md-12 mb-3">
          <div class="testimonial text-center">
            <h2 class="card-title display-5">Testimonios de Clientes</h2>
            <div class="card mb-3">
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>El mejor servicio de maquillaje que he recibido. Muy profesional y amable.</p>
                  <footer class="blockquote-footer">Ana G. <cite title="Source Title">Cliente Satisfecho</cite></footer>
                </blockquote>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>El maquillaje para mi boda fue espectacular. ¡Gracias!</p>
                  <footer class="blockquote-footer">Laura R. <cite title="Source Title">Cliente Satisfecho</cite></footer>
                </blockquote>
              </div>
            </div>
            <div class="card mb-3">
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>Me encantó el maquillaje para mi sesión de fotos. Muy profesional y duradero.</p>
                  <footer class="blockquote-footer">Elena M. <cite title="Source Title">Cliente Satisfecha</cite></footer>
                </blockquote>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>Excelente atención y resultados increíbles. ¡Recomendado!</p>
                  <footer class="blockquote-footer">Carolina S. <cite title="Source Title">Cliente Feliz</cite></blockquote>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row my-md-3">
        <div class="col-md-12 mb-3">
          <div class="reservas text-center">
            <h2 class="card-title display-5">Contacto y Reservas</h2>
            <a id="whatsapp" href="https://wa.me/mi numero" class="whatsapp-button">
              <i class="fab fa-whatsapp"></i>Contactar por WhatsApp
            </a>
            <div class="mt-3">
              <a href="#" class="btn btn-primary">Regresar</a>
              <a href="#" class="btn btn-secondary">Continuar</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0r"></script>
  </body>
</html>
