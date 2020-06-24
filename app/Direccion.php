<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Direccion extends Model
{
    use SoftDeletes;

    //Relaciones
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

}
