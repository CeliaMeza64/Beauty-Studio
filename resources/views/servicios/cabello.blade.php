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
            transition: transform 0.3s ease-in-out;
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
        <p class="lead subtitulo">Nos especializamos en ofrecerle el servicio de cabello de alta calidad, asegurándonos de que estén listas para cualquier ocasión.</p>
        <p class="lead subtitulo">Si lo imaginas, nosotros lo hacemos realidad.</p>
    </div>
</section>
<!-- Servicios -->
<section id="servicios" class="servicio" style="background-color: #f5f5f5; padding: 60px 0;">
    <div class="container">
        <h2 class="text-center mb-5" style="color: #d63384; font-size: 36px; font-weight: bold; text-transform: uppercase;">Nuestros Servicios para el Cabello</h2>
        <div class="row">
            <!-- Planchado -->
            <div class="col-md-6 mb-4">
                <div class="service-box" style="background: #ffffff; padding: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px;">
                    <h3 class="text-center" style="color: #343a40; font-size: 24px; margin-bottom: 20px;">Planchado</h3>
                    <div id="carouselPlanchado" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('imagenes/planchado1.jpeg') }}" alt="Planchado 1" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/planchado2.jpg') }}" alt="Planchado 2" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/planchado3.jpg') }}" alt="Planchado 3" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/planchado4.jpeg') }}" alt="Planchado 4" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/planchado5.jpeg') }}" alt="Planchado 5" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/planchado6.jpeg') }}" alt="Planchado 6" style="border-radius: 8px;">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselPlanchado" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselPlanchado" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                        <p class="mt-3 text-center" style="color: #6c757d;">Nuestros servicios de planchado para el cabello, ofrecen una solución profesional y eficaz para obtener un cabello liso, suave y brillante. Utilizamos técnicas avanzadas y productos de alta calidad para asegurar que tu cabello no solo luzca espectacular, sino que también se mantenga sano y protegido.</p>
                </div>
            </div>

            <!-- Secado -->
            <div class="col-md-6 mb-4">
                <div class="service-box" style="background: #ffffff; padding: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px;">
                    <h3 class="text-center" style="color: #343a40; font-size: 24px; margin-bottom: 20px;">Secado</h3>
                    <div id="carouselSecado" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('imagenes/secado1.jpeg') }}" alt="Secado 1" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/secado2.jpeg') }}" alt="Secado 2" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/secado3.jpeg') }}" alt="Secado 3" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/secado4.jpeg') }}" alt="Secado 3" style="border-radius: 8px;">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselSecado" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselSecado" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                    <p class="mt-3 text-center" style="color: #000;">Nuestros servicios de secado para el cabello están diseñados para ofrecer un acabado profesional y duradero, proporcionando volumen, suavidad y un estilo impecable. Utilizamos herramientas y productos de alta calidad para asegurar que tu cabello se mantenga sano y radiante.</p>
                    <br>
                    <p class="mt-3 text-center" style="color: blue ;">Beneficios para el Cabello:  </p>
                    <p style="color: #000;"> * Volumen y Movimiento: Consigue un cabello con volumen, cuerpo y movimiento natural. </p>
                    <p style="color: #000;" > * Acabado Profesional: Logra un look pulido y de salón que dura más tiempo. </p>
                    <p style="color: #000;" > * Protección: Utilizamos productos que protegen tu cabello del calor, manteniéndolo saludable y fuerte. </p>
                </div>
            </div>
        </div>
            <div class="row">
            <!-- Ondas -->
            <div class="col-md-6 mb-4">
                <div class="service-box" style="background: #ffffff; padding: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px;">
                    <h3 class="text-center" style="color: #343a40; font-size: 24px; margin-bottom: 20px;">Ondas</h3>
                    <div id="carouselOndas" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('imagenes/ondas1.jpeg') }}" alt="Ondas 1" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/ondas2.jpeg') }}" alt="Ondas 2" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/ondas3.jpeg') }}" alt="Ondas 3" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/ondas4.jpeg') }}" alt="Ondas 4" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/ondas5.jpeg') }}" alt="Ondas 5" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/ondas6.jpeg') }}" alt="Ondas 6" style="border-radius: 8px;">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselOndas" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselOndas" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                    <p class="mt-3 text-center" style="color: #6c757d;">Nuestros servicios de ondulado para el cabello ofrecen una manera elegante y versátil de transformar tu estilo, proporcionando ondas naturales, definidas o glamorosas según tus preferencias. Utilizamos técnicas y productos especializados para asegurar que tu cabello luzca radiante y saludable.</p>
                </div>
            </div>

            <!-- Keratinas -->
            <div class="col-md-6 mb-4">
                <div class="service-box" style="background: #ffffff ; padding: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px;">
                    <h3 class="text-center" style="color: #343a40; font-size: 24px; margin-bottom: 20px;">Keratinas</h3>
                    <div id="carouselKeratinas" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('imagenes/keratina1.jpeg') }}" alt="Keratina 1" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/keratina2.jpeg') }}" alt="Keratina 2" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/keratina3.jpeg') }}" alt="Keratina 3" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/keratina4.jpeg') }}" alt="Keratina 4" style="border-radius: 8px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('imagenes/keratina5.jpeg') }}" alt="Keratina 5" style="border-radius: 8px;">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselKeratinas" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselKeratinas" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                    <p class="mt-3 text-center" style="color: #000;"> Nuestros servicios de tratamiento de keratina están diseñados para revitalizar y transformar tu cabello, proporcionando resultados suaves, brillantes y más manejables. La keratina es una proteína natural que fortalece el cabello y lo protege contra el daño ambiental y el calor del estilizado.</p>
                    <p class="mt-3 text-center" style="color: blue;">Beneficios para el Cabello:  </p>
                    <br>
                    <p style="color: #000;"> * Cabello más Liso y Manejable: Reduce el frizz y facilita el peinado diario, dejando el cabello más suave y fácil de manejar.</p>
                    <p style="color: #000;"> * Brillo Natural: Restaura el brillo y la vitalidad del cabello, mejorando su apariencia general.</p>
                    <p style="color: #000;"> * Reparación Profunda: Ayuda a reparar el cabello dañado y debilitado, fortaleciéndolo desde la estructura interna.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        padding: 10px;
    }
    .service-box:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }
    .carousel-inner img {
        transition: transform 0.5s ease;
    }
    .carousel-inner img:hover {
        transform: scale(1.1);
    }
</style>

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

</body>
</html>
