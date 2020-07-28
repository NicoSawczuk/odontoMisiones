<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoIncidencia extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $table = "tipos_incidencias";
}
