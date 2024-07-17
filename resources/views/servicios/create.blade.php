@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        @include('plantilla.breadcrumbs', ['breadcrumbs' => [
            ['url' => route('servicios.index'), 'title' => 'Servicios'],
            ['url' => route('servicios.create'), 'title' => 'Crear']
        ]])
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <form action="{{ route('servicios.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Columna para la imagen nueva -->
                        <div class="col-md-6 order-md-2 position-relative">
                            <div class="form-group">
                                <label for="imagen" class="font-weight-bold-custom"></label>
                                <div class="image-placeholder" id="imagePlaceholder">
                                </div>
                                <input type="file" name="imagen" class="form-control-file d-none" id="imagenInput">
                                <label for="imagenInput" class="btn btn-primary btn-sm mt-2">
                                    <i class="fas fa-upload"></i> Agregar imagen
                                </label>
                            </div>

                            <div class="mt-3">
                                <img id="imagenPreview" src="#" alt="Vista previa de la nueva imagen" class="img-fluid d-none rounded" style="width: 250px; height: 250px; object-fit: cover;">
                            </div>
                        </div>

                        <!-- Columna del texto -->
                        <div class="col-md-6 order-md-1">
                            <div class="form-group">
                                <label for="nombre" class="font-weight-bold-custom">Nombre</label>
                                <input type="text" name="nombre" placeholder="Nombre del servicio" class="form-control" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="descripcion" class="font-weight-bold-custom">Descripción</label>
                                <textarea name="descripcion" placeholder="Añada los detalles sobre el servicio" class="form-control" rows="3"></textarea>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="categoria_id" class="font-weight-bold-custom">Categoría</label>
                                <select name="categoria_id" class="form-control" required>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="disponibilidad" class="font-weight-bold-custom">Disponibilidad</label>
                                <input type="checkbox" name="disponibilidad" checked>
                            </div>
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
                        </div>
                    </div>
                </form>
            </div>

            <script>
                document.getElementById('imagenInput').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const preview = document.getElementById('imagenPreview');
                        const placeholder = document.getElementById('imagePlaceholder');
                        preview.src = e.target.result;
                        preview.classList.remove('d-none'); // Mostrar vista previa
                        placeholder.classList.add('d-none'); // Ocultar el texto de "Agregar una imagen"
                    };
                    
                    reader.readAsDataURL(file);
                });
            </script>
        </div>
    </div>
@stop

@section('css')
    <style>
        .breadcrumb-item a, 
        .breadcrumb-item.active {
            font-size: 1.30em; 
        }

        .image-placeholder {
            width: 250px;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed #ddd;
            border-radius: 5px;
            color: #aaa;
            font-size: 1.2em;
            text-align: center;
        }

        .image-placeholder p {
            margin: 0;
        }
    </style>
@stop
