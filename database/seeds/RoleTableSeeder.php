<?php

use App\Role;

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $role = new Role();
        $role->name = 'root';
        $role->description = 'Administrator root de la plataforma';
        $role->save();        
        
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administradores creados por el usuario root';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->description = 'Usuarios de la plataforma';
        $role->save();
    }
}