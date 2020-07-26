<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    //Relaciones
    public function estado(){
        return $this->belongsTo(Estado::class);
    }

    public function tecnico(){
        return $this->belongsTo(Tecnico::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class);
    }

    public function partes()
    {
        return $this->belongsToMany(Parte::class);
    }

}
