<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role0 = Role::create(['name'=>'Admin']);

        $role1 = Role::create(['name'=>'Ver-Credenciales']);
        $role2 = Role::create(['name'=>'Agregar-Credenciales']);
        $role3 = Role::create(['name'=>'Actualizar-Credenciales']);
        $role4 = Role::create(['name'=>'Eliminar-Credenciales']);


        Permission::create(['name'=>'ver-Credenciales'])->assignRole($role1,$role0);
        Permission::create(['name'=>'Agregar-Credenciales'])->assignRole($role2,$role0);
        Permission::create(['name'=>'Actualizar-Credenciales'])->assignRole($role3,$role0);
        Permission::create(['name'=>'Eliminar-Credenciales'])->assignRole($role4,$role0);
        
        Permission::create(['name'=>'ver-Usuarios'])->assignRole($role0);
        Permission::create(['name'=>'Agregar-Usuarios'])->assignRole($role0);
        Permission::create(['name'=>'Actualizar-Usuarios'])->assignRole($role0);
        Permission::create(['name'=>'Eliminar-Usuarios'])->assignRole($role0);
        
    }
}
