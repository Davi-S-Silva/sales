<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncaoColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcao_colaboradores')->insert([
            'id'=>0,
            'descricao' => 'Motorista',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('funcao_colaboradores')->insert([
            'id'=>0,
            'descricao' => 'Auxiliar de Carga e Descarga',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('funcao_colaboradores')->insert([
            'id'=>0,
            'descricao' => 'Auxiliar Administrativo',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('funcao_colaboradores')->insert([
            'id'=>0,
            'descricao' => 'Encarregado',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('funcao_colaboradores')->insert([
            'id'=>0,
            'descricao' => 'Gerente',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
    }
}
