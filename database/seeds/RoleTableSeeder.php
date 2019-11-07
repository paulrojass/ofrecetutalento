<?php

use App\Role;

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Maestro de talentos - Administrator';
        $role->save();        
        
        $role = new Role();
        $role->name = 'cazatalentos';
        $role->description = 'Usuarios o Empresas interesados en buscar talentos';
        $role->save();

        $role = new Role();
        $role->name = 'novato';
        $role->description = 'Usuario Novato';
        $role->save();

        $role = new Role();
        $role->name = 'pro';
        $role->description = 'Usuario Pro';
        $role->save();

        $role = new Role();
        $role->name = 'oro';
        $role->description = 'Usuario Oro';
        $role->save();
    }
}