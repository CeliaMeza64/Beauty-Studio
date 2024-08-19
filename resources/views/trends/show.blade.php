@extends('layouts.app')

@section('background_image')
{{''}}
@endsection

@section('content')
<div class="container">
    <h1>Tendencias</h1>

    @if(Auth::check() && Auth::user()->role == 'admin')
        <a href="{{ route('trends.index') }}" class="btn btn-primary mb-3">Volver a la lista</a>
    @endif

    <div class="row">
        @forelse($trends as $trend)
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card h-100">
                        @if ($trend->image && $trend->image !== 'noimage.jpg')
                            <img src="{{ asset('storage/trends_images/' . $trend->image) }}" alt="{{ $trend->title }}" class="card-img-top img-fluid rounded">
                        @else
                            <img src="ruta/a/imagen/placeholder.jpg" alt="Imagen no disponible" class="card-img-top img-fluid rounded">
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $trend->title }}</h2>
                            <p class="card-text" title="{{ $trend->description }}">{{ $trend->description }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p>Lo sentimos, no hay tendencias disponibles en este momento.</p>
        @endforelse
    </div>
</div>
@endsection
