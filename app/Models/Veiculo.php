<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Entrega;
use Illuminate\Support\Facades\DB;

class Veiculo extends Model
{
    use HasFactory;

    protected $table = 'veiculo';

    public function veiculoDisponivel(){

    }
    public function verificaVeiculoOuMotorista($veiculo='', $motorista=''){
        $temMotorista = DB::select('select id_veiculo, id_motorista from entrega where id_veiculo = ? and id_status = ?', [$veiculo, 1]);
        // exit;
        // echo $temMotorista->count();
        // print_r($temMotorista->first());
        // exit;
       
        if(count($temMotorista)!=0){
            $motoristaAtual = $temMotorista[0]->id_motorista;
            echo $motorista .'='. $motoristaAtual;
            if($motorista!=$motoristaAtual){
                echo 'o veiculo '.$veiculo.' ja está com o motorista '.$motoristaAtual.' para entrega!';
                return false;
            }         
        }
        $temVeiculo = DB::select('select id_veiculo, id_motorista from entrega where id_motorista = ?', [$motorista]);
        if(count($temVeiculo)!=0){
            $veiculoAtual = $temVeiculo[0]->id_veiculo;
            // echo $motorista .'='. $motoristaAtual;
            if($veiculo!=$veiculoAtual){
                echo 'o motorista '.$motorista.' ja está com o veiculo '.$veiculoAtual.' para entrega!';
                return false;
            }         
        }
        
        //echo 'AS vai ser inserida no caminhao '. $veiculo.' com o motorista '.$motorista;
        return true;

    }


    public function getAll(){
        return Veiculo::all();
    }

    public function getPlacaById($id){
        // return Veiculo::table('veiculo')->where('id',$id)->get()->first();
        return Veiculo::find($id);
    }
}
