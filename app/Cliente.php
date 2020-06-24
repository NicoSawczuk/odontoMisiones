<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    //Relaciones
    public function direccion(){
        return $this->hasOne(Direccion::class);
    }


}
