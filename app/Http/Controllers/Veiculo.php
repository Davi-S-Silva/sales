<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Veiculo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function veiculoDisponivel(){

    }
    public function verificaVeiculoOuMotorista($veiculo, $motorista=''){
        $temMotorista = DB::select('select id_veiculo, id_motorista from entrega where id_veiculo = ?', [$veiculo]);
        if(count($temMotorista)!=0){
            $motoristaAtual = $temMotorista[0]->id_motorista;
            // echo $motorista .'='. $motoristaAtual;
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
        return DB::select('select * from veiculo');
    }

    public function getPlacaById($id){
        return DB::table('veiculo')->where('id',$id)->get()->first();
    }
}
