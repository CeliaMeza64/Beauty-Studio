@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        @include('plantilla.breadcrumbs', ['breadcrumbs' => [
            ['url' => route('trends.index'), 'title' => 'Tendencias'],
            ['url' => route('trends.edit', $trend->id), 'title' => 'Editar']
        ]])
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <form action="{{ route('trends.update', $trend->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 order-md-2 position-relative">
                            <div class="form-group">
                                <label class="font-weight-bold-custom mb-1">Cambiar Imagen</label>
                                <div class="image-placeholder" id="imagePlaceholder" style="cursor: pointer; background-image: url({{ $trend->image ? asset('storage/trends_images/' . $trend->image) : '' }});">
                                    @if (!$trend->image)
                                        <p class="text-sm text-gray-400 pt-1 tracking-wider">Seleccione la imagen</p>
                                    @endif
                                </div>
                                <input type="file" name="image" class="form-control-file d-none" id="imageInput">
                            </div>
                        </div>

                        <div class="col-md-6 order-md-1">
                            <div class="form-group">
                                <label for="title" class="font-weight-bold-custom">Título</label>
                                <input type="text" name="title" value="{{ $trend->title }}" placeholder="Título de la tendencia" class="form-control" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="description" class="font-weight-bold-custom">Descripción</label>
                                <textarea name="description" placeholder="Añada los detalles sobre la tendencia" class="form-control" rows="3" required>{{ $trend->description }}</textarea>
                            </div>
                            <br>

                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center">
                                    <div style="align-items: center; justify-content: center; display: flex;">
                                        <button type="submit" class="btn btn-outline-success btn-block" tabindex="4" style="margin-right: 10px; flex: 1;">
                                            <span class="fas fa-save"></span> Actualizar
                                        </button>
                                        <a href="{{ route('trends.index') }}" class="btn btn-outline-danger btn-block" tabindex="5" style="flex: 1;">
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
                    document.getElementById('imageInput').click();
                });

                document.getElementById('imageInput').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const placeholder = document.getElementById('imagePlaceholder');
                        placeholder.style.backgroundImage = 'url(' + e.target.result + ')';
                        placeholder.style.backgroundSize = 'cover';
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
