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

    public function showcabello()
    {
        return view('servicios.cabello');
    }

<<<<<<< HEAD
    public function showpedicura()
    {
        return view('servicios.pedicura');
=======
    public function showmanicura()
    {
        return view('servicios.manicura');
>>>>>>> d9f69b4745f7e788c4f99bf2f8fba5f0836b3644
    }
}
