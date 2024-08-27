@extends('adminlte::page')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('paginaInicio.index') }}">Página de inicio</a></li>
            <li aria-current="page" class="breadcrumb-item active">Agregar un servicio a la Página de inicio</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <form action="{{ route('paginaInicio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Columna para la imagen nueva -->
                        <div class="col-md-6 order-md-2 position-relative">
                            <div class="form-group">
                                <label class="font-weight-bold-custom mb-1">Subir Imagen</label>
                                <div class="image-placeholder @error('imagen') is-invalid @enderror" id="imagePlaceholder" style="cursor: pointer;">
                                    <p class="text-sm text-gray-400 pt-1 tracking-wider">Seleccione la imagen</p>
                                </div>
                                <input type="file" name="imagen" class="form-control-file d-none" id="imagenInput">
                                @error('imagen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Columna del texto -->
                        <div class="col-md-6 order-md-1">
                            <div class="form-group">
                                <label for="titulo" class="font-weight-bold-custom">Título</label>
                                <input type="text" name="titulo" id="titulo" placeholder="Título de la Página" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}" required maxlength="25">
                                @error('titulo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="descripcion" class="font-weight-bold-custom">Descripción</label>
                                <textarea name="descripcion" placeholder="Añada los detalles de la Página" class="form-control @error('descripcion') is-invalid @enderror" rows="3" required>{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>

                            <div class="row justify-content-start">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-outline-success mr-2" style="flex: 1;" tabindex="4">
                                            <span class="fas fa-user-plus"></span> Crear
                                        </button>
                                        <a href="{{ route('paginaInicio.index') }}" class="btn btn-outline-danger" style="flex: 1;" tabindex="4">
                                            <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Script para ver la imagen antes de CREAR UNA NUEVA PÁGINA -->
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

                // Validar si la imagen está seleccionada antes de enviar el formulario
                document.querySelector('form').addEventListener('submit', function(event) {
                    var imagenInput = document.getElementById('imagenInput');
                    var placeholder = document.getElementById('imagePlaceholder');
                    if (!imagenInput.files.length) {
                        placeholder.classList.add('is-invalid');
                        event.preventDefault(); // Detener el envío del formulario
                        alert('Por favor, seleccione una imagen antes de enviar el formulario.');
                    } else {
                        placeholder.classList.remove('is-invalid');
                    }
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
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed #ddd;
            border-radius: 5px;
            background-color: #f8f9fa;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: #aaa;
            font-size: 1.2em;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .image-placeholder p {
            margin: 0;
            position: absolute;
        }

        .input-group .is-invalid {
            border-color: #dc3545; /* Color rojo para el borde */
            box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .25); /* Sombra de borde */
        }

        .invalid-feedback {
            display: block;
        }

        input[type="file"].d-none {
            display: none !important;
        }
    </style>
@stop
