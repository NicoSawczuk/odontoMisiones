<?php

use App\User;
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles
        Role::create([
            'name'          => 'Admin',
            'slug'          => 'admin',
            'description'   => 'Es el administrador del sistema, puede realizar todas las acciones',
            'special'       => 'all-access'
        ]);

        Role::create([
            'name'          => 'Tecnico',
            'slug'          => 'tecnico',
            'description'   => 'El rol corresponde a un tecnico del sistema'
        ]);

        Role::create([
            'name'          => 'Atencion al publico',
            'slug'          => 'atencion',
            'description'   => 'El rol corresponde a un usuario encargado de la atención al publico'
        ]);


        //Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('159753'),
        ]);
        $admin->syncRoles('admin');
        $admin->save();

        //Tecnico
        $tecnico = User::create([
            'name' => 'Tecnico',
            'email' => 'tecnico@tecnico.com',
            'password' => Hash::make('1597532486'),
        ]);
        $tecnico->syncRoles('tecnico');
        $tecnico->save();

        //Atencion al publico
        $atencion = User::create([
            'name' => 'Atencion al publico',
            'email' => 'atencion@atencion.com',
            'password' => Hash::make('1597532486'),
        ]);
        $atencion->syncRoles('atencion');
        $atencion->save();


    }
}
