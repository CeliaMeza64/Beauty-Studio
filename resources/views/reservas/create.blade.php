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
            <select name="servicio" id="servicio" class="form-control">
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