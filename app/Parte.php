<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Parte extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $table = "partes";
}
