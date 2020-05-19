<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
        {
            $datos['query'] = request('search');
            if(strlen($datos['query']) > 0)
            {
                $datos['clientes'] = Clientes::where('empresarial', '=', 0)
                                             ->where('representante', 'LIKE', '%'. $datos['query'] .'%')
                                             ->paginate(10);
            } else
            {
                $datos['clientes'] = Clientes::where('empresarial', '=', 0)->paginate(10);
            }
            
            return view('clientes.index', $datos);
        }

        //$datos['clientes']= Clientes::paginate(10);
        //return view('clientes.index', $datos);
    }

    public function indexCompany(Request $request)
    {
        if($request)
        {
            $datos['query'] = request('search');
            if(strlen($datos['query']) > 0)
            {
                $datos['clientes'] = Clientes::where('empresarial', '=', 1)
                                               ->where('representante', 'LIKE', '%'. $datos['query'] .'%')
                                               ->paginate(10);
            } else 
            {
                $datos['clientes'] = Clientes::where('empresarial', '=', 1)->paginate(10);
            }

            return view('clientes.indexcompany', $datos);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos =[
            'representante' => 'required|string|max:100',
            'celular' => 'required|string',
            'correo' => 'email'
        ];

        $Mensaje=['required'=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        //$datosCliente = request()->all();
        $datosCliente = request()->except('_token');
        Clientes::insert($datosCliente);
        return redirect('clientes')->with('Mensaje', 'Cliente agregado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente = Clientes::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos =[
            'representante' => 'required|string|max:100',
            'celular' => 'required|string',
            'correo' => 'email'
        ];

        $Mensaje=['required'=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);
        
        $datosCliente = request()->except(['_token','_method']);
        Clientes::where('id','=',$id)->update($datosCliente);

        return redirect('clientes')->with('Mensaje', 'Cliente actualizado con exito.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes)
    {
        //
    }
}
