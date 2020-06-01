<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //

    public static function getClient($value)
    {
        $name = Clientes::findOrFail($value);
        return $name;
    }
}
