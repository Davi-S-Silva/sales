@extends('admin.dashboard')
@section('editUsuario')

    <form action="" method="post">
        <fieldset disabled>
            @csrf
            <input type="text" class="form-control" name="" id="" value="{{$usuario->nome}}">
            <input type="text" class="form-control" name="" id="" value="{{$usuario->login}}">

            <button class="btn btn-primary">Salvar</button>
            <button class="btn btn-danger">Cancelar</button>
        </fieldset>
    </form>
@endsection
