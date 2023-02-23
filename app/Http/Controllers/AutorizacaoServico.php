<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Entrega;
use App\Http\Controllers\AjudanteController;

class AutorizacaoServico extends Controller
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
    public function create(Request $request)
    {    
        $NumeroAS           =   htmlspecialchars($request['NumeroAS']);
        $DataAS             =   htmlspecialchars($request['DataAS']);
        $MotoristaAS        =   htmlspecialchars($request['MotoristaAS']);
        $DestinoAS          =   htmlspecialchars($request['DestinoAS']);
       
        $MotoristaEntregaAS =   htmlspecialchars($request['MotoristaEntregaAS']);
        $VeiculoAS          =   htmlspecialchars($request['VeiculoAS']);

        // $AjudanteUmAS       =   htmlspecialchars($request['AjudanteUmAS']);
        $Ajudantes       =   $request['Ajudantes'];
        
        $NotasAS            =   $_FILES['Notas'];
        
        // echo '<pre>';print_r($Ajudantes);echo '</pre>';
        // return false;

        if($NumeroAS==""){
            return "Preencha corretamente o número da AS!";
        }
        if(strlen($NumeroAS) < 8){
            return "O tamanho do número da AS é no minimo 8 digitos!";
        }
        
        if($DataAS==""){
            return "Insira a Data da AS!";
        }
        if($VeiculoAS==""){
            return "Escolha o Veiculo da Entrega!";
        }
        if($MotoristaAS==""){
            return "Escolha o motorista que saiu na AS!";
        }
        if($MotoristaEntregaAS==""){
            return "Escolha o motorista da entrega!";
        }
        if(count($Ajudantes)==0){
            // echo count($Ajudantes);
            return "Escolha o Ajudante da Entrega!";
        }
        if($DestinoAS==""){
            return "Insira o Destino da Entrega!";
        }
        if(count($NotasAS['name'])==0){
            return "Escolha a foto das notas da AS!";
        }
        // echo $DataAS;
        // return $request;
        // return $dados;
        $insertAS = DB::insert('insert into autorizacao_servico (id, Num, Data_as, Motorista_AS, Destino, Valor_Avista, Valor_Boleto, Valor_Bonificacao, Peso_Total, Quantidade_Notas, Status_AS, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
        [$this->newId() ,$NumeroAS, $DataAS,$MotoristaAS,$DestinoAS, 0.00,0.00,0.00,0.00,0,1,'2023/02/25','2023/02/25']);

        if($insertAS){
            $entrega = new Entrega();
            if($entrega->create($MotoristaEntregaAS, $VeiculoAS)){
                $ajudante = new AjudanteController();
                foreach ($Ajudantes as $ajud) {
                    $ajudante->create($entrega->getLastId(), $ajud);
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
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
    public function getLastId(){
        $lastId = DB::select('select max(id) from autorizacao_servico as max');
        $id_AS = (array) $lastId[0];
        return $id_AS['max(id)'];
    }
    public function newId(){
        return $this->getLastId()+1;
    }
}
