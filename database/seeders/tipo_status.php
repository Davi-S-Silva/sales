<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipo_status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('tipo_status')->insert([
            'id'=>0,
            'descricao' => 'Notas',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        //2
        DB::table('tipo_status')->insert([
            'id'=>0,
            'descricao' => 'AS',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        //3
        DB::table('tipo_status')->insert([
            'id'=>0,
            'descricao' => 'Entrega',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        //4
        DB::table('tipo_status')->insert([
            'id'=>0,
            'descricao' => 'Assinante',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        //5
        DB::table('tipo_status')->insert([
            'id'=>0,
            'descricao' => 'Veiculo',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
    }
}
