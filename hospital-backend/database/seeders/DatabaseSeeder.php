<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear los 5 roles específicos para la empresa de distribución de agua
        $adminRole = Rol::create([
            'nombre' => 'Administrador',
            'descripcion' => 'Encargado de la gestión general de la empresa, con todos los permisos.',
        ]);

        Rol::create([
            'nombre' => 'Medico',
            'descripcion' => 'Encargado de gestionar las entregas y la distribución de los productos.',
        ]);

        Rol::create([
            'nombre' => 'Enfermera',
            'descripcion' => 'Responsable de las ventas y la relación con los clientes.',
        ]);


        // Crear el usuario "Test User" con el rol de Administrador
        $user = User::create([
            'nombre' => 'Brayan David',
            'apellidos' => 'Padilla Siles',
            'telefono' => '67544099',
           // $table->foreignId('role_id')->nullable()->constrained('roles')->onDelete('cascade'); // role_id opcional
            'email' => 'admint@example.com',
            'password' => bcrypt('12345678'),
            'rol_id' => 1,
        ]);


    }
}
