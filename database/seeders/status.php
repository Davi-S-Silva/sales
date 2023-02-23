<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_sistema')->insert([
            'id'=>0,
            'id_tipo_status' => 1,
            'descricao' =>'Retorno',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('status_sistema')->insert([
            'id'=>0,
            'id_tipo_status' => 1,
            'descricao' =>'Pendente',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('status_sistema')->insert([
            'id'=>0,
            'id_tipo_status' => 1,
            'descricao' =>'Concluida',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('status_sistema')->insert([
            'id'=>0,
            'id_tipo_status' => 5,
            'descricao' =>'Disponivel',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('status_sistema')->insert([
            'id'=>0,
            'id_tipo_status' => 5,
            'descricao' =>'Ocupado',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('status_sistema')->insert([
            'id'=>0,
            'id_tipo_status' => 5,
            'descricao' =>'Manutenção',
            'created_at'=>date('Y/m/d H:m:i')
        ]);

    }
}
