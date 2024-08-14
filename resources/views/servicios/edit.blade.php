@extends('adminlte::page')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('servicios.index') }}">Servicios</a></li>
            <li aria-current="page" class="breadcrumb-item active">Editando el servicio de: {{ $servicio->nombre }}</li>
           
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <form action="{{ route('servicios.update', $servicio->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 order-md-2 position-relative">
                            <div class="form-group">
                                <label class="font-weight-bold-custom mb-1">Cambiar Imagen</label>
                                <div class="image-placeholder" id="imagePlaceholder" style="cursor: pointer; background-image: url({{ asset('storage/' . $servicio->imagen) }});">
                                    @if (!$servicio->imagen)
                                        <p class="text-sm text-gray-400 pt-1 tracking-wider">Seleccione la imagen</p>
                                    @endif
                                </div>
                                <input type="file" name="imagen" class="form-control-file d-none" id="imagenInput">
                            </div>
                        </div>

                        <div class="col-md-6 order-md-1">
                            <div class="form-group">
                                <label for="nombre" class="font-weight-bold-custom">Nombre</label>
                                <input type="text" name="nombre" value="{{ $servicio->nombre }}" placeholder="Nombre del servicio" class="form-control" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="descripcion" class="font-weight-bold-custom">Descripción</label>
                                <textarea name="descripcion" placeholder="Añada los detalles sobre el servicio" class="form-control" rows="3">{{ $servicio->descripcion }}</textarea>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="categoria_id" class="font-weight-bold-custom">Categoría</label>
                                <select name="categoria_id" class="form-control" required>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ $categoria->id == $servicio->categoria_id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="disponibilidad" class="font-weight-bold-custom">Disponibilidad</label>
                                <input type="checkbox" name="disponibilidad" {{ $servicio->disponibilidad ? 'checked' : '' }}>
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

        input[type="file"].d-none {
            display: none;
        }
      
    </style>
@stop
