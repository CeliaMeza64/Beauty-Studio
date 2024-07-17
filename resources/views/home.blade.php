@extends('adminlte::page')

@section('title', 'Panel de Administración')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        @include('plantilla.breadcrumbs', ['breadcrumbs' => [
            ['url' => route('home'), 'title' => 'Servicios']
        ]])
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{ route('servicios.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Crear
                    </a>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Disponibilidad</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($servicios as $servicio)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $servicio->nombre }}</td>
                                <td>{{ $servicio->descripcion }}</td>
                                <td>{{ $servicio->categoria->nombre ?? 'No Asignada' }}</td>
                                <td>{{ $servicio->disponibilidad ? 'Disponible' : 'No Disponible' }}</td>
                                <td>
                                    @if ($servicio->imagen)
                                        <img src="{{ asset('storage/' . $servicio->imagen) }}" alt="Imagen" style="width: 50px;">
                                    @else
                                        No hay imagen
                                    @endif
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-success mr-2" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                    
                                    <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este servicio?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              
            </div>
        </div>
    </div>
    {{$servicios->links()}}
@stop

@section('css')
    <style>
        .breadcrumb-item a, 
        .breadcrumb-item.active {
            font-size: 1.30em; 
        }
    </style>
@stop
