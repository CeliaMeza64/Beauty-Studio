@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        @include('plantilla.breadcrumbs', ['breadcrumbs' => [
            ['url' => route('reservas.index'), 'title' => 'Reservas']
        ]])
    </div>
@stop

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center text-white">Lista de Reservas</h1>

        @if ($reservas->isEmpty())
            <p class="text-white">No hay reservas.</p>
        @else
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Nombre del Cliente</th>
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
                            <td>{{ $reserva->nombre_cliente }}</td>
                            <td>{{ $reserva->servicio }}</td>
                            <td>{{ \Carbon\Carbon::parse($reserva->fecha_reservacion)->format('d/m/Y') }}</td>
                            <td>{{ $reserva->hora_reservacion }}</td>
                            <td>{{ ucfirst($reserva->estado) }}</td>
                            <td>
                                @if ($reserva->estado == 'pendiente')
                                    <form action="{{ route('reservas.confirm', $reserva) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Confirmar</button>
                                    </form>
                                    <form action="{{ route('reservas.cancel', $reserva) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
                                    </form>
                                @endif
                                <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
