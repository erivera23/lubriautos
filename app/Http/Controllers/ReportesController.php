<?php

namespace App\Http\Controllers;

use App\Productos;
use App\Inventario;
use Illuminate\Http\Request;

class ReportesController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function generar()
     {
         $productos = Productos::select('codigo','nombre', 'existencia', 'precio')->get();
         echo $productos;
         $date = date('d').'/'.date('m').'/'.date('Y');

         $view = view('reporte', compact('productos', 'date'))->render();
         $pdf = \App::make('dompdf.wrapper');
         $pdf->loadHTML($view);

         return $pdf->stream('inventario'.'.pdf');
         
     }
}