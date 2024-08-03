@extends('layouts.app')

@section('title', 'Servicios')

@section('content')
<h2 class="services-title">Servicios</h2>

<div class="card-container">
  <div class="card">
    <a href="{{ route('servicios.showServicios', 'manicura') }}">
      <img src="{{ asset('imagenes/manicura.jpg') }}" alt="Servicio 1" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Manicura</h5>
        <p class="card-text">En nuestro salón te ofrecemos una amplia gama de servicios para que tus manos luzcan radiantes.
        Nuestro equipo de expertos está altamente calificado, utilizando técnicas innovadoras y productos 
        de la más alta calidad para garantizarte resultados excepcionales</p>
      </div>
    </a>
  </div>
  <div class="card">
    <a href="{{ route('servicios.showServicios', 'pedicura') }}">
      <img src="{{ asset('imagenes/pedicura.jpg') }}" alt="Servicio 2" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Pedicura</h5>
        <p class="card-text">En nuestro salón te invitamos a sumergirte en una experiencia de bienestar y cuidado integral para tus pies.
        Nuestro equipo de pedicuristas profesionales está a tu disposición para brindarte un servicio personalizado y de la más alta calidad.</p>
      </div>
    </a>
  </div>
  <div class="card">
    <a href="{{ route('servicios.showServicios', 'cabello') }}">
      <img src="{{ asset('imagenes/cabello.jpg') }}" alt="Servicio 3" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Cabello</h5>
        <p class="card-text">En nuestro salón, tu cabello es nuestra prioridad. Te ofrecemos una amplia gama de servicios para que luzcas una melena radiante, sana y llena de vida. 
        Nuestro equipo de estilistas profesionales, altamente capacitados y apasionados por el cuidado capilar, está a tu disposición para brindarte una 
        experiencia personalizada y de la más alta calidad</p>
      </div>
    </a>
  </div>
  <div class="card">
    <a href="{{ route('servicios.showServicios', 'maquillaje') }}">
      <img src="{{ asset('imagenes/maquillajeInicio.jpeg') }}" alt="Servicio 4" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Maquillaje</h5>
        <p class="card-text">En nuestro salón te ofrecemos una amplia gama de servicios de maquillaje para que luzcas radiante en cualquier ocasión. Nuestro equipo de maquilladores 
        profesionales, altamente capacitados y apasionados por el arte del maquillaje, está a tu disposición para brindarte una experiencia personalizada 
        y de la más alta calidad</p>
      </div>
    </a>
  </div>
</div>

<footer class="footer mt-5 py-5" style="background: linear-gradient(135deg, #f9e3e3, #fce4ec); color: #333;">
  <div class="container text-center">
    <div class="row mb-4">
      <div class="col-md-4 mb-3">
        <h5 class="text-uppercase mb-3" style="color: #FF6EA2;">Dirección</h5>
        <p style="font-size: 1.1rem;">El Paraiso, El Paraiso Residencial Los Olivos 2 cuadra</p>
      </div>
      <div class="col-md-4 mb-3">
        <h5 class="text-uppercase mb-3" style="color: #FF6EA2;">Horario</h5>
        <p style="font-size: 1.1rem;">Lunes a Viernes: 9:00 AM - 8:00 PM</p>
        <p style="font-size: 1.1rem;">Sábados: 9:00 AM - 3:00 PM</p>
        <p style="font-size: 1.1rem;">Domingos: Cerrado</p>
      </div>
      <div class="col-md-4 mb-3">
        <h5 class="text-uppercase mb-3" style="color: #FF6EA2;">Contacto</h5>
        <p style="font-size: 1.1rem;">Tel: +504 8937-3440</p>
        <p style="font-size: 1.1rem;">Email: info@beautystudio.com</p>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12">
        <p class="mb-0" style="font-size: 0.9rem; color: #555;">© 2024 Beauty Studio. </p>
      </div>
    </div>
  </div>
</footer>

<style>
  .services-title {
    font-size: 2.5rem;
    text-align: center;
    margin-bottom: 2rem;
    color: #333;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
  }
  
  .card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem; /* Espacio entre las tarjetas */
    justify-content: center; /* Centra el contenido del contenedor */
    margin: 0 auto; /* Centra el contenedor */
    max-width: 1000px; /* Ancho máximo del contenedor */
    padding: 0 1rem; /* Espacio interior para evitar que se pegue a los bordes */
  }

  .card {
    flex: 1 1 calc(50% - 2rem); /* Dos tarjetas por fila */
    max-width: calc(50% - 2rem); /* Ancho máximo de cada tarjeta */
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
  }

  .card:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }

  .card img {
    border-radius: 10px 10px 0 0;
    object-fit: cover;
    width: 100%;
    height: 200px;
  }

  .card-title {
    font-size: 1.5rem;
    color: #FF6EA2;
    margin-bottom: 0.75rem;
  }

  .card-text {
    font-size: 1rem;
    color: #333;
  }

  footer.footer {
    background: linear-gradient(135deg, #f9e3e3, #fce4ec); 
    color: #333;
    padding: 3rem 0;
  }

  footer .text-uppercase {
    font-size: 1.2rem;
    font-weight: bold;
  }

  footer p {
    margin-bottom: 0.75rem;
    font-size: 1rem;
  }

  footer .container {
    max-width: 1000px;
  }
</style>
@endsection
