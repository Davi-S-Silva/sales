<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipo_motivo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_motivo')->insert([
            'id'=>0,
            'descricao' => 'Notas',
            'created_at'=>date('Y/m/d H:m:i')
        ]);
    }
}
