@extends('layouts.app')

@section('title', 'Galería de Imágenes')
@section('background_image')
{{''}}
@endsection

@section('content')
    <h1>Galería </h1>
    @if(Auth::check() && Auth::user()->role == 'admin')
        <a href="{{ route('galeria.index') }}" class="btn btn-primary mb-3">Volver a la galeria</a>
    @endif

    <div class="row">
        @forelse ($images as $image)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $image->imagen) }}" class="card-img-top" alt="Imagen de galería" style="height: 250px; object-fit: cover;">
                </div>
            </div>
        @empty
            <p>Lo sentimos, no hay imágenes disponibles todavía.</p>
        @endforelse
    </div>

    <style>
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
@endsection
