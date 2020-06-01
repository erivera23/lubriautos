<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    //

    public static function vehiculos()
    {
        $vehiculos = Vehiculos::join('clientes', 'clientes.id', 'vehiculos.cliente_id')
                                ->selectRaw('clientes.representante, vehiculos.id, vehiculos.tipo, vehiculos.descripcion, vehiculos.placa, vehiculos.anio')
                                ->where('clientes.empresarial', '=', 0);

        return $vehiculos;
    }

    public static function busqueda($value)
    {
        $vehiculos = Vehiculos::join('clientes', 'clientes.id', 'vehiculos.cliente_id')
                                ->selectRaw('clientes.representante, vehiculos.id, vehiculos.tipo, vehiculos.descripcion, vehiculos.placa, vehiculos.anio')
                                ->where('clientes.empresarial', '=', 0)
                                ->where('clientes.representante', 'LIKE', '%'. $value .'%')
                                ->orWhere('vehiculos.tipo', 'LIKE', '%'. $value .'%')
                                ->orWhere('vehiculos.placa','LIKE', '%'. $value .'%')
                                ->orWhere('vehiculos.anio','LIKE', '%'. $value .'%');
        return $vehiculos;
    }



    public static function vehiculosCompany()
    {
        $vehiculos = Vehiculos::join('clientes', 'clientes.id', 'vehiculos.cliente_id')
                                ->selectRaw('clientes.empresa, clientes.representante, vehiculos.id, vehiculos.tipo, vehiculos.descripcion, vehiculos.placa, vehiculos.anio')
                                ->where('clientes.empresarial', '=', 1);

        return $vehiculos;
    }

    public static function busquedaCompany($value)
    {
        $vehiculos = Vehiculos::join('clientes', 'clientes.id', 'vehiculos.cliente_id')
                                ->selectRaw('clientes.empresa, clientes.representante, vehiculos.id, vehiculos.tipo, vehiculos.descripcion, vehiculos.placa, vehiculos.anio')
                                ->where('clientes.empresarial', '=', 1)
                                ->where('clientes.empresa', 'LIKE', '%'. $value .'%')
                                ->orWhere('clientes.representante', 'LIKE', '%'. $value .'%')
                                ->orWhere('vehiculos.tipo', 'LIKE', '%'. $value .'%')
                                ->orWhere('vehiculos.placa','LIKE', '%'. $value .'%')
                                ->orWhere('vehiculos.anio','LIKE', '%'. $value .'%');
        return $vehiculos;
    }

    public static function vehiculosByClient($value)
    {
        $vehiculos = Vehiculos::join('clientes', 'clientes.id', 'vehiculos.cliente_id')
                                ->selectRaw('clientes.empresa, clientes.representante, vehiculos.id, vehiculos.tipo, vehiculos.descripcion, vehiculos.placa, vehiculos.anio')
                                ->where('clientes.id', '=', $value);
        
        return $vehiculos;

    }

    public static function vehiculosByCompany($value)
    {
        $vehiculos = Vehiculos::join('clientes', 'clientes.id', 'vehiculos.cliente_id')
                                ->selectRaw('clientes.empresa, clientes.representante, vehiculos.id, vehiculos.tipo, vehiculos.descripcion, vehiculos.placa, vehiculos.anio')
                                ->where('clientes.id', '=', $value);


        return $vehiculos;
    }
}
