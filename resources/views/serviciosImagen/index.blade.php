@extends('adminlte::page')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Servicios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Imágenes del Servicio: {{ $servicio->nombre }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('serviciosImagen.create', $servicio->id) }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Añadir Imagen
            </a>

            @if($images->isEmpty())
                <p>No hay imágenes para este servicio.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Imágenes</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $image)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $image->path) }}" alt="Imagen" style="width: 150px; height: auto; max-height: 100px; object-fit: cover;">
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('serviciosImagen.edit', [$servicio->id, $image->id]) }}" class="btn btn-success mr-2" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Botón de icono de eliminar -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarModal_{{ $image->id }}" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        <!-- Modal de confirmación -->
                                        <div class="modal fade" id="eliminarModal_{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel_{{ $image->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="eliminarModalLabel_{{ $image->id }}">Eliminar imagen</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Realmente quieres eliminar esta imagen?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('serviciosImagen.destroy', [$servicio->id, $image->id]) }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del modal -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
