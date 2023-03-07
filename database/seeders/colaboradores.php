<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class colaboradores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colaboradores')->insert([
            'id'=>0,
            'nome' => 'Gilmario',
            'funcao' => 1,
            'situacao_acesso' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('colaboradores')->insert([
            'id'=>0,
            'nome' => 'Ariosmar',
            'funcao' => 1,
            'situacao_acesso' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('colaboradores')->insert([
            'id'=>0,
            'nome' => 'Pita',
            'funcao' => 2,
            'situacao_acesso' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('colaboradores')->insert([
            'id'=>0,
            'nome' => 'chapa',
            'funcao' => 2,
            'situacao_acesso' => 0,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('colaboradores')->insert([
            'id'=>0,
            'nome' => 'Jeova',
            'funcao' => 2,
            'situacao_acesso' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('colaboradores')->insert([
            'id'=>0,
            'nome' => 'Adiel',
            'funcao' => 1,
            'situacao_acesso' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('colaboradores')->insert([
            'id'=>0,
            'nome' => 'Joao Victor',
            'funcao' => 2,
            'situacao_acesso' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
    }
}
