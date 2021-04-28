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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Gerente']);

       // Permission::create(['name'=>'EmpleadoPermisos'])->assignRole($role2); un permiso con un rol

        /* Permission::create(['name'=>'empleado.index'])->syncRoles([$role2]); */
        Permission::create(['name'=>'Admin.empleado.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'Admin.index.crear'])->syncRoles([$role1]);

        $role1->permissions()->attach([]);

    }
}
