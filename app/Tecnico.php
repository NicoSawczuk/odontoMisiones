<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tecnico extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $table = "tecnicos";

    //Relaciones
    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }
}
