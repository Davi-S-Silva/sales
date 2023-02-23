<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacaoAcessoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('situacao_acessos')->insert([
            'id'=>0,
            'descricao' =>'ativo',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
    }
}
