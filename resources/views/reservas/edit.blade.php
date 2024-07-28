@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        @include('plantilla.breadcrumbs', ['breadcrumbs' => [
            ['url' => route('reservas.index'), 'title' => 'Reservas'],
            ['url' => route('reservas.create'), 'title' => 'Crear'],
            ['url' => route('reservas.edit', $reserva->id), 'title' => 'Editar']
        ]])
    </div>
@stop

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center text-white">Editar Reserva</h1>

        <form id="reservaForm" method="POST" action="{{ route('reservas.update', $reserva) }}" onsubmit="return confirmSubmission(event)" class="bg-dark p-4 rounded text-white mx-auto" style="max-width: 600px;">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre_cliente">Nombre del Cliente:</label>
                <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" value="{{ old('nombre_cliente', $reserva->nombre_cliente) }}" required>
            </div>
            
            <div class="form-group">
                <label for="telefono_cliente">Teléfono del Cliente:</label>
                <input type="text" name="telefono_cliente" id="telefono_cliente" class="form-control" value="{{ old('telefono_cliente', $reserva->telefono_cliente) }}">
            </div>

            <div class="form-group">
                <label for="servicio">Servicio:</label>
                <select name="servicio" id="servicio" class="form-control">
                    <optgroup label="Cabello">
                        <option value="cabello_planchado" {{ old('servicio') == 'cabello_planchado' ? 'selected' : '' }}>Planchado</option>
                        <option value="cabello_secado" {{ old('servicio') == 'cabello_secado' ? 'selected' : '' }}>Secado</option>
                        <option value="cabello_planchadoysecado" {{ old('servicio') == 'cabello_planchadoysecado' ? 'selected' : '' }}>Planchado y secado</option>
                        <option value="cabello_ondas" {{ old('servicio') == 'cabello_ondas' ? 'selected' : '' }}>Ondas</option>
                        <option value="cabello_keratina" {{ old('servicio') == 'cabello_peinados' ? 'selected' : '' }}>Keratina</option>
                    </optgroup>
                    <optgroup label="Maquillaje">
                        <option value="maquillaje_diario" {{ old('servicio') == 'maquillaje_diario' ? 'selected' : '' }}>Diario</option>
                        <option value="maquillaje_graduacion" {{ old('servicio') == 'maquillaje_graduacion' ? 'selected' : '' }}>Graduacion</option>
                        <option value="maquillaje_quinceaños" {{ old('servicio') == 'maquillaje_quinceaños' ? 'selected' : '' }}>Quinceaños</option>
                        <option value="maquillaje_boda" {{ old('servicio') == 'maquillaje_boda' ? 'selected' : '' }}>Boda</option>
                    </optgroup>
                    <optgroup label="Manicure">
                        <option value="manicure_clasica" {{ old('servicio') == 'manicure_clasica' ? 'selected' : '' }}>clásica</option>
                        <option value="manicure_bañodeacrilico" {{ old('servicio') == 'manicure_bañodeacrilico' ? 'selected' : '' }}>Baño de acrilico</option>
                        <option value="manicure_semipermanente" {{ old('servicio') == 'manicure_semipermanente' ? 'selected' : '' }}>Semipermanente</option>
                        <option value="manicure_uñasacrilicas" {{ old('servicio') == 'manicure_uñasacrilicas' ? 'selected' : '' }}>Uñas acrilicas</option>
                    </optgroup>
                    <optgroup label="Pedicure">
                        <option value="pedicure_clasica" {{ old('servicio') == 'pedicure_clasica' ? 'selected' : '' }}>Pedicure</option>
                        <option value="pedicure_bañodeacrilico" {{ old('servicio') == 'pedicure_bañodeacrilico' ? 'selected' : '' }}>Baño de acrilico</option>
                        <option value="pedicure_semipermanente" {{ old('servicio') == 'pedicure_semipermanente' ? 'selected' : '' }}>Semipermanente</option>
                        <option value="pedicure_acripie" {{ old('servicio') == 'pedicure_acripie' ? 'selected' : '' }}>Acripie</option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_reservacion">Fecha de Reservación:</label>
                <input type="date" name="fecha_reservacion" id="fecha_reservacion" class="form-control" min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}" value="{{ old('fecha_reservacion', $reserva->fecha_reservacion) }}" required>
            </div>

            <div class="form-group">
                <label for="hora_reservacion">Hora de Reservación:</label>
                <select name="hora_reservacion" id="hora_reservacion" class="form-control">
                    @foreach (['09:00', '11:00', '13:00', '15:00', '18:00', '20:00'] as $hora)
                        <option value="{{ $hora }}" {{ old('hora_reservacion', $reserva->hora_reservacion) == $hora ? 'selected' : '' }}>{{ $hora }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
        </form>
    </div>

    <script>
        function confirmSubmission(event) {
            return confirm('¿Está seguro de que desea actualizar esta reserva?');
        }
    </script>
@endsection
