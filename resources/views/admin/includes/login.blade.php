@extends('admin/main')
@section('content')
<div id="Div_Login_Admin" class="col-md-3 col-12">
<form  name="FormLoginAdmin" id="Form_Login_Admin" action="logar" method="post" class="col-10">
    <fieldset>{{--atributo disabled--}}
        @csrf
        <div>
            <label for="" class="form-label">Usuario</label>
            <input class="form-control m-0" type="text" name="UsuarioLoginAdmin" id="" placeholder="Digite seu Usuário!">
        </div>
        <div>
            <label for="" class="form-label">Senha</label>
            <input class="form-control m-0" type="password" name="SenhaLoginAdmin" id="" placeholder="Digite sua Senha!">
        </div>
        <div>
            <input type="submit" value="Logar" name="BtnLogar" class="btn btn-primary">
        </div>
    </fieldset>
</form> 
</div>
@endsection
