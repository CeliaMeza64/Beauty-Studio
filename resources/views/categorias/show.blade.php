@extends('adminlte::page')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Categorías</a></li>
            <li aria-current="page" class="breadcrumb-item active">Detalles de la categoría: {{ $categoria->nombre }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container">
        @if(Auth::check() && Auth::user()->role == 'admin')
            <a href="{{ route('categorias.index') }}" class="btn btn-primary mb-3">Volver a la lista</a>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $categoria->nombre }}</h5>
                <p class="card-text"><strong>Estado:</strong> {{ $categoria->estado ? 'Activo' : 'Inactivo' }}</p>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection
