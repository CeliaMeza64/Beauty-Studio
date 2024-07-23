@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center text-white">Crear Reserva</h1>

        <form id="reservaForm" method="POST" action="{{ route('reservas.store') }}" onsubmit="return confirmSubmission(event)" class="bg-dark p-4 rounded text-white mx-auto" style="max-width: 600px;">
            @csrf
            <div class="form-group">
                <label for="nombre_cliente">Nombre del Cliente:</label>
                <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" value="{{ old('nombre_cliente') }}" required>
            </div>

            <div class="form-group">
                <label for="servicio">Servicio:</label>
                <select name="servicio" id="servicio" class="form-control">
                    <optgroup label="Cabello">
                        <option value="cabello_planchado" {{ old('servicio') == 'cabello_planchado' ? 'selected' : '' }}>Planchado</option>
                        <option value="cabello_ondas" {{ old('servicio') == 'cabello_ondas' ? 'selected' : '' }}>Ondas</option>
                        <option value="cabello_peinados" {{ old('servicio') == 'cabello_peinados' ? 'selected' : '' }}>Peinados</option>
                    </optgroup>
                    <optgroup label="Maquillaje">
                        <option value="maquillaje_natural" {{ old('servicio') == 'maquillaje_natural' ? 'selected' : '' }}>Natural</option>
                        <option value="maquillaje_festivo" {{ old('servicio') == 'maquillaje_festivo' ? 'selected' : '' }}>Festivo</option>
                    </optgroup>
                    <optgroup label="Manicure">
                        <option value="manicure_basico" {{ old('servicio') == 'manicure_basico' ? 'selected' : '' }}>Básico</option>
                        <option value="manicure_especial" {{ old('servicio') == 'manicure_especial' ? 'selected' : '' }}>Especial</option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_reservacion">Fecha de Reservación:</label>
                <input type="date" name="fecha_reservacion" id="fecha_reservacion" class="form-control" min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}" value="{{ old('fecha_reservacion') }}" required>
            </div>

            <div class="form-group">
                <label for="hora_reservacion">Hora de Reservación:</label>
                <select name="hora_reservacion" id="hora_reservacion" class="form-control">
                    @foreach (['09:00', '11:00', '13:00', '15:00', '18:00', '20:00'] as $hora)
                        <option value="{{ $hora }}" {{ old('hora_reservacion') == $hora ? 'selected' : '' }}>{{ $hora }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Crear Reserva</button>
        </form>
    </div>

    <script>
        function confirmSubmission(event) {
            return confirm('¿Está seguro de que desea crear esta reserva?');
        }
    </script>
@endsection
