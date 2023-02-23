<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Entrega;
use App\Http\Controllers\AjudanteController;

use thiagoalessio\TesseractOCR\TesseractOCR;

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
            // echo $NotasAS['name'][$i];
            // echo ' = '.$NotasAS['tmp_name'][$i].'<br />';
            // echo $NotasAS['tmp_name'][$i].$NotasAS['name'][$i];
            if(move_uploaded_file($NotasAS['tmp_name'][$i],IMG_NOTAS_AS_C.$NumeroAS.'_'.$i.'.'.$formato[1])){
                // echo 'up com sucesso!';
                $nomeImg = $NumeroAS.'_'.$i.'.'.$formato[1];
                $localImg = IMG_NOTAS_AS_C.$nomeImg;
                if(file_exists($localImg)){
                    // echo 'existe';
                    // $arquivo = file_get_contents($img);
                    $this->lerImgNotas($localImg, $NumeroAS,$nomeImg);
                }
            }

        }
       return 'lido';
      

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
        if(isset($Ajudantes)){
            // echo count($Ajudantes);
            if(count($Ajudantes)==0){
                return "Escolha o Ajudante da Entrega!";
            }
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
        $insertAS = DB::insert('insert into autorizacao_servico (id, Num, Data_as, Motorista_AS, Destino, Valor_Avista, Valor_Boleto, Valor_Bonificacao, Peso_Total, Quantidade_Notas, Status_AS, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
        [$this->newId() ,$NumeroAS, $DataAS,$MotoristaAS,$DestinoAS, 0.00,0.00,0.00,0.00,0,1,'2023/02/25','2023/02/25']);

        if($insertAS){
             echo 'AS de número '.$NumeroAS.' inserida com sucesso!<br />';//inserir no arquivo de log futuramente
            $entrega = new Entrega();
            if($entrega->create($MotoristaEntregaAS, $VeiculoAS)){
                 echo 'Entrega de número '.$entrega->getLastId().' inserida com sucesso!<br />';//inserir no arquivo de log futuramente
                $ajudante = new AjudanteController();
                if(isset($Ajudantes)){
                    foreach ($Ajudantes as $ajud) {
                        $ajudante->create($entrega->getLastId(), $ajud);
                       echo 'Ajudante '.$ajud.' inserido com sucesso!<br />';//inserir no arquivo de log futuramente
                    }
                    return true;
                }else{
                    echo 'Entrega de número '.$entrega->getLastId().' inserida sem ajudante';
                    return true;
                    // echo 'Ajudante: '.$ajud.'<br />';//inserir no arquivo de log futuramente
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
    public function lerImgNotas($nota, $AS, $nomeImg){
        $texto = (new TesseractOCR($nota))->run();
        $div = getenv('APP_URL').'/img/img_notas_as/'.$nomeImg;
        echo '<img src="'.$div.'"/>';
        $this->mostraNotas($texto, $AS);
        echo '<hr />';
    }


    public function mostraNotas($texto, $AS){
        $contem = str_contains($texto,'Notas fiscais Relacionadas:');        
        if($contem){
            $as = explode('as:',$texto);
            //echo '<hr />--------notas da AS-------------<br />';
            // echo "<pre>"; print_r($texto); echo "</pre>";
            echo "<br />========AS: ";echo $AS;
            echo "========<br />";
            $texto2 = explode('Notas fiscais Relacionadas:',$texto);

        
            $texto3 = substr($texto,-(strlen($texto2[1])),strlen($texto));
            // Exemplo de Utilização
            $textolimpo= $this->limpar_texto($texto3);
        
            $texto_limpo = str_replace("_",'-', $textolimpo);
            $texto_limpo2 = str_replace("---",'/', $texto_limpo);
            $texto_limpo3 = str_replace("-",'/', $texto_limpo2);
            $texto_limpo4 = str_replace("--",'/', $texto_limpo3);
            //echo $texto_limpo3;
        
            $limpo = explode('/', $texto_limpo4);
        
            //echo"<pre>";print_r($limpo);echo "</pre>";
        
            $totalNotas = 0;
            for($i=0; $i<count($limpo);$i++){
                if(!empty($limpo[$i])){
                    if($this->contem_letra($limpo[$i])){
                        echo 'Imagem Incorreta. nao corresponde a notas da AS!';
                        return;
                    }else{
                        if(strlen($limpo[$i])<7){
                            echo 'Imagem Incorreta. nao corresponde a notas da AS!';
                            return ;
                        }else{
                            echo 'nota: '.$limpo[$i]."<br />";
                            $totalNotas++;
                        }
                    }       
                }
            }
            echo "total de notas: ".$totalNotas;
        }else{
            // echo 'nao tem';
            $this->mostraNotas_2($texto, $AS);
        }
        
    }
    public function mostraNotas_2($texto, $AS){
    
        $as = explode('as:',$texto);
        //echo '<hr />--------notas da AS-------------<br />';
        // echo "<pre>"; print_r($texto); echo "</pre>";
        echo "<br />========AS: ";echo $AS;
        echo "========<br />";
       
        $textolimpo= $this->limpar_texto($texto);
    
        $texto_limpo = str_replace("_",'-', $textolimpo);
        $texto_limpo2 = str_replace("---",'/', $texto_limpo);
        $texto_limpo3 = str_replace("-",'/', $texto_limpo2);
        $texto_limpo4 = str_replace("--",'/', $texto_limpo3);
        //echo $texto_limpo3;
    
        $limpo = explode('/', $texto_limpo4);
    
        //echo"<pre>";print_r($limpo);echo "</pre>";
    
        $totalNotas = 0;
        for($i=0; $i<count($limpo);$i++){
            if(!empty($limpo[$i])){
                if($this->contem_letra($limpo[$i])){
                    echo 'Imagem Incorreta. nao corresponde a notas da AS!';
                    return;
                }else{
                    if(strlen($limpo[$i])<7){
                        echo 'Imagem Incorreta. nao corresponde a notas da AS!';
                        return ;
                    }else{
                        echo 'nota: '.$limpo[$i]."<br />";
                        $totalNotas++;
                    }
                }               
            }
        }
        echo "total de notas: ".$totalNotas;
    }
    
    public function limpar_texto_numero($str){ 
        return preg_replace("/[^0-9-a-z-A-Z-,-.-:]/", "_", $str); 
    }
    public function limpar_texto($str){ 
        return preg_replace("/[^0-9-a-z-A-Z]/", "_", $str); 
    }
    public function contem_letra($str){
        return ctype_alpha($str);       
    }
      
}
