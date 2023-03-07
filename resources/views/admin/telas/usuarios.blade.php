@extends('admin.dashboard')
@section('usuarios')
<ul class="ul_usuarios">
    <header>Usuarios do Sistema</header>
    @foreach ($users as $user)
<?php
try{
?>
    <li>
        <div>{{$user->id}} - Nome: {{$user->nome}} Login: {{$user->login}} Nivel: {{$user->nivel_acesso}} Situacao: {{$user->situacao_acesso}}</div>
        <div>
            <ul>
                <li><a href="{{route('editaUser', ['id'=>$user->id])}}">Editar</a> - <a href="">Ver</a></li>
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