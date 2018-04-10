<?php

use Illuminate\Database\Seeder;
use App\Model\General\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dato = new Roles();
      
        $dato = new Roles();
        $dato->nombre="administrador";
        $dato->descripcion="Administrador";
        $dato->slug="administrador";
        $dato->save();

        $dato = new Roles();
        $dato->nombre="usuario";
        $dato->descripcion="Usuario";
        $dato->slug="usuario";
        $dato->save();

        $dato = new Roles();
        $dato->nombre="invitado";
        $dato->descripcion="Invitado";
        $dato->slug="invitado";
        $dato->save();

    }
}
