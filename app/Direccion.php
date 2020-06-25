<?php

namespace App;

use Cardumen\ArgentinaProvinciasLocalidades\Models\Localidad;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Pais;
use Cardumen\ArgentinaProvinciasLocalidades\Models\Provincia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Direccion extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $table = "direcciones";

    //Relaciones
    public function cliente(){
        return $this->hasOne(Cliente::class);
    }

    public function pais(){
        return $this->belongsTo(Pais::class);
    }

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }

    public function localidad(){
        return $this->belongsTo(Localidad::class);
    }




}
