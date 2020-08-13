<?php

namespace App\Http\Controllers;

use Cardumen\ArgentinaProvinciasLocalidades\Models\Localidad;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Pais;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Provincia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexPais()
    {
        $paises = Pais::all();
        return view('pais_provincia_localidad/paises', compact('paises'));
    }

    public function indexProvincia()
    {
        $provincias = Provincia::all();
        return view('pais_provincia_localidad/provincias', compact('provincias'));
    }

    public function indexLocalidades()
    {
        $localidades = Localidad::all();
        return view('pais_provincia_localidad/localidades', compact('localidades'));
    }
}
