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
        DB::table('veiculo')->insert([
            'id'=>0,
            'placa' => 'KLE5030',
            'tipo' => 1,
            'status_veiculo' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('veiculo')->insert([
            'id'=>0,
            'placa' => 'KGF9J34',
            'tipo' => 1,
            'status_veiculo' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('veiculo')->insert([
            'id'=>0,
            'placa' => 'MOA5880',
            'tipo' => 1,
            'status_veiculo' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('veiculo')->insert([
            'id'=>0,
            'placa' => 'CNR7873',
            'tipo' => 1,
            'status_veiculo' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('veiculo')->insert([
            'id'=>0,
            'placa' => 'KKV5J89',
            'tipo' => 1,
            'status_veiculo' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('veiculo')->insert([
            'id'=>0,
            'placa' => 'KJA2E24',
            'tipo' => 1,
            'status_veiculo' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('veiculo')->insert([
            'id'=>0,
            'placa' => 'KGA2755',
            'tipo' => 1,
            'status_veiculo' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
        DB::table('veiculo')->insert([
            'id'=>0,
            'placa' => 'KHH5H40',
            'tipo' => 1,
            'status_veiculo' => 1,
            'created_at'=>date('Y/m/d H:m:i')
        ]);
    }
}
