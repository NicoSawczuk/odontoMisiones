<?php

namespace App;

use Carbon\Carbon;
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

    public function user(){
        return $this->belongsTo(User::class);
    }


    //Metodos
    public function getEdad(){
        return Carbon::parse($this->fecha_nacimiento)->age;
    }
}
