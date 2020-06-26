<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipos.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('equipos.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'fecha_garantia' => 'required|date',
            'numero_serie' => 'required',
            'cliente' => 'required',
            'estado' => 'required'
        ]) ;

        $equipo = new Equipo();
        $equipo->marca = $request->marca;
        $equipo->modelo = $request->modelo;
        $equipo->fecha_garantia = $request->fecha_garantia;
        $equipo->numero_serie = $request->numero_serie;
        $equipo->cliente_id = $request->cliente;
        $equipo->estado = $request->estado;
        $equipo->notas_generales = $request->notas_generales;
        
        $equipo->save();

        return redirect(route('equipos.index'))->with('success', 'Equipo creado con éxito!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
