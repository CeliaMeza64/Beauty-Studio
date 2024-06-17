<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('plantilla.plantilla')-> with('servicios', $servicios);
    }

    public function showmaquillaje()
    {
      
        return view('servicios.maquillaje');
    }
}
