<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
   
    public function index()
    {
        $categorias = Categoria::paginate(6);
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'estado' => 'required|boolean',
        ], [
            'nombre.max' => 'El nombre no puede exceder los 50 caracteres.',
            'nombre.required' => 'El nombre es obligatorio.',
            'estado.required' => 'El estado es obligatorio.',
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría creada con éxito.');
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }
    public function update(Request $request, Categoria $categoria)
    {
    $request->validate([
        'nombre' => 'required|string|max:50',
        'estado' => 'required|boolean',
    ], [
        'nombre.max' => 'El nombre no puede exceder los 50 caracteres.',
        'nombre.required' => 'El nombre es obligatorio.',
        'estado.required' => 'El estado es obligatorio.',
    ]);
    $estado = $request->input('estado') == '1'; 
    $categoria->update([
        'nombre' => $request->input('nombre'),
        'estado' => $estado,
    ]);

    return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito.');
    }

   
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito.');
    }

}
