@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        @include('plantilla.breadcrumbs', ['breadcrumbs' => [
            ['url' => route('home'), 'title' => 'Tendencias']
        ]])
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{ route('trends.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Crear
                    </a> 
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trends as $trend)
                            <tr>
                                <td>{{ ($trends->currentPage() - 1) * $trends->perPage() + $loop->iteration }}</td>
                                <td>{{ $trend->title }}</td>
                                <td class="truncate">{{ $trend->description }}</td>
                                <td>
                                    @if ($trend->image && $trend->image !== 'noimage.jpg')
                                        <img src="{{ asset('storage/trends_images/' . $trend->image) }}" alt="Imagen" style="width: 50px;">
                                    @else
                                        No hay imagen
                                    @endif
                                </td>
                                <td class="d-flex align-items-center">
                                    
                                        <a href="{{ route('trends.edit', $trend->id) }}" class="btn btn-success mr-2" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Formulario de eliminación -->
                                        <form action="{{ route('trends.destroy', $trend->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar esta tendencia?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $trends->links() }}
@stop

@section('css')
    <style>
        .breadcrumb-item a, 
        .breadcrumb-item.active {
            font-size: 1.30em; 
        }
        .truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 350px; 
        }
    </style>
@stop
