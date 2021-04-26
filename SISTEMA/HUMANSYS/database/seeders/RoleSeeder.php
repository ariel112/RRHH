<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'gerenteRRHH']);
        $role2 = Role::create(['name' => 'empleado']);

       // Permission::create(['name'=>'EmpleadoPermisos'])->assignRole($role2); un permiso con un rol

        Permission::create(['name'=>'EmpleadoPermisos'])->syncRoles([$role2]);

        $role1->permissions()->attach([]);

    }
}
