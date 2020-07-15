<?php

namespace App\Http\Controllers;

use App\Inventario;
use App\Productos;
use Illuminate\Http\Request;
use Redirect;

class InventarioController extends Controller
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
                $datos['inventario'] = Inventario::productosBy($datos['query'])->paginate(10);
            } else
            {
                $datos['inventario'] = Inventario::productos()->paginate(10);
            }
            
            return view('inventario.index', $datos);
        }

        //$datos['inventario']= Inventario::productos()->paginate(10);
        //return view('inventario.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $producto = Productos::findOrFail($id);
        return view('inventario.create', compact('producto'));
    }

    public function entrada($id)
    {
        $producto = Productos::findOrFail($id);
        return view('inventario.entrada', compact('producto'));
    }

    public function salida($id)
    {
        $producto = Productos::findOrFail($id);
        return view('inventario.salida', compact('producto'));
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
            'cantidad' => 'required|string|max:100',
            'concepto' => 'required|string',
            'referencia' => 'required|string',
            'fecha' => 'required|string'
        ];

        $Mensaje=['required'=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);
        
        $datosProducto = request()->except('_token');
        Inventario::insert($datosProducto);
        return redirect('productos')->with('Mensaje', 'Producto agregado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Inventario::findOrFail($id);
        return view('inventario.edit', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        //
    }

    public function storeEntrada(Request $request, $id)
    {
        $campos =[
            'cantidad' => 'required|string|max:100',
            'concepto' => 'required|string',
            'referencia' => 'required|string',
            'fecha' => 'required|string'
        ];

        $Mensaje=['required'=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        $datos = request()->except('_token');
        Inventario::insert($datos);
        Productos::where('id', '=', $id)->increment('existencia', $datos['cantidad']);
        return redirect('productos')->with('Mensaje', 'Entrada registrada con exito.');
    }

    public function storeSalida(Request $request, $id)
    {
        $campos =[
            'cantidad' => 'required|string|max:100',
            'concepto' => 'required|string',
            'referencia' => 'required|string',
            'fecha' => 'required|string'
        ];

        $Mensaje=['required'=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);
        
        $datos = request()->except('_token');
        Inventario::insert($datos);
        Productos::where('id','=',$id)->decrement('existencia', $datos['cantidad']);
        //return Redirect::back()->with('Mensaje', 'Salida registrada con éxito.');
        return redirect('productos')->with('Mensaje', 'Salida registrada con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        //
    }
}
