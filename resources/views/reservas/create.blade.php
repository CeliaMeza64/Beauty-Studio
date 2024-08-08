@extends('layouts.app')

@section('background_image')
{{''}}
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center" style="color:black;">Crear Reserva</h1>

        <form id="reservaForm" method="POST" action="{{ route('reservas.store') }}" class="bg-white p-4 rounded shadow-sm mx-auto" style="max-width: 600px; border: 1px solid #f8bbd0;">
            @csrf

            <div class="form-group">
                <label for="nombre_cliente">Nombre del Cliente:</label>
                <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" value="{{ old('nombre_cliente') }}" required style="border: 1px solid #f8bbd0;">
                <small id="nombreError" class="form-text text-danger" style="display: none;">El nombre solo puede contener letras.</small>
            </div> <br>

            <div class="form-group">
                <label for="telefono_cliente">Teléfono del Cliente:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="background-color: #f8bbd0; color: white;">+504</span>
                    </div>
                    <input type="text" name="telefono_cliente" id="telefono_cliente" class="form-control" value="{{ old('telefono_cliente') }}" required style="border: 1px solid #f8bbd0;" maxlength="9">
                </div>
                <small id="telefonoError" class="form-text text-danger" style="display: none;">El teléfono solo puede contener números.</small>
            </div> <br>

            <div class="form-group">
                <label for="servicio">Servicio:</label>
                <select name="servicio" id="servicio" class="form-control" style="border: 1px solid #f8bbd0;">
                    <optgroup label="Cabello">
                        <option value="cabello_planchado" {{ old('servicio') == 'cabello_planchado' ? 'selected' : '' }}>Planchado</option>
                        <option value="cabello_secado" {{ old('servicio') == 'cabello_secado' ? 'selected' : '' }}>Secado</option>
                        <option value="cabello_planchadoysecado" {{ old('servicio') == 'cabello_planchadoysecado' ? 'selected' : '' }}>Planchado y secado</option>
                        <option value="cabello_ondas" {{ old('servicio') == 'cabello_ondas' ? 'selected' : '' }}>Ondas</option>
                        <option value="cabello_keratina" {{ old('servicio') == 'cabello_keratina' ? 'selected' : '' }}>Keratina</option>
                    </optgroup>
                    <optgroup label="Maquillaje">
                        <option value="maquillaje_diario" {{ old('servicio') == 'maquillaje_diario' ? 'selected' : '' }}>Diario</option>
                        <option value="maquillaje_graduacion" {{ old('servicio') == 'maquillaje_graduacion' ? 'selected' : '' }}>Graduacion</option>
                        <option value="maquillaje_quinceaños" {{ old('servicio') == 'maquillaje_quinceaños' ? 'selected' : '' }}>Quinceaños</option>
                        <option value="maquillaje_boda" {{ old('servicio') == 'maquillaje_boda' ? 'selected' : '' }}>Boda</option>
                    </optgroup>
                    <optgroup label="Manicure">
                        <option value="manicure_clasica" {{ old('servicio') == 'manicure_clasica' ? 'selected' : '' }}>Clásica</option>
                        <option value="manicure_bañodeacrilico" {{ old('servicio') == 'manicure_bañodeacrilico' ? 'selected' : '' }}>Baño de acrílico</option>
                        <option value="manicure_semipermanente" {{ old('servicio') == 'manicure_semipermanente' ? 'selected' : '' }}>Semipermanente</option>
                        <option value="manicure_uñasacrilicas" {{ old('servicio') == 'manicure_uñasacrilicas' ? 'selected' : '' }}>Uñas acrílicas</option>
                    </optgroup>
                    <optgroup label="Pedicure">
                        <option value="pedicure_clasica" {{ old('servicio') == 'pedicure_clasica' ? 'selected' : '' }}>Pedicure</option>
                        <option value="pedicure_bañodeacrilico" {{ old('servicio') == 'pedicure_bañodeacrilico' ? 'selected' : '' }}>Baño de acrílico</option>
                        <option value="pedicure_semipermanente" {{ old('servicio') == 'pedicure_semipermanente' ? 'selected' : '' }}>Semipermanente</option>
                        <option value="pedicure_acripie" {{ old('servicio') == 'pedicure_acripie' ? 'selected' : '' }}>Acripie</option>
                    </optgroup>
                </select>
            </div>
<br>
            <div class="form-group">
                <label for="fecha_reservacion">Fecha de Reservación:</label>
                <input type="date" name="fecha_reservacion" id="fecha_reservacion" class="form-control" min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}" value="{{ old('fecha_reservacion') }}" required style="border: 1px solid #f8bbd0;">
                <small id="domingoError" class="form-text text-danger" style="display: none;">Domingos cerrado.</small>
            </div>
<br>
            <div class="form-group">
                <label for="hora_reservacion">Hora de Reservación:</label>
                <select name="hora_reservacion" id="hora_reservacion" class="form-control" style="border: 1px solid #f8bbd0;">
                    @foreach (['09:00', '11:00', '13:00', '15:00', '18:00', '20:00'] as $hora)
                        <option value="{{ $hora }}" {{ old('hora_reservacion') == $hora ? 'selected' : '' }}>{{ $hora }}</option>
                    @endforeach
                </select>
            </div>
<br>
            <button type="submit" class="btn btn-primary">Crear Reserva</button>
        </form>
    </div>

    <script>
        document.getElementById('nombre_cliente').addEventListener('input', function (e) {
            var value = e.target.value;
            var lettersOnly = /^[A-Za-z\s]*$/;
            var errorElement = document.getElementById('nombreError');

            if (!lettersOnly.test(value)) {
                errorElement.style.display = 'block';
                e.target.value = value.replace(/[^A-Za-z\s]/g, ''); 
            } else {
                errorElement.style.display = 'none';
            }
        });

        document.getElementById('telefono_cliente').addEventListener('input', function (e) {
            var value = e.target.value;
            var formattedValue = value.replace(/[^0-9]/g, ''); 
            var errorElement = document.getElementById('telefonoError');

            if (formattedValue.length > 4) {
                formattedValue = formattedValue.slice(0, 4) + '-' + formattedValue.slice(4);
            }
            
            if (formattedValue.length > 9) {
                formattedValue = formattedValue.slice(0, 9);
            }

            e.target.value = formattedValue;

            if (/[^0-9-]/.test(value)) {
                errorElement.style.display = 'block';
            } else {
                errorElement.style.display = 'none';
            }
        });

        document.getElementById('fecha_reservacion').addEventListener('input', function (e) {
            var value = new Date(e.target.value);
            var day = value.getUTCDay(); 
            var errorElement = document.getElementById('domingoError');

            if (day === 0) { 
                errorElement.style.display = 'block';
                e.target.value = '';
            } else {
                errorElement.style.display = 'none';
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
