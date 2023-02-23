<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class veiculo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('veiculo')->insert([
            'id'=>0,
            'placa' => 'PEM1B91',
            'tipo' => 1,
            'status_veiculo' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
    }
}
