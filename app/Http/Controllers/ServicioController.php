<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    public function index()
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
}
