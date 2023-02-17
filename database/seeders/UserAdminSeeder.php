<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'id'=>0,
            'nome' => 'davi santos',
            'login' =>'davisantos',
            'senha' => 'b8321ffcd5aec164bd2aa1d8a17ac87e',
            'nivel_acesso'=>0,
            'situacao_acesso'=>1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        // $table->id();
        // $table->string('nome');
        // $table->string('login');
        // $table->string('senha');
        // $table->integer('nivel_acesso');
        // $table->integer('situacao_acesso');
    }
}
