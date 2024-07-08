@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Servicio</h1>
    <form action="{{ route('servicios.update', $servicio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $servicio->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3">{{ $servicio->descripcion }}</textarea>
        </div>


        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $servicio->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen Actual</label>
            <div>
                @if ($servicio->imagen)
                    <img src="{{ asset('storage/' . $servicio->imagen) }}" alt="Imagen del servicio" style="max-width: 200px;">
                @else
                    <p>No hay imagen disponible</p>
                @endif
            </div>
            <label for="imagen">Cambiar Imagen</label>
            <input type="file" name="imagen" class="form-control-file">
        </div>

       
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
