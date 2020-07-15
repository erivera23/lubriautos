<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    //
    public static function productos()
    {
        //$entradas = Inventario::selectRaw('SUM(cantidad) as entradas')->where('tipo','=',1)->groupBy('producto_id')->get();
        //$salidas = Inventario::selectRaw('SUM(cantidad) as salidas')->where('tipo','=',0)->groupBy('producto_id')->get();
        //$existencia = $entradas - $salidas;
        //echo $salidas;
        /* $productoEntradas = Inventario::join('productos','productos.id','inventarios.producto_id')
                                        ->select('productos.id','productos.nombre','productos.codigo','productos.descripcion','productos.existencia')
                                        ->groupby('productos_id'); */
        $productos = Inventario::join('productos','productos.id','inventarios.producto_id')
                                ->selectRaw('inventarios.producto_id, productos.existencia, productos.precio, productos.nombre, productos.codigo, productos.descripcion')
                                ->groupBy('producto_id', 'productos.existencia', 'productos.precio', 'productos.nombre', 'productos.codigo', 'productos.descripcion');
        
        return $productos;
    }

    public static function reporteInventario()
    {
        $productos = Inventario::join('productos','productos.id','inventarios.producto_id')
                                ->selectRaw('inventarios.producto_id, productos.existencia, productos.nombre, productos.codigo, productos.descripcion')
                                ->orderBy('productos.existencia')
                                ->groupBy('producto_id');
        
        return $productos;
    }

    public static function productosBy($value)
    {
        $productos = Inventario::join('productos', 'productos.id', 'inventarios.producto_id')
                                ->selectRaw('inventarios.producto_id, productos.existencia, productos.precio, productos.nombre, productos.codigo, productos.descripcion')
                                ->where('productos.nombre', 'LIKE', '%'.$value.'%')->orWhere('productos.codigo', '=', $value)
                                ->groupBy('producto_id');

        return $productos;
    }
}
