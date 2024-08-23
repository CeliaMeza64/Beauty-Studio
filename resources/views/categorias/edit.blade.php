@extends('adminlte::page')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Categorías</a></li>
            <li aria-current="page" class="breadcrumb-item active">Editando la categoría: {{ $categoria->nombre }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <form action="{{ route('categorias.update', $categoria) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre" class="font-weight-bold-custom">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $categoria->nombre }}" required>
                                <div class="invalid-feedback">Por favor, ingrese el nombre de la categoría.</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estado" class="font-weight-bold-custom">Estado</label>
                                <select name="estado" id="estado" class="form-control" required>
                                    <option value="1" {{ $categoria->estado ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ !$categoria->estado ? 'selected' : '' }}>Inactivo</option>
                                </select>
                                <div class="invalid-feedback">Por favor, seleccione el estado.</div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-start">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <button type="submit" class="btn btn-outline-success mr-2" style="flex: 1;">
                                    <span class="fas fa-save"></span> Actualizar
                                </button>
                                <a href="{{ route('categorias.index') }}" class="btn btn-outline-danger" style="flex: 1;">
                                    <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                document.querySelectorAll('input, select').forEach(function(element) {
                    element.addEventListener('input', function() {
                        element.classList.remove('is-invalid');
                    });
                });

                document.querySelector('form').addEventListener('submit', function(event) {
                    let isValid = true;
                    const requiredFields = document.querySelectorAll('form [required]');
                    
                    requiredFields.forEach(function(field) {
                        if (!field.value.trim()) {
                            field.classList.add('is-invalid');
                            isValid = false;
                        } else {
                            field.classList.remove('is-invalid');
                        }
                    });

                    if (!isValid) {
                        event.preventDefault();
                        alert('Por favor, complete todos los campos obligatorios.');
                    }
                });
            </script>
        </div>
    </div>
@stop

@section('css')
    <style>
        .is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            display: none;
            color: #dc3545;
        }

        .is-invalid ~ .invalid-feedback {
            display: block;
        }
    </style>
@stop
