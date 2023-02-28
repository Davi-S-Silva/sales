<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use thiagoalessio\TesseractOCR\TesseractOCR;
class NotasAS extends Controller
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
    public function create($id_as, $nota,$status)
    {
        try{
            DB::insert('insert into notas_as (id,id_as,nota,id_tipo_pagamento,valor,status,data_conclusao,created_at,updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?)',
                                            [0, $id_as, $nota,0,0, $status,null,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')]);
        }catch(Exception $e){
            echo 'essa nota ja esta cadastrada!<br />';
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
        $lastId=DB::select('select max(id) from notas_as');
        $id_AS = (array) $lastId[0];
        return $id_AS['max(id)'];
    }
    public function newId(){
        if($this->getLastId()==0){
            return $this->getLastId()+1;
        }else{
            return $this->getLastId();
        }
    }
    public function verificaNotaBd($nota){
        return DB::table('notas_as')->where('nota',$nota)->get();
    }
    public function extraiNotas($nota){
        try{            
            $texto = (new TesseractOCR($nota))->run();
            if(!$texto){
                throw new Exception("Imagem invalida ou ilegível. Selecione outra imagem!"); 
            }
            // $div = getenv('APP_URL').'/img/img_notas_as/'.$nomeImg;
            // echo '<img src="'.$div.'"/>';
           return $this->retornaNotas($texto);
            // echo '<hr />';
        }catch(Exception $e){
            print ($e->getMessage());
            exit;
        }
    }
    private function retornaNotas($texto){
        $contem = str_contains($texto,'Notas fiscais Relacionadas:');        
        if($contem){           
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
        
            // $totalNotas = 0;
            for($i=0; $i<count($limpo);$i++){
                if(!empty($limpo[$i])){
                    if($this->contem_letra($limpo[$i])){
                        echo 'Imagem Incorreta. Contem letras na nota. Não corresponde a notas da AS!';
                        return;
                    }else{
                        if(strlen($limpo[$i])<7){
                            echo 'Imagem Incorreta. a quantidade de digitos do numero não corresponde a nota da AS!';
                            return ;
                        }else{
                            // echo 'nota: '.$limpo[$i]."<br />";
                            // $this->insertNota($limpo[$i]);
                            $notas[]=$limpo[$i];
                        }
                    }       
                }
            }
            return $notas;
        }else{
            // echo 'nao tem';
            $notas = $this->retornaNotas2($texto);
        }
        return $notas;
    }

    public function retornaNotas2($texto){
        // $as = explode('as:',$texto);
        // //echo '<hr />--------notas da AS-------------<br />';
        // echo "<pre>"; print_r($texto); echo "</pre>";
        // echo "<br />========AS: ";echo $AS;
        // echo "========<br />";
       
        $textolimpo= $this->limpar_texto($texto);
    
        $texto_limpo = str_replace("_",'-', $textolimpo);
        $texto_limpo2 = str_replace("---",'/', $texto_limpo);
        $texto_limpo3 = str_replace("-",'/', $texto_limpo2);
        $texto_limpo4 = str_replace("--",'/', $texto_limpo3);
        //echo $texto_limpo3;
    
        $limpo = explode('/', $texto_limpo4);
    
        // echo"<pre>";print_r($limpo);echo "</pre>";
    
        // $totalNotas = 0;
        for($i=0; $i<count($limpo);$i++){
            // echo 'nota: '.$limpo[$i]."<br />";
            if(!empty($limpo[$i])){
                if($this->contem_letra($limpo[$i])){
                    echo 'Imagem Incorreta. Não corresponde a notas da AS!';
                    return;
                }else{
                    if(strlen($limpo[$i])<7){
                        echo 'Imagem Incorreta. a quantidade de digitos do numero não corresponde a nota da AS!';
                        return ;
                    }else{
                        // echo 'nota: '.$limpo[$i]."<br />";
                        $notas[]=$limpo[$i];
                    }
                }               
            }
        }   
        return $notas;     
    }

    public function insertNota($id_as,$nota){
        // echo  'nota ',$nota,' inserida<br>';
        $notasAS = (new NotasAS())->create($id_as, $nota, 1);
    }

    public function getNotasForAS($id_as, $status=''){
        // return DB::table('notas_as')->where(['id_as'=>$id_as,'status'=>$status])->get();
        if($status==''){
            return DB::table('notas_as')->where(['id_as'=>$id_as])->get();
        }else{
            return DB::table('notas_as')->where(['id_as'=>$id_as,'status'=>$status])->get();
        }
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
    public function limpar_numeros($str){ 
        return preg_replace("/[^0-9-,]/", "", $str); 
    }
}
