<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Equipo extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $table = "equipos";


    //Relaciones
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
