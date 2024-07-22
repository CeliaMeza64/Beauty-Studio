@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Reserva</h1>

    <form id="reservaForm" method="POST" action="{{ route('reservas.store') }}" onsubmit="return confirmSubmission(event)">
        @csrf
        <div class="form-group">
            <label for="nombre_cliente">Nombre del Cliente:</label>
            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" value="{{ old('nombre_cliente') }}" required>
        </div>

        <div class="form-group">
            <label for="servicio">Servicio:</label>
            <select name="servicio" id="servicio" class="form-control" required>
                <optgroup label="Cabello">
                    <option value="cabello_planchado" {{ old('servicio') == 'cabello_planchado' ? 'selected' : '' }}>Planchado</option>
                    <option value="cabello_ondas" {{ old('servicio') == 'cabello_ondas' ? 'selected' : '' }}>Ondas</option>
                    <option value="cabello_peinados" {{ old('servicio') == 'cabello_peinados' ? 'selected' : '' }}>Peinados</option>
                </optgroup>
                <optgroup label="Manicura">
                    <option value="manicura_acrilicas" {{ old('servicio') == 'manicura_acrilicas' ? 'selected' : '' }}>Acrílicas</option>
                    <option value="manicura_base_rubber" {{ old('servicio') == 'manicura_base_rubber' ? 'selected' : '' }}>Base Rubber</option>
                    <option value="manicura_bano_acrilico" {{ old('servicio') == 'manicura_bano_acrilico' ? 'selected' : '' }}>Baño Acrílico</option>
                    <option value="manicura_semipermanente" {{ old('servicio') == 'manicura_semipermanente' ? 'selected' : '' }}>Semipermanente</option>
                </optgroup>
                <optgroup label="Pedicura">
                    <option value="pedicura_acripie" {{ old('servicio') == 'pedicura_acripie' ? 'selected' : '' }}>Acripie</option>
                    <option value="pedicura_semipermanente" {{ old('servicio') == 'pedicura_semipermanente' ? 'selected' : '' }}>Semipermanente</option>
                    <option value="pedicura_bano_acrilico" {{ old('servicio') == 'pedicura_bano_acrilico' ? 'selected' : '' }}>Baño de Acrílico</option>
                    <option value="pedicura_pedicura" {{ old('servicio') == 'pedicura_pedicura' ? 'selected' : '' }}>Pedicura</option>
                </optgroup>
                <optgroup label="Maquillaje">
                    <option value="maquillaje_xv" {{ old('servicio') == 'maquillaje_xv' ? 'selected' : '' }}>Maquillaje XV</option>
                    <option value="maquillaje_social" {{ old('servicio') == 'maquillaje_social' ? 'selected' : '' }}>Maquillaje Social</option>
                    <option value="maquillaje_boda" {{ old('servicio') == 'maquillaje_boda' ? 'selected' : '' }}>Maquillaje de Boda</option>
                    <option value="maquillaje_dia" {{ old('servicio') == 'maquillaje_dia' ? 'selected' : '' }}>Maquillaje de Día</option>
                </optgroup>
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_reservacion">Fecha de Reservación:</label>
            <input type="date" name="fecha_reservacion" id="fecha_reservacion" class="form-control" value="{{ old('fecha_reservacion') }}" required>
        </div>

        <div class="form-group">
            <label for="hora_reservacion">Hora de Reservación:</label>
            <div class="d-flex justify-content-between align-items-center">
                <select name="hora" id="hora" class="form-control mr-2" required>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ old('hora') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                <span>:</span>
                <select name="minutos" id="minutos" class="form-control mx-2" required>
                    <option value="00" {{ old('minutos') == '00' ? 'selected' : '' }}>00</option>
                </select>
                <select name="ampm" id="ampm" class="form-control" required>
                    <option value="AM" {{ old('ampm') == 'AM' ? 'selected' : '' }}>AM</option>
                    <option value="PM" {{ old('ampm') == 'PM' ? 'selected' : '' }}>PM</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<script>
function confirmSubmission(event) {
    event.preventDefault(); // Prevent the form from submitting immediately

    // Get the selected time components
    var hora = parseInt(document.getElementById('hora').value);
    var minutos = document.getElementById('minutos').value;
    var ampm = document.getElementById('ampm').value;

    // Validate the selected time
    if (ampm === 'AM' && (hora < 9 || (hora === 12 && minutos === '00'))) {
        alert("La hora de reservación debe estar entre las 9:00 AM y las 8:00 PM.");
        return false;
    }
    if (ampm === 'PM' && (hora > 8 || hora === 12 || (hora === 8 && minutos !== '00'))) {
        alert("La hora de reservación debe estar entre las 9:00 AM y las 8:00 PM.");
        return false;
    }

    // Show confirmation dialog
    if (confirm("¿Estás seguro de la reserva?")) {
        // If confirmed, submit the form
        document.getElementById('reservaForm').submit();
    }
    // If not confirmed, do nothing (the form will not be submitted)
    return false;
}
</script>
@endsection
