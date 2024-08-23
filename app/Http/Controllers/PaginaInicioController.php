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

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:25',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('images', 'public');
        }

        PaginaInicio::create($data);

        return redirect()->route('paginaInicio.index')->with('success', 'Página de inicio creada exitosamente.');
    }

    public function show()
    {
        $paginaInicio=paginaInicio::all();
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

        $data = $request->all();
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