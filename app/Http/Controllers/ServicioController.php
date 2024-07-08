<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;



class ServicioController extends Controller
{
    public function inicio()
    {
       
        return view('plantilla.plantilla');
    }

    public function showmaquillaje()
    {
      
        return view('servicios.maquillaje');
    }

    public function showcabello()
    {
        return view('servicios.cabello');
    }

    public function showpedicura()
    {
        return view('servicios.pedicura'); 
    }
    public function showmanicura()
    {
        return view('servicios.manicura');
    }

    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index')->with('servicios',$servicios);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('servicios.create')->with('categorias',$categorias);
    }

    public function store(Request $request)
    {
        $request->validate([
    
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
        ]);

        $path = $request->file('imagen') ? $request->file('imagen')->store('images', 'public') : null;

        Servicio::create([
      
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria_id' => $request->categoria_id,
            'imagen' => $path,
         
        ]);

        return redirect()->route('servicios.index')->with('success', 'Servicio creado correctamente.');
    }

    public function show($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('servicios.show', compact('servicio'));
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        $categorias = Categoria::all();
        return view('servicios.edit', compact('servicio', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     
        ]);

        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->categoria_id = $request->categoria_id;

        if ($request->hasFile('imagen')) {
            if ($servicio->imagen) {
                Storage::delete('public/' . $servicio->imagen);
            }
            $path = $request->file('imagen')->store('images', 'public');
            $servicio->imagen = $path;
        }

        $servicio->save();

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        if ($servicio->imagen) {
            Storage::delete('public/' . $servicio->imagen);
        }
        $servicio->delete();
        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado correctamente.');
    }


}
