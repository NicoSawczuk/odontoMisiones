<?php

use App\TipoIncidencia;
use Illuminate\Database\Seeder;

class TiposIncidenciasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoIncidencia::create([
            'nombre' => 'Instalacion',
            'descripcion' => 'aquellas dónde se deben realizar la instalación, y puesta en marcha, de un equipo a domicilio',
            'monto_mano_obra' => 2650
        ]);
        TipoIncidencia::create([
            'nombre' => 'Servicio',
            'descripcion' => 'aquellas dónde se deban realizar el diagnóstico y reparación de un equipo, sea en domicilio o en taller.',
            'monto_mano_obra' => 1500
        ]);
    }
}
