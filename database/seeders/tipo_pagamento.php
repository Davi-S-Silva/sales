<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipo_pagamento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_pagamento')->insert([
            'id'=>0,
            'descricao' => 'Avista',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('tipo_pagamento')->insert([
            'id'=>0,
            'descricao' => 'Boleto',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('tipo_pagamento')->insert([
            'id'=>0,
            'descricao' => 'Bonificacao',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
    }
}
