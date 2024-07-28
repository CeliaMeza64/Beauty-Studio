<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Carbon\Carbon;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::orderBy('fecha_reservacion')
            ->orderBy('hora_reservacion')
            ->paginate(7);

        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        return view('reservas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'telefono_cliente' => [
                'required',
                'regex:/^\d{4}-\d{4}$/'
            ],
            'servicio' => 'required|string|max:255',
            'fecha_reservacion' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->lte(Carbon::now()->addDay())) {
                        $fail('La fecha de reservación debe ser al menos un día después de la fecha actual.');
                    }
                }
            ],
            'hora_reservacion' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    try {
                        $hora_reservacion = Carbon::createFromFormat('h:i A', $value);
                    } catch (\Exception $e) {
                        try {
                            $hora_reservacion = Carbon::createFromFormat('H:i', $value);
                        } catch (\Exception $e) {
                            $fail('La hora de reservación no tiene un formato válido.');
                            return;
                        }
                    }

                    $request->merge([
                        'hora_reservacion' => $hora_reservacion->format('H:i:s')
                    ]);

                    $exists = Reserva::where('fecha_reservacion', $request->fecha_reservacion)
                                ->where('hora_reservacion', $request->hora_reservacion)
                                ->exists();

                    if ($exists) {
                        $fail('Ya existe una reserva para esa fecha y hora.');
                    }

                    $lastReserva = Reserva::where('fecha_reservacion', $request->fecha_reservacion)
                                      ->orderBy('hora_reservacion', 'desc')
                                      ->first();

                    if ($lastReserva) {
                        $lastHora = Carbon::createFromFormat('H:i:s', $lastReserva->hora_reservacion);
                        $currentHora = $hora_reservacion;

                        if ($lastHora->diffInHours($currentHora) < 2) {
                            $fail('Debe haber al menos dos horas entre cada reserva.');
                        }
                    }
                },
            ],
        ], [
            'nombre_cliente.required' => 'El nombre del cliente es obligatorio.',
            'telefono_cliente.required' => 'El teléfono del cliente es obligatorio.',
            'telefono_cliente.regex' => 'El teléfono debe tener el formato 3334-4567.',
            'servicio.required' => 'El servicio es obligatorio.',
            'fecha_reservacion.required' => 'La fecha de reservación es obligatoria.',
            'fecha_reservacion.date' => 'La fecha de reservación no tiene un formato válido.',
            'hora_reservacion.required' => 'La hora de reservación es obligatoria.',
        ]);

        Reserva::create($request->all());

        return redirect('/')->with('success', 'Reserva creada exitosamente.');
    }

    public function edit(Reserva $reserva)
    {
        return view('reservas.edit', compact('reserva'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'telefono_cliente' => [
                'required',
                'regex:/^\d{4}-\d{4}$/'
            ],
            'servicio' => 'required|string|max:255',
            'fecha_reservacion' => 'required|date|after:today',
            'hora_reservacion' => 'required|in:09:00,11:00,13:00,15:00,18:00,20:00',
        ], [
            'nombre_cliente.required' => 'El nombre del cliente es obligatorio.',
            'telefono_cliente.required' => 'El teléfono del cliente es obligatorio.',
            'telefono_cliente.regex' => 'El teléfono debe tener el formato 3334-4567.',
            'servicio.required' => 'El servicio es obligatorio.',
            'fecha_reservacion.required' => 'La fecha de reservación es obligatoria.',
            'fecha_reservacion.date' => 'La fecha de reservación no tiene un formato válido.',
            'hora_reservacion.required' => 'La hora de reservación es obligatoria.',
        ]);

        // Validar la existencia de otra reserva en el mismo horario
        $exists = Reserva::where('fecha_reservacion', $request->fecha_reservacion)
                         ->where('hora_reservacion', $request->hora_reservacion)
                         ->where('id', '!=', $reserva->id)
                         ->exists();

        if ($exists) {
            return redirect()->back()->withErrors(['hora_reservacion' => 'Ya existe una reserva para esa fecha y hora.'])->withInput();
        }

        // Validar la diferencia de horas entre reservas
        $lastReserva = Reserva::where('fecha_reservacion', $request->fecha_reservacion)
                              ->orderBy('hora_reservacion', 'desc')
                              ->first();

        if ($lastReserva) {
            $lastHora = Carbon::createFromFormat('H:i:s', $lastReserva->hora_reservacion);
            $currentHora = Carbon::createFromFormat('H:i', $request->hora_reservacion);

            if ($lastHora->diffInHours($currentHora) < 2) {
                return redirect()->back()->withErrors(['hora_reservacion' => 'Debe haber al menos dos horas entre cada reserva.'])->withInput();
            }
        }

        $reserva->update($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada correctamente.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada exitosamente.');
    }

    public function confirm(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->estado = 'confirmada';
        $reserva->save();

        return redirect()->route('reservas.index')->with('success', 'Reserva confirmada exitosamente.');
    }

    public function cancel(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->estado = 'cancelada';
        $reserva->save();

        return redirect()->route('reservas.index')->with('success', 'Reserva cancelada exitosamente.');
    }
}
