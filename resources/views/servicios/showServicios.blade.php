@extends('layouts.app')

@section('background_image')
{{''}}
@endsection

@section('content')
<div class="container">
    <h1>Servicios de {{ ucfirst($categoriaN) }}</h1>

    @if(Auth::check() && Auth::user()->role == 'admin')
        <a href="{{ route('servicios.index') }}" class="btn btn-primary mb-3">Volver a la lista</a>
    @endif

    <div class="row">
        @forelse($servicios as $servicio)
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card h-100 ">
                        @if ($servicio->imagen)
                            <img src="{{ asset('storage/' . $servicio->imagen) }}" alt="Imagen del servicio" class="card-img-top img-fluid rounded">
                        @else
                            <img src="ruta/a/imagen/placeholder.jpg" alt="Imagen no disponible" class="card-img-top img-fluid rounded">
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $servicio->nombre }}</h2>
                            <p class="card-text" title="{{ $servicio->descripcion }}">{{ $servicio->descripcion }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p>Lo sentimos no hay servicios disponibles en esta categoría.</p>
        @endforelse
    </div>
</div>
@endsection
