@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        @include('plantilla.breadcrumbs', ['breadcrumbs' => [
            ['url' => route('reservas.index'), 'title' => 'Reservas'],
            ['url' => route('reservas.create'), 'title' => 'Crear']
        ]])
    </div>
@stop
@section('content')
    <div class="container">
        @if (session('success'))
            <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeSuccessMessage()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h1>Lista de Reservas</h1>
        <a href="{{ route('reservas.create') }}" class="btn btn-primary mb-2">Crear Reserva</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del Cliente</th>
                    <th>Servicio</th>
                    <th>Fecha de Reserva</th>
                    <th>Hora de Reserva</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $reserva->nombre_cliente }}</td>
                        <td>{{ $reserva->servicio }}</td>
                        <td>{{ $reserva->fecha_reservacion }}</td>
                        <td>{{ $reserva->hora_reservacion }}</td>
                        <td>{{ $reserva->estado }}</td>
                        <td>
                            <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('reservas.confirm', $reserva->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Confirmar</button>
                            </form>
                            <form action="{{ route('reservas.cancel', $reserva->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Cancelar</button>
                            </form>
                            <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-secondary">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function closeSuccessMessage() {
            document.getElementById('successMessage').style.display = 'none';
        }
    </script>
@endsection
