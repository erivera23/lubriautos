<?php

namespace App\Http\Controllers;

use App\Inventario;
use App\Productos;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['inventario']= Inventario::productos()->paginate(10);
        return view('inventario.index', $datos);
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
        $datosProducto = request()->except('_token');
        Inventario::insert($datosProducto);
        return redirect('inventario')->with('Mensaje', 'Producto agregado con exito.');
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
        $datos = request()->except('_token');
        Inventario::insert($datos);
        Productos::where('id', '=', $id)->increment('existencia', $datos['cantidad']);
        return redirect('inventario')->with('Mensaje', 'Entrada registrada con exito.');
    }

    public function storeSalida(Request $request, $id)
    {
        $datos = request()->except('_token');
        Inventario::insert($datos);
        Productos::where('id','=',$datos['producto_id'])->decrement('existencia', $datos['cantidad']);
        return redirect('inventario')->with('Mensaje', 'Salida registrada con exito.');
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
