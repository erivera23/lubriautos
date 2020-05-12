<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //
    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'producto_id');
    }
}


