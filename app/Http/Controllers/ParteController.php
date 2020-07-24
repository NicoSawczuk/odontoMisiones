<?php

namespace App\Http\Controllers;

use App\Parte;
use Illuminate\Http\Request;

class ParteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partes = Parte::all();
        return view('partes.index', compact('partes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partes.create');
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
            'numeros_serie' => 'required|unique:partes',
            'estado' => 'required',
            'precio_sugerido' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'disponibilidad' => 'required',
            'comprobante_asociado' => 'required',
        ]);

        $parte = new Parte();
        $parte->marca = $request->marca ;
        $parte->modelo = $request->modelo ;
        $parte->fecha_garantia = $request->fecha_garantia ;
        $parte->numeros_serie = $request->numeros_serie ;
        $parte->estado = $request->estado ;
        $parte->precio_sugerido = $request->precio_sugerido ;
        $parte->disponibilidad = $request->disponibilidad ;
        $parte->comprobante_asociado = $request->comprobante_asociado ;
        $parte->notas_generales = $request->notas_generales ;
        $parte->save();

        return redirect(route('partes.index'))->with('success','Parte guardada con exito!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Parte $parte)
    {
        return view('partes.edit', compact('parte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parte $parte)
    {
        $data = request()->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'fecha_garantia' => 'required|date',
            'numeros_serie' => 'required|unique:partes,id,'.$parte->id,
            'estado' => 'required',
            'precio_sugerido' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'disponibilidad' => 'required',
            'comprobante_asociado' => 'required',
        ]);
        $parte->marca = $request->marca ;
        $parte->modelo = $request->modelo ;
        $parte->fecha_garantia = $request->fecha_garantia ;
        $parte->numeros_serie = $request->numeros_serie ;
        $parte->estado = $request->estado ;
        $parte->precio_sugerido = $request->precio_sugerido ;
        $parte->disponibilidad = $request->disponibilidad ;
        $parte->comprobante_asociado = $request->comprobante_asociado ;
        $parte->notas_generales = $request->notas_generales ;
        $parte->update();
        return redirect(route('partes.index'))->with('success','Parte actualizada con exito!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parte $parte)
    {
        try {
            if($parte->disponibilidad == 0){
                $parte->delete();
                return redirect(route('partes.index'))->with('success','Parte eliminada con exito!');
            }else{
                return redirect(route('partes.index'))->with('error','No es posible eliminar la parte porque tiene un estado disponible!');
            }
        } catch (Throwable $th) {
            return redirect(route('partes.index'))->with('error','Error al eliminar la parte!');
        }
    }
}
