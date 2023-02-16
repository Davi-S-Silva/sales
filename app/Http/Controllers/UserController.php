<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('usuario')){
           return redirect()->route('admin');
        }else{
            return view('admin/includes/login');
        }
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
        $login = htmlspecialchars( $request['UsuarioLoginAdmin']);
        $senha = htmlspecialchars($request['SenhaLoginAdmin']);
        if(strlen($login)<6){
            return "o minimo de caracteres para o login sao 6.";
        }else if(strlen($senha) < 8){
            return "o minimo de caracteres para a senha é 8.";
        }
        //$hashSenha = md5($senha);
        $hashSenha = $senha;
        $user = DB::select('select * from usuarios where login = "'.$login.'" and senha = "'.$hashSenha.'"');
        if($user){
            //criar sessao
            session(['usuario' => $user[0]->login]);
            return 1;
        }else{
            return "Nenhum usuario encontrado!";
        }
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
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
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
}
