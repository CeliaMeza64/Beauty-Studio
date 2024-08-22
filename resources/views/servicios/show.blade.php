@extends('layouts.app')

@section('background_image')
{{''}}
@endsection

@section('content')
<div class="container">
    @if(Auth::check() && Auth::user()->role == 'admin')
        <a href="{{ route('servicios.index') }}" class="btn btn-primary mb-3">Volver a la lista</a>
    @endif

    <div class="card mb-4">
        <div class="row no-gutters">
            <div class="col-md-4">
                @if ($servicio->imagen)
                    <img src="{{ asset('storage/' . $servicio->imagen) }}" alt="Imagen del servicio" class="img-fluid" style="max-width: 100%; height: auto;">
                @else
                    <img src="ruta/a/imagen/placeholder.jpg" alt="Imagen no disponible" class="img-fluid" style="max-width: 100%; height: auto;">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $servicio->nombre }}</h5>
                    <p class="card-text">{{ $servicio->descripcion }}</p>
                    <p class="card-text"><strong>Categoría:</strong> {{ $servicio->categoria->nombre }}</p>
                </div>
            </div>
        </div>
    </div>

   
</div>
@endsection
