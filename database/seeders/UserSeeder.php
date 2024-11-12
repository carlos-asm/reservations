<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Obtener los roles existentes
         $adminRole = Role::findByName('admin');
         $clientRole = Role::findByName('client');
 
         // Crear el usuario admin
         $adminUser = User::create([
             'name' => 'Admin User',
             'email' => 'admin@example.com',
             'password' => Hash::make('12345678'),
         ]);
         $adminUser->assignRole($adminRole);  // Asignar el rol admin
 
         // Crear el usuario client
         $clientUser = User::create([
             'name' => 'Client User',
             'email' => 'client@example.com',
             'password' => Hash::make('12345678'),
         ]);
         $clientUser->assignRole($clientRole);  // Asignar el rol client
    }
}
