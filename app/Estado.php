<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //Relaciones
    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }
}
