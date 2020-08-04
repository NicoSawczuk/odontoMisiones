<?php

namespace App\Http\Controllers;

use App\TipoIncidencia;
use Illuminate\Http\Request;

class TipoIncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_incidencias = TipoIncidencia::all();

        return view('tipos_incidencias.index', compact('tipos_incidencias'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos_incidencias.create');
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'monto_mano_obra' => 'required',
        ]);

        $tipos_incidencias = new TipoIncidencia();
        $tipos_incidencias->nombre = $request->nombre ;
        $tipos_incidencias->descripcion = $request->descripcion ;
        $tipos_incidencias->monto_mano_obra = $request->monto_mano_obra ;
        $tipos_incidencias->save();

        return redirect(route('tipos_incidencias.index'))->with('success','Tipo de incidencias guardada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoIncidencia  $tipoIncidencia
     * @return \Illuminate\Http\Response
     */
    public function show(TipoIncidencia $tipoIncidencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoIncidencia  $tipoIncidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoIncidencia $tipoIncidencia)
    {
        return view('tipos_incidencias.edit', compact('tipoIncidencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoIncidencia  $tipoIncidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoIncidencia $tipoIncidencia)
    {
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'monto_mano_obra' => 'required',
        ]);

        $tipos_incidencias = new TipoIncidencia();
        $tipos_incidencias->nombre = $request->nombre ;
        $tipos_incidencias->descripcion = $request->descripcion ;
        $tipos_incidencias->monto_mano_obra = $request->monto_mano_obra ;
        $tipos_incidencias->save();

        return redirect(route('tipos_incidencias.index'))->with('success','Tipo de incidencias guardada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoIncidencia  $tipoIncidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoIncidencia $tipoIncidencia)
    {
        try {
            if($tipoIncidencia->disponibilidad == 0){
                $tipoIncidencia->delete();
                return redirect(route('tipos_incidencias.index'))->with('success','Parte eliminada con exito!');
            }else{
                return redirect(route('tipos_incidencias.index'))->with('error','No es posible eliminar la parte porque tiene un estado disponible!');
            }
        } catch (Throwable $th) {
            return redirect(route('tipos_incidencias.index'))->with('error','Error al eliminar la parte!');
        }
    }
}
