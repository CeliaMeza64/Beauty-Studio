
@extends('adminlte::page')


@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Reservas</li> 
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                @if ($reservas->isEmpty())
                    <p class="text-muted">No hay reservas.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre del Cliente</th>
                                <th>Teléfono del Cliente</th>
                                <th>Servicio</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservas as $reserva)
                                <tr>
                                    <td>{{ ($reservas->currentPage() - 1) * $reservas->perPage() + $loop->iteration }}</td>
                                    <td>{{ $reserva->nombre_cliente }}</td>
                                    <td>{{ $reserva->telefono_cliente }}</td>
                                    <td>{{ $reserva->servicio }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reserva->fecha_reservacion)->format('d/m/Y') }}</td>
                                    <td>{{ $reserva->hora_reservacion }}</td>
                                    <td>{{ ucfirst($reserva->estado) }}</td>
                                    <td class="d-flex align-items-center">
                                        @if ($reserva->estado == 'pendiente')
                                            <form action="{{ route('reservas.confirm', $reserva) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm mr-2">Confirmar</button>
                                            </form>
                                            <form action="{{ route('reservas.cancel', $reserva) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm mr-2">Cancelar</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning btn-sm mr-2">Editar</a>
                                        <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$reservas->links()}}
                @endif
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .breadcrumb-item a,
        .breadcrumb-item.active {
            font-size: 1.30em;
        }
        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
@stop
