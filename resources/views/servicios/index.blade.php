@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Servicios</h1>
    <a href="{{ route('servicios.create') }}" class="btn btn-primary mb-3">Nuevo</a>
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
                    <td>
                        @if ($servicio->imagen)
                            <img src="{{ asset('storage/' . $servicio->imagen) }}" alt="Imagen" style="width: 50px;">
                        @else
                            No hay imagen
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('servicios.show', $servicio->id) }}" class="btn btn-warning">Ver</a>
                        <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este servicio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
