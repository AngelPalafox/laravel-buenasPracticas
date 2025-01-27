<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un varios usuarios de prueba en un bucle
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => 'Usuario ' . $i,
                'email' => 'usuario' . $i . '@example.com',
                'password' => 'G7!e2O#d5n$9',
            ]);
        }
    }
}
