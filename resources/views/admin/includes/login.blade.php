@extends('admin/main')
@section('content')
<div id="Div_Login_Admin" class="col-md-3 col-12">
<form  name="FormLoginAdmin" id="Form_Login_Admin" action="logar" method="post" class="col-12">
    @csrf
    <div>
        <label for="">Usuario</label>
        <input class="form-control" type="text" name="UsuarioLoginAdmin" id="" placeholder="Digite seu Usuário!">
    </div>
    <div>
        <label for="">Senha</label>
        <input class="form-control" type="password" name="SenhaLoginAdmin" id="" placeholder="Digite sua Senha!">
    </div>
    <div>
        <input type="submit" value="Logar" name="BtnLogar" class="btn btn-primary">
    </div>
</form> 
</div>
@endsection
