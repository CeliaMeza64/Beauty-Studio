@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Reserva</h1>

        <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre_cliente">Nombre del Cliente</label>
                <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" value="{{ $reserva->nombre_cliente }}" required>
            </div>

            <div class="form-group">
                <label for="servicio">Servicio</label>
                <input type="text" name="servicio" id="servicio" class="form-control" value="{{ $reserva->servicio }}" required>
            </div>

            <div class="form-group">
                <label for="fecha_reservacion">Fecha de Reserva</label>
                <input type="date" name="fecha_reservacion" id="fecha_reservacion" class="form-control" value="{{ $reserva->fecha_reservacion }}" min="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="hora_reservacion">Hora de Reserva</label>
                <input type="text" name="hora_reservacion" id="hora_reservacion" class="form-control" value="{{ \Carbon\Carbon::createFromFormat('H:i:s', $reserva->hora_reservacion)->format('h:i A') }}" required>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="pendiente" {{ $reserva->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="confirmada" {{ $reserva->estado == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                    <option value="cancelada" {{ $reserva->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
        </form>
    </div>
@endsection



