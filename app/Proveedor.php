<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;
    protected $guarded = []; //podremos usar todos sus atributos
    public $table = "proveedores"; //la tabla se llamara de esta manera


    public function partes()
    {
        return $this->belongsToMany(Parte::class);
    }

}
