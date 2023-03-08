@extends('admin.dashboard')
<?php
$count = 0;
?>
@section('usuarios')
<div class="col-12 d-flex flex-column align-items-center">
<header>Usuarios do Sistema</header>
<ul class="ul_usuarios col-10">
    <li class="">
        <ul class="col-10 topo_usuarios m-auto">
            <li class="col-1">id</li>
            <li class="col-2">Nome</li>
            <li class="col-2">Login</li>
            <li class="col-1">Nivel</li>
            <li class="col-1">Situação</li>
            <li class="col-3">Ação</li>
        </ul>
    </li>
    @foreach ($users as $user)
<?php
$count++;
try{
?>
    <li>
        <!-- <div>
            {{$user->id}} - Nome: {{$user->nome}} Login: {{$user->login}} Nivel: {{$user->nivel_acesso}} Situacao: {{$user->situacao_acesso}}
           
        </div> -->
        <?php
        if($count%2==0){
            $bg = 'bg-light';
        }else{
            $bg = 'bg-white';
        }
        ?>
        <ul class="col-10 m-auto">
            <li class="col-1 {{$bg}}">{{$user->id}}</li>
            <li class="col-2 {{$bg}}">{{$user->nome}}</li>
            <li class="col-2 {{$bg}}">{{$user->login}}</li>
            <li class="col-1 {{$bg}}">{{$user->nivel_acesso}}</li>
            <li class="col-1 {{$bg}}">{{$user->situacao_acesso}}</li>
            <li class="col-3 {{$bg}}"><a href="{{route('editaUser', ['id'=>$user->id])}}">Bloquear</a> - <a href="">Desativar</a> - <a href="">Editar</a></li>
        </ul>
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
</div>
@endsection