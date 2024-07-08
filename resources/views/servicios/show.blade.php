@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Servicio</h1>
    <a href="{{ route('servicios.index') }}" class="btn btn-primary mb-3">Volver a la lista</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $servicio->nombre }}</h5>
            <p class="card-text"><strong>Descripción:</strong> {{ $servicio->descripcion }}</p>
            <p class="card-text"><strong>Categoría:</strong> {{ $servicio->categoria->nombre }}</p>
            @if ($servicio->imagen)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $servicio->imagen) }}" alt="Imagen del servicio" class="img-fluid" style="max-width: 200px;">
                </div>
            @else
                <p>No hay imagen disponible</p>
            @endif
        </div>
    </div>
</div>
@endsection
