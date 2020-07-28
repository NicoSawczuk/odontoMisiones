<?php

use App\Estado;
use Illuminate\Database\Seeder;

class EstadosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'nombre' => 'sin asignar',
            'descripcion' => 'Estado inicial de cualquier incidencia',
            'nivel' => 1,
            'color' => '#DC7633'
        ]);
        Estado::create([
            'nombre' => 'asignado',
            'descripcion' => 'Estado que indica que una incidencia se encuentra asignada a un tecnico',
            'nivel' => 2,
            'color' => '#82E0AA'
        ]);
        Estado::create([
            'nombre' => 'en proceso',
            'descripcion' => 'Estado que indica que se esta tratando la incidencia',
            'nivel' => 3,
            'color' => '#3498DB'
        ]);
        Estado::create([
            'nombre' => 'pendiente de pago',
            'descripcion' => 'Estado que indica que la incidencia esta terminada pero con el pago pendiente',
            'nivel' => 4,
            'color' => '#F4D03F'
        ]);
        Estado::create([
            'nombre' => 'pagado',
            'descripcion' => 'Estado que indica que la incidencia ha finalizado',
            'nivel' => 5,
            'color' => '#4DF827'
        ]);
    }
}
