<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoIncidencia extends Model
{
    protected $guarded = [];
    public $table = "tipos_incidencias";

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
    }

}
