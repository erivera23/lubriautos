<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
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
                $datos['productos'] = Productos::where('nombre', 'LIKE', '%'. $datos['query'] .'%')
                                                ->orWhere('codigo', 'LIKE', '%'. $datos['query'] .'%')->paginate(10);
            } else
            {
                $datos['productos'] = Productos::paginate(10);
            }
            
            return view('productos.index', $datos);
        }
        //$datos['productos'] = Productos::paginate(10);
        //return view('productos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');
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
            'descripcion' => 'required|string|max:100',
            'codigo' => 'required|string'
        ];

        $Mensaje=['required'=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);
        
        $datosProducto = request()->except('_token');

        if($datosProducto['costo'] == '') $datosProducto['costo'] = 0;
        if($datosProducto['precio'] == '') $datosProducto['precio'] = 0;
        
        Productos::insert($datosProducto);
        return redirect('productos')->with('Mensaje', 'Producto agregado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Productos::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos = request()->except(['_token','_method']);
        Productos::where('id','=',$id)->update($datos);

        return redirect('productos')->with('Mensaje', 'Producto actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        //
    }
}
