@extends('layouts.app')

@section('content')
<div class="container">
    <h1> Nuevo Servicio</h1>
    <form action="{{ route('servicios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"  placeholder="Nombre del servicio"class="form-control" required>
        </div>
        </br>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion"  placeholder="Añada los detalles sobre el servicio" class="form-control" rows="3"></textarea>
        </div>
        </br>

        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        </br>
        </br>
       

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" class="form-control-file">
        </div>

        </br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
