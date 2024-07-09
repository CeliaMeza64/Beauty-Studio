@extends('layouts.main')

@section('title', 'Servicios')

@section('content')
<h2 class="services-title">Servicios</h2>

<div class="container card-container mt-4">
  <div class="row">
    <div class="col-md-6">
      <a href="/manicura">
        <div class="card">
          <img src="{{ asset('imagenes/manicura.jpg') }}" alt="Servicio 1" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Manicura</h5>
            <p class="card-text">En nuestro salón te ofrecemos una amplia gama de servicios para que tus manos luzcan radiantes. Nuestro equipo de expertos está altamente calificado, utilizando técnicas innovadoras y productos de la más alta calidad para garantizarte resultados excepcionales.</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="/pedicura">
        <div class="card">
          <img src="{{ asset('imagenes/pedicura.jpg') }}" alt="Servicio 2" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Pedicura</h5>
            <p class="card-text">En nuestro salón te invitamos a sumergirte en una experiencia de bienestar y cuidado integral para tus pies. Nuestro equipo de pedicuristas profesionales está a tu disposición para brindarte un servicio personalizado y de la más alta calidad.</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="/cabello">
        <div class="card">
          <img src="{{ asset('imagenes/cabello.jpg') }}" alt="Servicio 3" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Cabello</h5>
            <p class="card-text">En nuestro salón, tu cabello es nuestra prioridad. Te ofrecemos una amplia gama de servicios para que luzcas una melena radiante, sana y llena de vida. Nuestro equipo de estilistas profesionales, altamente capacitados y apasionados por el cuidado capilar, está a tu disposición para brindarte una experiencia personalizada y de la más alta calidad.</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="/maquillaje">
        <div class="card">
          <img src="{{ asset('imagenes/maquillajeInicio.jpeg') }}" alt="Servicio 4" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Maquillaje</h5>
            <p class="card-text">En nuestro salón te ofrecemos una amplia gama de servicios de maquillaje para que luzcas radiante en cualquier ocasión. Nuestro equipo de maquilladores profesionales, altamente capacitados y apasionados por el arte del maquillaje, está a tu disposición para brindarte una experiencia personalizada y de la más alta calidad.</p>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
@endsection