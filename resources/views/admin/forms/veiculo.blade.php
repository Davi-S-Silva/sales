@extends('admin.dashboard')

@section('veiculo')
    <form action="" method="post">
        <fieldset>
            <b>Veiculo</b>
            <div class="form-group">
                <label for="" class="label-control">Placa</label>
                <input class="form-control" type="text" name="Placa" id="" placeholder="Digite a Placa do veiculo">
            </div>
            <div class="form-group">
                <label for="">Tipo de Veiculo</label>
                <select class="form-control" name="" id="">
                    <option value="">Selecione o tipo do veiculo</option>
                    <option value="">Truck</option>
                    <option value="">Toco</option>
                    <option value="">3/4</option>
                    <option value="">Cavalo</option>
                    <option value="">Bau carreta</option>
                </select>
            </div>
            <div class="py-2">
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </fieldset>
    </form>
@endsection