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
        

        @if ($reservas->isEmpty())
            <p class="text-white">No hay reservas.</p>
        @else
            <table class="table table-striped" style="background-color: #ffe0e6;">
                <thead>
                    <tr>
                        <th style="background-color: #ffccdd;">Nombre del Cliente</th>
                        <th style="background-color: #ffccdd;">Teléfono del Cliente</th>
                        <th style="background-color: #ffccdd;">Servicio</th>
                        <th style="background-color: #ffccdd;">Fecha</th>
                        <th style="background-color: #ffccdd;">Hora</th>
                        <th style="background-color: #ffccdd;">Estado</th>
                        <th style="background-color: #ffccdd;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                        <tr style="background-color: #ffe6eb;">
                            <td>{{ $reserva->nombre_cliente }}</td>
                            <td>{{ $reserva->telefono_cliente }}</td>
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
