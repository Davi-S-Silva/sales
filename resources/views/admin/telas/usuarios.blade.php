@extends('admin.dashboard')
@section('usuarios')
<div>
    <header>Inserir novo usuario</header>
    <form action="" method="post">
        @csrf
        <input type="text" name="" class="form-control" id="" placeholder="Digite o Nome do usuario">
        <button class="btn btn-primary">Cadastrar</button>
        <button class="btn btn-warning">Limpar</button>
    </form>
</div>
<ul class="ul_usuarios">
    <header>Usuarios do Sistema</header>
    @foreach ($users as $user)
<?php
try{
?>
    <li>
        <div> Nome: {{$user->nome}} Login: {{$user->login}} Nivel: {{$user->nivel_acesso}} Situacao: {{$user->situacao_acesso}}</div>
        <div>
            <ul>
                <li><a href="{{route('editUser',['id'=>$user->id])}}">Editar</a> - <a href="">Ver</a></li>
            </ul>
        </div>
    </li>
    <?php
   //throw new Exception('Erro');
}catch(Exception $e){
    // echo $e->getmessage();
    echo ($e->getMessage());
}
?>
    @endforeach
</ul>  
@endsection