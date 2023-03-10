<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserAdminSeeder::class,
            tipo_status::class,
            status::class,
            tipo_motivo::class,
            tipo_pagamento::class,
            motivo::class,
            colaboradores::class,
            veiculo::class,
            SituacaoAcessoSeeder::class,
            FuncaoColaboradorSeeder::class,
        ]);
    }
}
