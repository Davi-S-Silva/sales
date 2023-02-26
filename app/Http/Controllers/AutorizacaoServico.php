<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Entrega;
use App\Http\Controllers\AjudanteController;
use App\Http\Controllers\Veiculo;
use App\Http\Controllers\NotasAS;

use thiagoalessio\TesseractOCR\TesseractOCR;
use Exception;

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
        $SemAjudante     =   $request['SemAjudante'];
        $NotasAS            =   $_FILES['Notas'];

        // echo '<br /> <br /><hr /><pre>';print_r($NotasAS);echo '</pre>';
        
        foreach ($NotasAS['type'] as $tipo) {
            if($tipo == "image/png" || $tipo == "image/jpg" || $tipo == "image/jpeg"){
                // echo $tipo.' => imagem correta <br />'; 
            }else{
                echo $tipo.' => erro de imagen  - formato nao permitido, escolha outra imagem!<br />';
                return false;
            }           
        }
        foreach ($NotasAS['size'] as $size) {
            if($size > 420000){
                echo $tipo.' => erro de Tamanho  - Tamanho nao permitido, escolha outra imagem!<br />';
                return false;
            }else{
                // echo $tipo.' => Tamanho correto <br />'; 
            }           
        }
        $formato = explode('/',$tipo);
        for($i=0;$i<count($NotasAS['name']);$i++){
           
            if(file_exists(IMG_NOTAS_AS_C.$NumeroAS.'_'.$i.'.'.$formato[1])){
                return 'Este arquivo ja existe. Reveja o numero da AS!';
            }
            //verificar as notas se ja estao no banco pra nao ir repetida
            if(move_uploaded_file($NotasAS['tmp_name'][$i],IMG_NOTAS_AS_C.$NumeroAS.'_'.$i.'.'.$formato[1])){
                $Notas_da_AS = (new NotasAS())->extraiNotas(IMG_NOTAS_AS_C.$NumeroAS.'_'.$i.'.'.$formato[1]);
                
                
                foreach ($Notas_da_AS as $nota) {
                    if(count((new NotasAS())->verificaNotaBd($nota))!=0){
                        echo 'essa nota '.$nota.' ja esta cadastrada';
                        return;
                    }
                }                
            }
            
        }

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

        //verificar se o motorista ja esta com o caminhao em alguma entrega 
        //pra nao sair motorista em dois caminhoes ou dois caminhoes em um motorista
        //no veiculo ja tem motorista?

        $veiculo = new Veiculo();
        if(!$veiculo->verificaVeiculoOuMotorista($VeiculoAS, $MotoristaEntregaAS)){
            return ;
        }



        if(isset($Ajudantes)){
            // echo count($Ajudantes);
            if(count($Ajudantes)==0){
                return "Escolha o Ajudante da Entrega!";
            }

            //verificar se o ajudante escolhido ja esta em alguma entrega.

        }
        // if(isset($SemAjudante)){
        //     echo 'ola sem ajudante?';
        //     return false;
        // }
        if($DestinoAS==""){
            return "Insira o Destino da Entrega!";
        }
        if(isset($NotasAS['name'])){
            if(count($NotasAS['name'])==0){
                return "Escolha a foto das notas da AS!";

            }
        }
        // echo $DataAS;
        // return $request;
        // return $dados;
        $dataHoje = date('Y-m-d');
        try{
            $insertAS = DB::insert('insert into autorizacao_servico (id, Num, Data_as, Motorista_AS, Destino, Valor_Avista, Valor_Boleto, Valor_Bonificacao, Peso_Total, Quantidade_Notas, Status_AS, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
            [$this->newId() ,$NumeroAS, $DataAS,$MotoristaAS,$DestinoAS, 0.00,0.00,0.00,0.00,0,1,$dataHoje,$dataHoje]);  
        }catch(Exception $e){
            if($e->getCode()==23000){
                return 'AS ja foi cadastrada anteriormente em nosso sistema, verifique novamente o numero da AS digitada!';
            }
        }

        if($insertAS){
            //  echo 'AS de número '.$NumeroAS.' inserida com sucesso!<br />';//inserir no arquivo de log futuramente
            
            //INSERIR AS NOTAS NO BANCO
            $this->inserirNotasAS($tipo,$NotasAS,$NumeroAS);
            
             $entrega = new Entrega();
            if($entrega->getLastId()==0){
                //inserir na tabela AS_entrega
                $ASEntrega = new ASEntrega();
                $ASEntrega->create($entrega->getLastId(),$this->getLastId());


                if($entrega->create($MotoristaEntregaAS, $VeiculoAS)){
                    // echo 'Entrega de número '.$entrega->getLastId().' inserida com sucesso!<br />';//inserir no arquivo de log futuramente
                   $ajudante = new AjudanteController();
                   if(isset($Ajudantes)){
                       foreach ($Ajudantes as $ajud) {
                           $ajudante->create($entrega->getLastId(), $ajud);
                        //   echo 'Ajudante '.$ajud.' inserido com sucesso!<br />';//inserir no arquivo de log futuramente
                       }
                       return true;
                   }else{
                    //    echo '<br />Entrega de número '.$entrega->getLastId().' inserida sem ajudante';
                       return true;
                       // echo 'Ajudante: '.$ajud.'<br />';//inserir no arquivo de log futuramente
                   }
               }else{
                   return false;
               }
            }else{
                if($entrega->getMesmaEntrega($VeiculoAS,$MotoristaEntregaAS,$dataHoje)==0){
                    if($entrega->create($MotoristaEntregaAS, $VeiculoAS)){
                        // echo 'Entrega de número '.$entrega->getLastId().' inserida com sucesso!<br />';//inserir no arquivo de log futuramente
                        
                        
                        //INSERIR AS NOTAS NO BANCO
                        $this->inserirNotasAS($tipo,$NotasAS,$NumeroAS);
                        //    return 'temporariamente encerrado - lido';


                        //inserir na tabela AS_entrega
                        $ASEntrega = new ASEntrega();
                        $ASEntrega->create($entrega->getLastId(),$this->getLastId());

                        //inserir ajudante
                       $ajudante = new AjudanteController();
                       if(isset($Ajudantes)){
                           foreach ($Ajudantes as $ajud) {
                               $ajudante->create($entrega->getLastId(), $ajud);
                            //   echo 'Ajudante '.$ajud.' inserido com sucesso!<br />';//inserir no arquivo de log futuramente
                           }
                           return true;
                       }else{
                        //    echo '<br />Entrega de número '.$entrega->getLastId().' inserida sem ajudante';
                           return true;
                           // echo 'Ajudante: '.$ajud.'<br />';//inserir no arquivo de log futuramente
                       }
                   }else{
                       return false;
                   }
                }else{
                    //inserir na tabela AS_entrega
                    // echo '<br />vamos inserir na tabema AS_entrega pois o motorista ja esta em uma entrega vamos adicionar essa AS nele';
                    $ASEntrega = new ASEntrega();
                    $ASEntrega->create($entrega->getLastId(),$this->getLastId());
                }
            }          
            // return;            
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
    public function getAS($id){
        return DB::table('autorizacao_servico')->where('id',$id)->get()->first();
    }
    public function getAll(){
        return $TodasAS = DB::select('select * from autorizacao_servico');
    }

    public function getLastId(){
        $lastId = DB::select('select max(id) from autorizacao_servico as max');
        $id_AS = (array) $lastId[0];
        return $id_AS['max(id)'];
    }
    public function getCount(){
        $count = DB::select('select count(id) from autorizacao_servico');
        $countArray = (array)$count[0];
        return $countArray['count(id)'];
    }
    public function newId(){
        return $this->getLastId()+1;
    }    
    public function inserirNotasAS($tipo,$NotasAS,$NumeroAS){
        $formato = explode('/',$tipo);
        for($i=0;$i<count($NotasAS['name']);$i++){
            $localImg = IMG_NOTAS_AS_C.$NumeroAS.'_'.$i.'.'.$formato[1];
            if(file_exists($localImg)){
                // echo 'existe';
                // $arquivo = file_get_contents($img);
                $Notas_da_AS = (new NotasAS())->extraiNotas(IMG_NOTAS_AS_C.$NumeroAS.'_'.$i.'.'.$formato[1]);
               foreach ($Notas_da_AS as $nota) {
                    (new NotasAS())->insertNota($this->getLastId(),$nota);
               }
            }
        }
    } 
    
    public function getNotasForAS($id_as,$status=''){
        return (new NotasAS())->getNotasForAS($id_as,$status);
    }
}
