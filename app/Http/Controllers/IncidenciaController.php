<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Estado;
use App\Incidencia;
use App\Tecnico;
use App\TipoIncidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidencias = Incidencia::all();
        return view('incidencias.index', compact('incidencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $tiposIncidencias = TipoIncidencia::all();
        $tecnicos= Tecnico::all();
        return view('incidencias.create', compact('clientes','tiposIncidencias','tecnicos'));
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
            'cliente_id' => 'required',
            'equipos_id.*' => 'required',
            'fecha_comienzo_incidencia' => 'required|date',
            'tipo_incidencia_id' => 'required',
            'presupuesto' => 'required',
            'diagnostico_general' => 'required',
        ]) ;

        $incidencia = new Incidencia() ;
        $incidencia->cliente_id = $request->cliente_id;
        $incidencia->fecha_comienzo_incidencia = $request->fecha_comienzo_incidencia;
        $incidencia->tipo_incidencia_id = $request->tipo_incidencia_id;
        $incidencia->presupuesto = $request->presupuesto;
        $incidencia->diagnostico_general = $request->diagnostico_general;
        if($request->tecnico_id == null){
            $incidencia->estado_id = Estado::first()->id ;
        }else{
            $incidencia->estado_id = Estado::find(2)->id ;
            $incidencia->tecnico_id = $request->tecnico_id;
        }
        $incidencia->save() ;
        $incidencia->equipos()->sync($request->equipos_id);
        return redirect(route('incidencias.index'))->with('success', 'La incidencia fue creada con éxito!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencia $incidencia)
    {
        return view('incidencias.show', compact('incidencia')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $incidencia)
    {
        if($incidencia->estado->nivel < 3){
            $tiposIncidencias = TipoIncidencia::all();
            $tecnicos= Tecnico::all();
            $equipos = $incidencia->equipos ;
            return view('incidencias.edit', compact('incidencia','tiposIncidencias','tecnicos', 'equipos'));
        }else{
            return redirect(route('incidencias.index'))->with('error', 'No se puede editar la incidencia debido a que esta en proceso');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        $data = request()->validate([
            'tipo_incidencia_id' => 'required',
            'presupuesto' => 'required',
            'diagnostico_general' => 'required',
        ]) ;
        $incidencia->tipo_incidencia_id = $request->tipo_incidencia_id;
        $incidencia->presupuesto = $request->presupuesto;
        $incidencia->diagnostico_general = $request->diagnostico_general;
        if($request->tecnico_id == null){
            $incidencia->estado_id = Estado::first()->id ;
        }else{
            $incidencia->estado_id = Estado::find(2)->id ;
            $incidencia->tecnico_id = $request->tecnico_id;
        }
        $incidencia->update() ;
        return redirect(route('incidencias.index'))->with('success', 'La incidencia fue actualizada con éxito!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencia $incidencia)
    {
        //
    }

    public function obtenerMonto(TipoIncidencia $tipoIncidencia){
        return $tipoIncidencia->monto_mano_obra;
    }
}
