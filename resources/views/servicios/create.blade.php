@extends('adminlte::page')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('servicios.index') }}">Servicios</a></li>
            <li aria-current="page" class="breadcrumb-item active">Crear un servicio</li>
           
        </ol>
    </nav>
@endsection
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
                                <label class="font-weight-bold-custom mb-1">Subir Imagen</label>
                                <div class="image-placeholder" id="imagePlaceholder" style="cursor: pointer;">
                                    <p class="text-sm text-gray-400 pt-1 tracking-wider">Seleccione la imagen</p>
                                </div>
                                <input type="file" name="imagen" class="form-control-file d-none" id="imagenInput">
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

                            <div class="row justify-content-start">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-outline-success mr-2" style="flex: 1;" tabindex="4">
                                            <span class="fas fa-user-plus"></span> Actualizar
                                        </button>
                                        <a href="{{ route('servicios.index') }}" class="btn btn-outline-danger" style="flex: 1;" tabindex="4">
                                            <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Script para ver la imagen antes de CREAR UN NUEVO SERVICIO -->
            <script>
                document.getElementById('imagePlaceholder').addEventListener('click', function() {
                    document.getElementById('imagenInput').click();
                });

                document.getElementById('imagenInput').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const placeholder = document.getElementById('imagePlaceholder');
                        placeholder.style.backgroundImage = 'url(' + e.target.result + ')';
                        placeholder.style.backgroundSize = 'contain';
                        placeholder.style.backgroundPosition = 'center';
                        placeholder.innerHTML = '';
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
            width: 350px;
            height: 350px; /* Ajusta según el tamaño del contenedor que desees */
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed #ddd;
            border-radius: 5px;
            background-color: #f8f9fa; /* Color de fondo si no hay imagen */
            background-size: cover; /* Ajusta la imagen para que se muestre completa */
            background-repeat: no-repeat; /* No repetir la imagen */
            background-position: center; /* Centra la imagen en el contenedor */
            color: #aaa;
            font-size: 1.2em;
            text-align: center;
            position: relative;
            overflow: hidden; /* Oculta cualquier parte de la imagen que sobresalga */
        }

        .image-placeholder p {
            margin: 0;
            position: absolute;
        }

        /* Ocultar input file por completo */
        input[type="file"].d-none {
            display: none !important;
        }
    </style>
@stop
