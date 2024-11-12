<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $clientRole = Role::firstOrCreate(['name' => 'client']);

        // Crear permisos (solo si no existen)
        $permissions = [
            'create.room',
            'edit.room',
            'delete.room',
            'view.own.reservation',
            'make.reservation',
            'manage.reservation',
            'manage.rooms',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Asignar permisos a roles
        $adminRole->givePermissionTo($permissions);
        $clientRole->givePermissionTo('view.own.reservation');
    }
}
