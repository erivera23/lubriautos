<?php

namespace App\Http\Controllers;

use App\Vehiculos;
use App\Clientes;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request)
        {
            $datos['query'] = request('search');
            if(strlen($datos['query']) > 0)
            {
                $datos['vehiculos'] = Vehiculos::busqueda($datos['query'])->paginate(10);
            } else
            {
                $datos['vehiculos'] = Vehiculos::vehiculos()->paginate(10);
            }
            
            return view('vehiculos.index', $datos);
        }
    }

    public function indexCompany(Request $request)
    {
        if($request)
        {
            $datos['query'] = request('search');
            if(strlen($datos['query']) > 0)
            {
                $datos['vehiculos'] = Vehiculos::busquedaCompany($datos['query'])->paginate(10);
            } else 
            {
                $datos['vehiculos'] = Vehiculos::vehiculosCompany()->paginate(10);
            }

            return view('vehiculos.indexCompany', $datos);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('vehiculos.create');
    }

    public function datosCliente($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('vehiculos.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos =[
            'tipo' => 'required|string|max:50',
            'placa' => 'required|string',
            'anio' => 'required'
        ];

        $Mensaje=['required'=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        $vehiculo = request()->except(['_token', 'representante']);
        Vehiculos::insert($vehiculo);
        return redirect('vehiculos')->with('Mensaje', 'Vehiculo agregado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $vehiculo = Vehiculos::findOrFail($id);
        return view('vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos = request()->except(['_token','_method']);
        Vehiculos::where('id','=',$id)->update($datos);

        return redirect('vehiculos')->with('Mensaje', 'Vehiculo actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculos $vehiculos)
    {
        //
    }
}
