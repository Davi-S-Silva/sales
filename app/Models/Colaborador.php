<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Colaborador extends Model
{
    use HasFactory;


    protected $table = "colaboradores";



    public function getMotoristas(){
        // $colaboradores = DB::table('colaborador')->where('funcao',$funcao)->get();
        $colaboradores = Colaborador::where('funcao', 1)->get();
        return $colaboradores;
    }
    public function getAjudantes(){
        // $colaboradores = DB::table('colaborador')->where('funcao',$funcao)->get();
        $colaboradores = Colaborador::where('funcao', 2)->get();
        return $colaboradores;
    }
    public function selectForFunction($funcao){
        // $colaboradores = DB::table('colaborador')->where('funcao',$funcao)->get();
        $colaboradores = Colaborador::where('funcao', $funcao)->get();
        return $colaboradores;
    }
    public function getColaborador($id){
        $colaborador = Colaborador::where('id',$id)->get()->first();
        return $colaborador;
    }
}
