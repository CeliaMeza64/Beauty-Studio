@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        @include('plantilla.breadcrumbs', ['breadcrumbs' => [
            ['url' => route('servicios.index'), 'title' => 'Servicios'],
            ['url' => route('servicios.edit', $servicio->id), 'title' => 'Editando el servicio de : ' . $servicio->nombre]
        ]])
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <!-- Columna para la imagen actual y cambiar imagen -->
                    <div class="col-md-6 order-md-2 position-relative">
                        <div class="mb-3">
                            <label for="imagenActual" class="font-weight-bold-custom">Imagen Actual del Servicio</label>
                            <div style="width: 250px; height: 250px; position: relative;">
                                @if ($servicio->imagen)
                                    <img id="imagenActual" src="{{ asset('storage/' . $servicio->imagen) }}" alt="Imagen del servicio" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <p>No hay imagen disponible</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-left">
                            <input type="file" name="imagen" class="form-control-file d-none" id="imagenInput">
                            <label for="imagenInput" class="btn btn-primary btn-sm">Cambiar Imagen</label>
                        </div>

                        <div class="mt-3">
                            <img id="imagenPreview" src="#" alt="Vista previa de la nueva imagen" class="img-fluid d-none rounded position-absolute" style="width: 250px; height: 250px; object-fit: cover; top: 0; left: 0;">
                        </div>
                    </div>

                    <!-- Columna del texto -->
                    <div class="col-md-6 order-md-1">
                        <form action="{{ route('servicios.update', $servicio->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre" class="font-weight-bold-custom">Nombre del Servicio</label>
                                <input type="text" name="nombre" class="form-control" value="{{ $servicio->nombre }}" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion" class="font-weight-bold-custom">Descripción del Servicio</label>
                                <textarea name="descripcion" class="form-control" rows="3" style="white-space: pre-line;">{{ $servicio->descripcion }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="categoria_id" class="font-weight-bold-custom">Categoría del Servicio</label>
                                <select name="categoria_id" class="form-control" required>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ $servicio->categoria_id == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="disponibilidad" class="font-weight-bold-custom">Disponibilidad</label>
                                <input type="checkbox" name="disponibilidad" {{ $servicio->disponibilidad ? 'checked' : '' }}>
                            </div>
                            <br>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center">
                                    <div style="align-items: center; justify-content: center; display: flex;">
                                        <button type="submit" class="btn btn-outline-success btn-block" tabindex="4" style="margin-right: 10px; flex: 1;">
                                            <span class="fas fa-user-plus"></span> Guardar
                                        </button>
                                        <a href="{{ route('servicios.index') }}" class="btn btn-outline-danger btn-block" tabindex="5" style="flex: 1;">
                                            <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                document.getElementById('imagenInput').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const preview = document.getElementById('imagenPreview');
                        const imagenActual = document.getElementById('imagenActual');
                        if (imagenActual) {
                            imagenActual.classList.add('d-none'); // Ocultar imagen actual
                        }
                        preview.src = e.target.result;
                        preview.classList.remove('d-none'); // Mostrar vista previa
                    };
                    
                    reader.readAsDataURL(file);
                });
            </script>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .breadcrumb-item a, 
        .breadcrumb-item.active {
            font-size: 1.30em; 
        }
    </style>
@stop
