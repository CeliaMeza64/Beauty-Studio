@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Reserva</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre_cliente">Nombre del Cliente:</label>
            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" value="{{ old('nombre_cliente') }}">
        </div>

        <div class="form-group">
            <label for="servicio">Servicio:</label>
            <input type="text" name="servicio" id="servicio" class="form-control" value="{{ old('servicio') }}">
        </div>

        <div class="form-group">
            <label for="fecha_reservacion">Fecha de Reservación:</label>
            <input type="date" name="fecha_reservacion" id="fecha_reservacion" class="form-control" value="{{ old('fecha_reservacion') }}">
        </div>

        <div class="form-group">
            <label for="hora_reservacion">Hora de Reservación:</label>
            <input type="text" name="hora_reservacion" id="hora_reservacion" class="form-control" placeholder=" " value="{{ old('hora_reservacion') }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection