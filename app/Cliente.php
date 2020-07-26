<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $table = "clientes";

    //Relaciones
    public function direccion(){
        return $this->belongsTo(Direccion::class);
    }

    //Relaciones
    public function equipos(){
        return $this->hasMany(Equipo::class);
    }

    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }

    


}
