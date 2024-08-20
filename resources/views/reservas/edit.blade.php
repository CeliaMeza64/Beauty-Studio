@extends('adminlte::page')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('reservas.index') }}">Reserva</a></li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="container">
    <h2>Editar Reserva</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="{{ old('nombre_cliente', $reserva->nombre_cliente) }}" required>
        </div>

        <div class="mb-3">
            <label for="telefono_cliente" class="form-label">Teléfono del Cliente</label>
            <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" value="{{ old('telefono_cliente', $reserva->telefono_cliente) }}" required>
        </div>

        <div class="mb-3">
            <label for="servicio" class="form-label">Servicio</label>
            <input type="text" class="form-control" id="servicio" name="servicio" value="{{ old('servicio', $reserva->servicio) }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_reservacion" class="form-label">Fecha de Reservación</label>
            <input type="date" class="form-control" id="fecha_reservacion" name="fecha_reservacion" value="{{ old('fecha_reservacion', $reserva->fecha_reservacion) }}" required>
        </div>

        <div class="mb-3">
            <label for="hora_reservacion" class="form-label">Hora de Reservación</label>
            <select class="form-control" id="hora_reservacion" name="hora_reservacion" required>
                <option value="09:00" {{ $reserva->hora_reservacion == '09:00' ? 'selected' : '' }}>09:00 AM</option>
                <option value="11:00" {{ $reserva->hora_reservacion == '11:00' ? 'selected' : '' }}>11:00 AM</option>
                <option value="13:00" {{ $reserva->hora_reservacion == '13:00' ? 'selected' : '' }}>01:00 PM</option>
                <option value="15:00" {{ $reserva->hora_reservacion == '15:00' ? 'selected' : '' }}>03:00 PM</option>
                <option value="18:00" {{ $reserva->hora_reservacion == '18:00' ? 'selected' : '' }}>06:00 PM</option>
                <option value="20:00" {{ $reserva->hora_reservacion == '20:00' ? 'selected' : '' }}>08:00 PM</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
    </form>
</div>
@endsection