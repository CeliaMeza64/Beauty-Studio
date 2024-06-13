@extends('plantilla.plantilla')

@section('titulo', 'Servicios')

@section('contenido')

<div class="container mt-4">
    <h1 class="my-4">Servicios</h1>
    <div class="row">
        <!-- Tarjeta de Maquillaje -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="{{ asset('imagenes/resizer.jpeg') }}" alt="Maquillaje">
                <div class="card-body">
                    <h4 class="card-title">Maquillaje</h4>
                    <p class="card-text"></p>
                    <a class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Cabello -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="{{ asset('imagenes/cabello.jpeg') }}" alt="Cabello">
                <div class="card-body">
                    <h4 class="card-title">Cabello</h4>
                    <p class="card-text"></p>
                    <a class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Pedicura -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="{{ asset('imagenes/pedicura.jpg') }}" alt="Pedicura">
                <div class="card-body">
                    <h4 class="card-title">Pedicura</h4>
                    <p class="card-text"></p>
                    <a  class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Manicura -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="{{ asset('imagenes/manicura.jpg') }}" alt="Manicura">
                <div class="card-body">
                    <h4 class="card-title">Manicura</h4>
                    <p class="card-text"></p>
                    <a  class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4">
        <a href="#" class="btn btn-info">Contacto</a>
        <a href="https://wa.me/123456789" class="btn btn-success">WhatsApp</a>
    </div>
</div>

@endsection
