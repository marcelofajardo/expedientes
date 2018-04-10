<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dato = new User();
        $dato->documento="23063889";
        $dato->nombre="Mauro Tello";
        $dato->email="maurotello73@gmail.com";
        $dato->password=bcrypt('123456');
        $dato->rol_id=1;
        $dato->estado=1;
        $dato->save();

    }
}
