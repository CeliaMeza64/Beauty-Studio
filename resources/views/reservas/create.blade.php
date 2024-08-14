@extends('layouts.app')

@section('background_image')
{{''}}
@endsection

@section('content')
<div class="container">
    <h1>Crear Reserva</h1>

    <form action="{{ route('reservas.store') }}" method="POST" id="reservaForm">
        @csrf
        <div class="form-group">
            <label for="nombre_cliente">Nombre del Cliente</label>
            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="{{ old('nombre_cliente') }}" required>
            <span id="nombreError" style="color:red; display:none;">El nombre solo debe contener letras.</span>
            @error('nombre_cliente')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="telefono_cliente">Teléfono del Cliente</label>
            <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" value="{{ old('telefono_cliente') }}" required>
            <span id="telefonoError" style="color:red; display:none;">El teléfono solo debe contener números y estar en formato xxxx-xxxx.</span>
            @error('telefono_cliente')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="fecha_reservacion">Fecha de la Reserva</label>
            <input type="date" class="form-control" id="fecha_reservacion" name="fecha_reservacion" value="{{ old('fecha_reservacion') }}" required>
            <span id="fechaError" style="color:red; display:none;">Por favor, selecciona una fecha.</span>
            <span id="domingoError" style="color:red; display:none;">No se pueden hacer reservas los domingos.</span>
            @error('fecha_reservacion')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="hora_reservacion">Hora de la Reserva</label>
            <select class="form-control" id="hora_reservacion" name="hora_reservacion" required>
                <option value="">Seleccione una hora</option>
                <option value="09:00">09:00 AM</option>
                <option value="11:00">11:00 AM</option>
                <option value="13:00">01:00 PM</option>
                <option value="15:00">03:00 PM</option>
                <option value="18:00">06:00 PM</option>
                <option value="20:00">08:00 PM</option>
            </select>
            <span id="horaError" style="color:red; display:none;">Por favor, selecciona una hora.</span>
            @error('hora_reservacion')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">
            Guardar Reserva
        </button>
    </form>

    <!-- Modal de confirmación -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmación de Reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas guardar esta reserva?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="confirmReservaButton">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    
    <div class="map">
        <h2>Encuentra Nuestra Ubicación</h2>
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3873.4854422613735!2d-86.566536!3d13.869897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDUyJzExLjYiTiA4NsKwMzMnNTkuNSJX!5e0!3m2!1ses-419!2shn!4v1723487048417!5m2!1ses-419!2shn" 
            width="100%" 
            height="350" 
            style="border:0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); margin-top: 1em;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <br>
    <br>
    <div class="social-media">
        <h2>Síguenos en Redes Sociales</h2>
        <a href="https://facebook.com/tuestudio" target="_blank">Facebook</a>
        <a href="https://instagram.com/tuestudio" target="_blank">Instagram</a>
        <a href="https://twitter.com/tuestudio" target="_blank">Twitter</a>
    </div>
    
    @section('styles')
    <style>
        .contact-info, .map, .testimonials, .social-media, .faq {
            margin: 2em 0;
            padding: 1em;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .contact-info h2, .map h2, .testimonials h2, .social-media h2, .faq h2 {
            margin-bottom: 1em;
        }

        .social-media a {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff;
        }

        .social-media a:hover {
            text-decoration: underline;
        }
    </style>
    @endsection

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
            var value = e.target.value.replace(/[^0-9]/g, ''); 
            var formattedValue = '';

            if (value.length > 4) {
                formattedValue = value.slice(0, 4) + '-' + value.slice(4);
            } else {
                formattedValue = value;
            }

            if (formattedValue.length > 9) {
                formattedValue = formattedValue.slice(0, 9);
            }

            e.target.value = formattedValue;

            var errorElement = document.getElementById('telefonoError');
            if (/[^0-9-]/.test(formattedValue)) {
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

        document.getElementById('reservaForm').addEventListener('submit', function(e) {
            var nombre = document.getElementById('nombre_cliente').value.trim();
            var telefono = document.getElementById('telefono_cliente').value.trim();
            var fecha = document.getElementById('fecha_reservacion').value;
            var hora = document.getElementById('hora_reservacion').value;
            var valid = true;

            if (nombre === "") {
                document.getElementById('nombreError').style.display = 'block';
                valid = false;
            }

            if (telefono === "" || telefono.length < 9) {
                document.getElementById('telefonoError').style.display = 'block';
                valid = false;
            }

            if (fecha === "") {
                document.getElementById('fechaError').style.display = 'block';
                valid = false;
            }

            if (hora === "") {
                document.getElementById('horaError').style.display = 'block';
                valid = false;
            }

            if (!valid) {
                e.preventDefault();
            }
        });

        document.getElementById('confirmReservaButton').addEventListener('click', function () {
            document.getElementById('reservaForm').submit();
        });
    </script>
</div>
@endsection
