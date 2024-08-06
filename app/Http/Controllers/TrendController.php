<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trend;

class TrendController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $trends = Trend::paginate(10);
        return view('trends.index', compact('trends'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trends.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/trends_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $trend = new Trend;
        $trend->title = $request->input('title');
        $trend->description = $request->input('description');
        $trend->image = $fileNameToStore;
        $trend->save();

        return redirect('/trends')->with('success', 'Trend Created');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $trends = Trend::all();
        return view('trends.show', compact('trends'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trend = Trend::find($id);
        return view('trends.edit', compact('trend'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        $trend = Trend::find($id);
        $trend->title = $request->input('title');
        $trend->description = $request->input('description');

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/trends_images', $fileNameToStore);
            $trend->image = $fileNameToStore;
        }

        $trend->save();

        return redirect('/trends')->with('success', 'Trend Updated');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy(string $id)
     {
         $trend = Trend::find($id);
         if ($trend) {
             $trend->delete();
             return redirect('/trends')->with('success', 'Tendencia Removida');
         }
         return redirect('/trends')->with('error', 'Tendencia no encontrada');
     }
     
    /*public function destroy(string $id)
    {
        $trend = Trend::find($id);
        $trend->delete();
        return redirect('/trends')->with('success', 'Trend Removed');
    }*/

    /*public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('auth.admin')->only(['create', 'edit', 'update', 'destroy']);
    }*/

}
