<?php

namespace App\Http\Controllers;

use App\Models\PaginaInicio;
use Illuminate\Http\Request;

class PaginaInicioController extends Controller
{
    public function index()
    {
        $paginaInicios = PaginaInicio::paginate();
        return view('paginaInicio.index', compact('paginaInicios'));
    }

    public function create()
    {
        return view('paginaInicio.create');
    }

    /*public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:25',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Verificar si se ha subido una imagen
        if (!$request->hasFile('imagen')) {
            return redirect()->back()->withErrors(['imagen' => 'La imagen es requerida.'])->withInput();
        }

        $data = $request->only(['titulo', 'descripcion']);
        $data['imagen'] = $request->file('imagen')->store('images', 'public');

        PaginaInicio::create($data);

        return redirect()->route('paginaInicio.index')->with('success', 'Página de inicio creada exitosamente.');
    }*/

    public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|string|max:25',
        'descripcion' => 'required|string',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'imagen.required' => 'Por favor, seleccione una imagen.',
    ]);

    $data = $request->all();
    if ($request->hasFile('imagen')) {
        $data['imagen'] = $request->file('imagen')->store('images', 'public');
    }

    PaginaInicio::create($data);

    return redirect()->route('paginaInicio.index')->with('success', 'Página de inicio creada exitosamente.');
}



    public function show(PaginaInicio $paginaInicio)
    {
        return view('paginaInicio.show', compact('paginaInicio'));
    }

    public function edit(PaginaInicio $paginaInicio)
    {
        return view('paginaInicio.edit', compact('paginaInicio'));
    }

    public function update(Request $request, PaginaInicio $paginaInicio)
    {
        $request->validate([
            'titulo' => 'required|string|max:25',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['titulo', 'descripcion']);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('images', 'public');
        }

        $paginaInicio->update($data);

        return redirect()->route('paginaInicio.index')->with('success', 'Página de inicio actualizada exitosamente.');
    }

    public function destroy(PaginaInicio $paginaInicio)
    {
        $paginaInicio->delete();
        return redirect()->route('paginaInicio.index')->with('success', 'Página de inicio eliminada exitosamente.');
    }
}
