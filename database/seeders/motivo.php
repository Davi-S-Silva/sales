<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class motivo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motivo')->insert([
            'id'=>0,
            'id_tipo_motivo'=>1,
            'descricao' => 'nota sem pedido',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
    }
}
