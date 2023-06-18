<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'cpf' => '12345678910', // Precisará colocar um CPF válido por conta do validador
            'name' => 'Administrador',
            'email' => 'admin@joaodebarro.com.br',
            'email_verified_at' => '2023-01-01 00:00:00',
            'password' => Hash::make('654321'),
            'is_admin' => true
        ]);

        \App\Models\User::factory()->create([
            'cpf' => '10987654321', // Precisará colocar um CPF válido por conta do validador
            'name' => 'Vendedor',
            'email' => 'vendedor@joaodebarro.com.br',
            'email_verified_at' => '2023-01-01 00:00:00',
            'password' => Hash::make('654321'),
            'is_admin' => false
        ]);
    }
}
