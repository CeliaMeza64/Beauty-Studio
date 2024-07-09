<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Studio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .jumbotron {
            background-image: url('imagenes/portada1.jpg');
            background-size: cover;
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.6);
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
        .service-box {
            background: #000;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 30px;
            transition: transform 0.3s ease-in-out;
        }
        .service-box h3 {
            color: #ffc107;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .service-box p {
            color: #ccc;
        }
        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: rgba(255, 193, 7, 0.5);
            border-radius: 50%;
            padding: 10px;
        }
        .service-box:hover {
            transform: scale(1.05);
        }
        .carousel-inner img {
            transition: transform 0.5s ease;
        }
        .carousel-inner img:hover {
            transform: scale(1.1);
        }
        #servicios {
            background-color: #f5f5f5;
            padding: 60px 0;
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
            font-size: 18px;
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
        .card-img-top {
            transition: transform 0.5s ease;
        }
        .card-img-top:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>

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
        <p class="lead subtitulo">Nos especializamos en ofrecerle el servicio de cabello de alta calidad, asegurándonos de que estén listas para cualquier ocasión.</p>
        <p class="lead subtitulo">Si lo imaginas, nosotros lo hacemos realidad.</p>
    </div>
</section>

<!-- Servicios -->
<div id="servicios" class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 text-center">
                <img src="imagenes/planchado2.jpg" alt="Servicio de Maquillaje de Día" class="card-img-top img-fluid rounded">
                <div class="card-body" style="background-color: #000; color: #000; padding: 60px 0;">
                    <h2 class="card-title" style="color: #ffc107">PLANCHADO</h2>
                    <p class="card-text" style="color: #f5f5f5">Nuestros servicios de planchado para el cabello, ofrecen una solución profesional y eficaz para obtener un cabello liso, suave y brillante. Utilizamos técnicas avanzadas y productos de alta calidad para asegurar que tu cabello no solo luzca espectacular, sino que también se mantenga sano y protegido.</p>
                    <p class="mt-3 text-center" style="color: blue;">Beneficios para el Cabello:</p>
                    <p style="color: #f5f5f5">* Deja el cabello con una textura uniforme y sedosa, lo que facilita el peinado diario.</p>
                    <p style="color: #f5f5f5">* Un cabello planchado correctamente puede mantener su forma durante varios días, reduciendo la necesidad de peinarlo diariamente.</p>
                    <p style="color: #f5f5f5">* Al alisar el cabello, se realza su brillo natural, haciendo que luzca más saludable y radiante.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 text-center">
                <img src="imagenes/secado3.jpeg" alt="graduacion" class="card-img-top img-fluid rounded">
                <div class="card-body" style="background-color: #000; color: #000; padding: 60px 0;">
                    <h2 class="card-title" style="color: #ffc107">SECADO</h2>
                    <p class="card-text" style="color: #f5f5f5">Nuestros servicios de secado para el cabello están diseñados para ofrecer un acabado profesional y duradero, proporcionando volumen, suavidad y un estilo impecable. Utilizamos herramientas y productos de alta calidad para asegurar que tu cabello se mantenga sano y radiante.</p>
                    <p class="mt-3 text-center" style="color: blue;">Beneficios para el Cabello:</p>
                    <p style="color: #f5f5f5">* Volumen y Movimiento: Consigue un cabello con volumen, cuerpo y movimiento natural.</p>
                    <p style="color: #f5f5f5">* Acabado Profesional: Logra un look pulido y de salón que dura más tiempo.</p>
                    <p style="color: #f5f5f5">* Protección: Utilizamos productos que protegen tu cabello del calor, manteniéndolo saludable y fuerte.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 text-center">
                <img src="imagenes/ondas8.jpeg" alt="quinceaños" class="card-img-top img-fluid rounded">
                <div class="card-body" style="background-color: #000; color: #000; padding: 60px 0;">
                    <h2 class="card-title" style="color: #ffc107">ONDAS</h2>
                    <p class="card-text" style="color: #f5f5f5">Nuestros servicios de ondulado para el cabello ofrecen una manera elegante y versátil de transformar tu estilo, proporcionando ondas naturales, definidas o glamorosas según tus preferencias. Utilizamos técnicas y productos especializados para asegurar que tu cabello luzca radiante y saludable.</p>
                    <p class="mt-3 text-center" style="color: blue;">Beneficios para el Cabello:</p>
                    <p style="color: #f5f5f5">* Las ondas pueden adaptarse a diferentes estilos y ocasiones, desde un look casual y relajado hasta un peinado elegante y sofisticado para eventos especiales.</p>
                    <p style="color: #f5f5f5">* Se pueden personalizar para adaptarse a la longitud y textura del cabello de cada persona, ofreciendo una apariencia única y personalizada.</p>
                    <p style="color: #f5f5f5">* Proporcionan un movimiento natural y una apariencia más dinámica al cabello.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 text-center">
                <img src="imagenes/keratina4.jpeg" alt="boda" class="card-img-top img-fluid rounded">
                <div class="card-body" style="background-color: #000; color: #000; padding: 60px 0;">
                    <h2 class="card-title" style="color: #ffc107">KERATINA</h2>
                    <p class="card-text" style="color: #f5f5f5">Nuestros servicios de tratamiento de keratina están diseñados para revitalizar y transformar tu cabello, proporcionando resultados suaves, brillantes y más manejables. La keratina es una proteína natural que fortalece el cabello y lo protege contra el daño ambiental y el calor del estilizado.</p>
                    <p class="mt-3 text-center" style="color: blue;">Beneficios para el Cabello:</p>
                    <p style="color: #f5f5f5">* Cabello más Liso y Manejable: Reduce el frizz y facilita el peinado diario, dejando el cabello más suave y fácil de manejar.</p>
                    <p style="color: #f5f5f5">* Brillo Natural: Restaura el brillo y la vitalidad del cabello, mejorando su apariencia general.</p>
                    <p style="color: #f5f5f5">* Reparación Profunda: Ayuda a reparar el cabello dañado y debilitado, fortaleciéndolo desde la estructura interna.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contacto -->
<section id="contacto" style="background-color: #000; color: #000; padding: 60px 0;">
    <div class="container">
        <h2 class="text-center mb-5" style="font-size: 36px; font-weight: bold; text-transform: uppercase;">Contáctanos</h2>
        <div class="row justify-content-center">
            <div class="col-md-8 mb-4 text-center">
                <p>Si tienes alguna pregunta sobre nuestros servicios, deseas agendar una cita o simplemente necesitas más información, no dudes en contactarnos.</p>
                <h4 class="mb-4">Dirección</h4>
                <p>Residencial los Olivos, El Paraiso, El Paraiso</p>
                <div class="mt-4">
                    <a href="https://api.whatsapp.com/send?phone=50489373440" class="btn btn-success btn-lg" target="_blank" style="font-size: 20px; padding: 15px 30px; border-radius: 50px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
