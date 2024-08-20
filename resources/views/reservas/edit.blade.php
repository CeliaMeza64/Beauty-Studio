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
    <h1>Editar Reserva</h1>

    <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre_cliente">Nombre del Cliente</label>
            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="{{ old('nombre_cliente', $reserva->nombre_cliente) }}" required>
            <span id="nombreError" style="color:red; display:none;">El nombre solo debe contener letras.</span>
            @error('nombre_cliente')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="telefono_cliente">Teléfono del Cliente</label>
            <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" value="{{ old('telefono_cliente', $reserva->telefono_cliente) }}" required>
            <span id="telefonoError" style="color:red; display:none;">El teléfono solo debe contener números y estar en formato xxxx-xxxx.</span>
            @error('telefono_cliente')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_reservacion">Fecha de la Reserva</label>
            <input type="date" class="form-control" id="fecha_reservacion" name="fecha_reservacion" value="{{ old('fecha_reservacion', $reserva->fecha_reservacion) }}" required>
            <span id="domingoError" style="color:red; display:none;">No se pueden hacer reservas los domingos.</span>
            @error('fecha_reservacion')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="hora_reservacion">Hora de la Reserva</label>
            <select class="form-control" id="hora_reservacion" name="hora_reservacion" required>
                <option value="09:00" {{ old('hora_reservacion', $reserva->hora_reservacion) == '09:00' ? 'selected' : '' }}>09:00 AM</option>
                <option value="11:00" {{ old('hora_reservacion', $reserva->hora_reservacion) == '11:00' ? 'selected' : '' }}>11:00 AM</option>
                <option value="13:00" {{ old('hora_reservacion', $reserva->hora_reservacion) == '13:00' ? 'selected' : '' }}>01:00 PM</option>
                <option value="15:00" {{ old('hora_reservacion', $reserva->hora_reservacion) == '15:00' ? 'selected' : '' }}>03:00 PM</option>
                <option value="18:00" {{ old('hora_reservacion', $reserva->hora_reservacion) == '18:00' ? 'selected' : '' }}>06:00 PM</option>
                <option value="20:00" {{ old('hora_reservacion', $reserva->hora_reservacion) == '20:00' ? 'selected' : '' }}>08:00 PM</option>
            </select>
            @error('hora_reservacion')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Otros campos del formulario... -->

        <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
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
@endsection
