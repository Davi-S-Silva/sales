<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Usuario::all();
        return view('admin.telas.usuarios', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forms.editUsuario');
    }

    /**
     * Armazene um recurso recém-criado no armazenamento
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $usuario = new Usuario();
        $usuario->id = $usuario->newId();
        $nome = addslashes($request['NomeUsuario']);
        if(strlen($nome)<6){
            echo 'erro: o nome de usuario deve conter no minimo 6 letras';
            return;
        }
        $usuario->nome = $nome;
        $login = addslashes($request['LoginUsuario']);
        if(strlen($login)<6){
            echo 'erro: o login de usuario deve conter no minimo 6 letras';
            return;
        }
        if(str_contains($login, ' '))
        {
            echo 'o login nao pode haver espaco';
            return;
        }
        $usuario->login = $login;
        $senha = addslashes($request['SenhaUsuario']);
        $confirmSenha = addslashes($request['ConfirmSenhaUsuario']);

        if(strlen($senha)<8){
            echo 'a senha deve ter no minimo 8 digitos';
            return;
        }else if($senha!=$confirmSenha){
            echo 'as senhas digitadas nao coincidem';
            return;
        }
        $usuario->senha = md5($senha);

        $usuario->nivel_acesso = 0;
        $usuario->situacao_acesso = 1;
        $usuario->created_at = date('Y-m-d H:i:s');
        $usuario->updated_at = date('Y-m-d H:i:s');

        if($usuario->save()){
            return 'Usuario Cadastrado com Sucesso!';
        }
    //    echo '<pre>';print_r($usuario);echo '</pre>';
    //    echo '<pre>';print_r(Usuario::all());echo '</pre>';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id='')
    {
        $usuario = Usuario::select('*')->where('id',$id)->get()->first();
        return view('admin.forms.editUsuario',['usuario'=>$usuario]);
        // if($id==null){
        //     return view('admin.error',['error'=>'Usuario nao pode ser vazio!']);
        // }
        // $usuario = DB::table('usuarios')->where('id',$id)->first();
        // if($usuario){
        //     return view('admin.forms.editUsuario',['usuario'=>$usuario]);                
        // }else{
        //     return view('admin.error',['error'=>'Usuario nao encontrado, Tente novamente!']);
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

        $usuario = Usuario::find($id);
        // $usuario = Usuario::where('id',$id)->get()->first();
        //echo $request['NomeUsuario'];
        
        $usuario->nome= $request['NomeUsuario'];
        $usuario->login= $request['LoginUsuario'];
        $alterarSenha = $request['AlterarSenha'];

        

        if($alterarSenha=='on'){
            $senha = addslashes($request['SenhaUsuario']);
            if(strlen($senha)<8){
                echo 'a senha deve ter no minimo 8 digitos';
                return;
            }else if($senha!=$confirmSenha){
                echo 'as senhas digitadas nao coincidem';
                return;
            }
            $usuario->senha = $senha;
        }
        if($usuario->save()){
            return 'Usuario alterado com sucesso!';
        }
        

    //    echo '<pre>'; print_r($usuario);echo '</pre>';
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function logout(){
        session()->forget('usuario');
        return redirect()->route('admin');
    }

    public function showAll(){
        try{
            //$users = DB::table('usuarios')->count();
            return $usuarios = DB::table('usuarios')->get();
         //    echo '<pre>';print_r($usuarios);echo '</pre>';
        return view('admin.telas.usuarios',['users'=>$usuarios]);
        // throw new \Exception('Erro showAll');
        }catch(Exception $e ){
           echo  $e->getmessage();
        }
    }
    public function getAll(){
        try{
            //$users = DB::table('usuarios')->count();
            return $usuarios = DB::table('usuarios')->get();
        }catch(Exception $e ){
           echo  $e->getmessage();
        }
    }
    
    public function logar(){
        if(session()->has('usuario')){
           return redirect()->route('admin');
        }else{
            return view('admin/includes/login');
        }
    }

    public function validalogin(Request $request){
        $login = htmlspecialchars( $request['UsuarioLoginAdmin']);
        $senha = htmlspecialchars($request['SenhaLoginAdmin']);
        if(strlen($login)<6){
            return "o minimo de caracteres para o login sao 6.";
        }else if(strlen($senha) < 6){
            return "o minimo de caracteres para a senha é 6.";
        }
        $hashSenha = md5($senha);
        //$hashSenha = $senha;

        // return $hashSenha;
        $user = DB::select('select * from usuarios where login = "'.$login.'" and senha = "'.$hashSenha.'"');
        if($user){
            //criar sessao
            session(['usuario' => $user[0]->login]);
            return 1;
        }else{
            return "Nenhum usuario encontrado!";
        }
    }
}
