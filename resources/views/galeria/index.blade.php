@extends('adminlte::page')

@section('title', 'Galería de Imágenes')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Galería</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{ route('galeria.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Añadir Imagen
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success mt-2">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row mt-4">
                    @forelse ($images as $image)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/' . $image->imagen) }}" class="card-img-top" alt="Imagen de galería" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <!-- Contenedor para los botones alineados a la izquierda -->
                                    <div class="d-flex">
                                        <a href="{{ route('galeria.show', $image->id) }}" class="btn btn-info mr-2">Ver Detalle</a>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal_{{ $image->id }}">
                                             Eliminar
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal para confirmar la eliminación -->
                            <div class="modal fade" id="eliminarModal_{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel_{{ $image->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eliminarModalLabel_{{ $image->id }}">Eliminar Imagen</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Realmente quieres eliminar esta imagen?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('galeria.destroy', $image->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin del modal -->
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                No hay imágenes todavía.
                            </div>
                        </div>
                    @endforelse
                </div>

                {{-- Paginación --}}
                {{ $images->links() }}
            </div>
        </div>
    </div>
@endsection
