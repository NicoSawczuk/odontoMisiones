<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Direccion;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Pais;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //debemos obtener todos los clientes de la BD
        $clientes = Cliente::all();

        //aca debemos retornar la vista del index de clientes y pasarle los clientes
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Pais::all();

        //debemos retornar la vista al formulario de creacion de cliente
        return view('clientes.create', compact('paises'));
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
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required',
            'dni' => 'required|unique:clientes',
            'cuil' => 'required|unique:clientes',
            'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|unique:clientes',
            'disponibilidad_crediticia' => 'required',
            'estado_crediticio' => 'required',
            'pais_id' => 'required',
            'provincia_id' => 'required',
            'localidad_id' => 'required',
            'calle' => 'required|regex:/^[a-zA-Z\s]*$/',
            'altura' => 'required|numeric',
        ]) ;

        $direccion = new Direccion();
        $direccion->calle = $request->calle ;
        $direccion->altura = $request->altura ;
        $direccion->pais_id = $request->pais_id ;
        $direccion->provincia_id = $request->provincia_id ;
        $direccion->localidad_id = $request->localidad_id ;
        $direccion->save();
        $cliente = new Cliente();
        $cliente->nombres = $request->nombres ;
        $cliente->apellidos = $request->apellidos ;
        $cliente->sexo = $request->sexo ;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento ;
        $cliente->dni = $request->dni ;
        $cliente->cuil = $request->cuil ;
        $cliente->telefono = $request->telefono ;
        $cliente->email = $request->email ;
        $cliente->disponibilidad_crediticia = $request->disponibilidad_crediticia ;
        $cliente->estado_crediticio = $request->estado_crediticio ;
        $cliente->notas_particulares = $request->notas_particulares ;
        $cliente->direccion_id = $direccion->id ;
        $cliente->save();
        $numero_cliente = strtoupper(substr($direccion->pais->pais,0,3).'-'.$cliente->id);
        $cliente->numero_cliente = $numero_cliente ;
        $cliente->save();
        return redirect(route('clientes.index'))->with('success','Cliente guardado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
