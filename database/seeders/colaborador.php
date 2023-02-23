<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class colaborador extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colaborador')->insert([
            'id'=>0,
            'nome' => 'Gilmario',
            'funcao' => 1,
            'situacao_acesso' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
    }
}
