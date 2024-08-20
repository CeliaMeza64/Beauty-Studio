<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::paginate(3);
        return view('galeria.index', compact('images'));
    }

    public function create()
    {
        return view('galeria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('imagen') ? $request->file('imagen')->store('galeria', 'public') : null;

        Image::create([
            'imagen' => $path,
        ]);

        return redirect()->route('galeria.index')->with('success', 'Imagen añadida con éxito.');
    }

    public function show()
    {
        $images = Image::all();
        return view('galeria.show', compact('images'));
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('galeria.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        $request->validate([
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($image->imagen) {
                Storage::delete('public/' . $image->imagen);
            }
            $path = $request->file('imagen')->store('galeria', 'public');
            $image->imagen = $path;
        }

        $image->save();

        return redirect()->route('galeria.index')->with('success', 'Imagen actualizada con éxito.');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        if ($image->imagen) {
            Storage::delete('public/' . $image->imagen);
        }
        $image->delete();

        return redirect()->route('galeria.index')->with('success', 'Imagen eliminada con éxito.');
    }
}
