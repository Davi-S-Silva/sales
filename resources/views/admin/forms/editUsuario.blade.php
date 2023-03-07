@extends('admin.dashboard')
@section('editUsuario')
<?php


// echo '<pre>';print_r($usuario);echo '</pre>';

    $nome = isset($usuario->nome)?$usuario->nome:'';
    $login = isset($usuario->login)?$usuario->login:'';
    if(isset($usuario->senha))
    {
        $disabled = 'disabled';
        ?>
            <form action="{{route('updateUser',['id'=>$usuario->id])}}" method="post">
        <?php
    }else{
        $disabled = '';
        ?>
            <form action="{{route('storeUser')}}" method="post">
        <?php
    }
?>
    
        <fieldset>
            @csrf
            <div>
                <label for="">Nome</label>
                <input type="text" class="form-control" name="NomeUsuario" id="" value="{{$nome}}">
            </div>
            
            <div>
                <label for="">Login</label>
                <input type="text" class="form-control" name="LoginUsuario" id="" value="{{$login}}">
            </div>
            <?php

            if(isset($usuario->senha)){
                ?>
                <label for="">Deseja Alterar a Senha:</label>
                <input type="checkbox" name="AlterarSenha" id="">
                <?php
            }
            ?>
            <div>
                <label for="">Senha</label>
                <input type="password" class="form-control" name="SenhaUsuario" id="" {{$disabled}}>
            </div>
            
            <div>
                <label for="">Confirma Senha</label>
                <input type="password" class="form-control" name="ConfirmSenhaUsuario" id="" {{$disabled}}>
            </div>

            <div class="py-2">
                <button class="btn btn-primary">Salvar</button>
                {{-- <button class="btn btn-danger">Cancelar</button> --}}
                <input class="btn btn-danger" type="reset" value="Cancelar">
            </div>
        </fieldset>
    </form>
@endsection
