@extends('admin.dashboard')
<?php
    use App\Models\Colaborador;
    if(isset($id)){
        echo $id;
        $colaborador = Colaborador::find($id);

        // echo '<pre>';print_r($colaborador);echo '</pre>';
        // exit;
    }
?>
@section('formColab')
<form action="" method="post">
    <fieldset>
        <header><b> Colaborador </b></header>
        <div>
            <label for="">Nome</label>
            <input class="form-control" type="text" name="" id="" value="{{@$colaborador->nome}}">
        </div>
        <div>
            <label for="">Função</label>
            <select class="form-control"  name="" id="">
                <?php if(isset($colaborador->funcao)) { echo '<option value="'.$colaborador->funcao.'" selected>'.$colaborador->funcao.'</option>';}?>
                <option value="">Selecione a função</option>
                <option value="">Motorista</option>
                <option value="">Adminstrativo</option>
                <option value="">Encarregado</option>
                <option value="">Gerente</option>
            </select>
        </div>
        <button class="btn btn-primary my-2" type="submit">Cadastrar</button>
    </fieldset>
</form>
@endsection