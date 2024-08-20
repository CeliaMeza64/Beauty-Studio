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
            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="{{ old('nombre_cliente') }}" maxlength="40" required>
            <span id="nombreError" style="color:red; display:none;">completa este campo, formato en letras</span>
            @error('nombre_cliente')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <br>
        <div class="form-group">
            <label for="telefono_cliente">Teléfono del Cliente</label>
            <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" value="{{ old('telefono_cliente') }}" required>
            <span id="telefonoError" style="color:red; display:none;">El teléfono debe estar en el formato xxxx-xxxx y contener solo 8 números.</span>
            @error('telefono_cliente')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>
        <br>
        
        <div class="form-group">
            <label for="fecha_reservacion">Fecha de la Reserva</label>
            <input type="date" class="form-control" id="fecha_reservacion" name="fecha_reservacion" value="{{ old('fecha_reservacion') }}" required min="{{ date('Y-m-d') }}">
            <span id="fechaError" style="color:red; display:none;">Por favor, selecciona una fecha válida.</span>
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
        <button type="submit" class="btn btn-primary" id="guardarReservaButton">
            Guardar Reserva
        </button>
    </form>

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

    <!-- Modal de Confirmación -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmación de Reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea realizar esta reserva?</p>
                    <p><strong>Detalles de la Reserva:</strong></p>
                    <ul id="reservationDetails">
                        <!-- Los detalles se llenarán con JavaScript -->
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="confirmButton">Confirmar Reserva</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function hideErrorMessages() {
                document.getElementById('nombreError').style.display = 'none';
                document.getElementById('telefonoError').style.display = 'none';
                document.getElementById('fechaError').style.display = 'none';
                document.getElementById('horaError').style.display = 'none';
            }

            function validateForm() {
                var nombre = document.getElementById('nombre_cliente').value.trim();
                var telefono = document.getElementById('telefono_cliente').value.trim();
                var fecha = document.getElementById('fecha_reservacion').value;
                var hora = document.getElementById('hora_reservacion').value;
                var valid = true;

                // Validar nombre
                var namePattern = /^[a-zA-Z\s]+$/;
                if (!namePattern.test(nombre)) {
                    document.getElementById('nombreError').style.display = 'block';
                    valid = false;
                } else {
                    document.getElementById('nombreError').style.display = 'none';
                }

                // Validar teléfono
                var phonePattern = /^\d{4}-\d{4}$/;
                if (!phonePattern.test(telefono) || telefono.length !== 9) {
                    document.getElementById('telefonoError').style.display = 'block';
                    valid = false;
                } else {
                    document.getElementById('telefonoError').style.display = 'none';
                }

                // Validar fecha
                if (fecha === "") {
                    document.getElementById('fechaError').style.display = 'block';
                    valid = false;
                } else {
                    document.getElementById('fechaError').style.display = 'none';
                }

                // Validar hora
                if (hora === "") {
                    document.getElementById('horaError').style.display = 'block';
                    valid = false;
                } else {
                    document.getElementById('horaError').style.display = 'none';
                }

                return valid;
            }

            function formatPhoneNumber() {
                var input = document.getElementById('telefono_cliente');
                var value = input.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
                if (value.length > 4) {
                    value = value.slice(0, 4) + '-' + value.slice(4, 8);
                }
                input.value = value;
            }

            document.getElementById('nombre_cliente').addEventListener('input', function () {
                // Solo permitir letras y espacios en el campo nombre
                this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
                hideErrorMessages();
            });

            document.getElementById('telefono_cliente').addEventListener('input', function () {
                formatPhoneNumber();
                hideErrorMessages();
            });

            document.getElementById('fecha_reservacion').addEventListener('input', hideErrorMessages);
            document.getElementById('hora_reservacion').addEventListener('input', hideErrorMessages);

            document.getElementById('guardarReservaButton').addEventListener('click', function (e) {
                e.preventDefault();

                if (validateForm()) {
                    var nombre = document.getElementById('nombre_cliente').value.trim();
                    var telefono = document.getElementById('telefono_cliente').value.trim();
                    var fecha = document.getElementById('fecha_reservacion').value;
                    var hora = document.getElementById('hora_reservacion').value;

                    document.getElementById('reservationDetails').innerHTML =
                        '<li><strong>Nombre:</strong> ' + nombre + '</li>' +
                        '<li><strong>Teléfono:</strong> ' + telefono + '</li>' +
                        '<li><strong>Fecha:</strong> ' + fecha + '</li>' +
                        '<li><strong>Hora:</strong> ' + hora + '</li>';

                    var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'), {
                        keyboard: false
                    });

                    confirmModal.show();

                    document.getElementById('confirmButton').addEventListener('click', function () {
                        document.getElementById('reservaForm').submit();
                    });
                }
            });
        });
    </script>

</div>
@endsection
