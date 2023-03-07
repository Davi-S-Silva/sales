@extends('admin.dashboard')
<?php
    use App\Models\A_S;
    use App\Models\Colaborador;
    use App\Models\Veiculo;
    $ASs = (new A_S())->all();
    $ajudantes = (new Colaborador())->getAjudantes();
?>
@section('createEntrega')
<form action="{{route('insertEntrega')}}" method="post" name="InsertAS" enctype="multipart/form-data">
    <fieldset>
    @csrf
        <header>Entrega</header>
        <div class="col-12 d-flex justify-content-center">
            @foreach($ASs as $AS)
            <!-- {{print($AS)}} -->
                <div class="col-3"> <input type="checkbox" name="ASEntrega[]" id="" value="{{$AS->id}}"> 
                    AS:{{$AS->num}} - destino:{{$AS->destino}} - motorista:{{(new Colaborador())->getColaborador($AS->motorista_as)->nome}}
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-around">
                    <header class="col-12 text-center"><b> Dados da Entrega </b></header>
                    <div class="col-md-3 col-12">
                        <label for="" class="form-label">Motorista da entrega</label>
                        <select class="form-control" name="MotoristaEntregaAS" id="Motorista_Entrega_AS" required>
                            <option value="">Selecione o Motorista da AS</option>
                            @foreach ((new Colaborador())->getMotoristas() as $motorista)
                                <option value="{{$motorista->id}}">{{$motorista->id}} - {{$motorista->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-12">
                        <label for="" class="form-label">Caminhão</label>
                        <select class="form-control"  name="VeiculoAS" id="Veiculo_AS" required>
                            <option value="">Selecione o Veiculo</option>
                            @foreach ((new Veiculo())->getAll() as $veiculo)
                                <option value="{{$veiculo->id}}">{{$veiculo->id}} - {{$veiculo->placa}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="Area_Ajudantes" class="col-12">                        
                        <div id="Div_Add_Ajudante" class="col-12"> 
                            <div class="ajudante1 col-md-3 col-12">
                                <x-SelectColaborador :ajudante=$ajudantes/>                                 
                                <a href="" id="Add_Ajudante_1">Add Ajudante 1</a>                    
                            </div>
                            <div class="ajudante2 col-md-3 col-12">
                                <x-SelectColaborador :ajudante=$ajudantes/>                                 
                                <a href="" id="Add_Ajudante_2">Add Ajudante 2</a>                    
                            </div>
                            <div class="ajudante3 col-md-3 col-12">
                                <x-SelectColaborador :ajudante=$ajudantes/>                               
                                <a href="" id="Add_Ajudante_3">Add Ajudante 3</a>                   
                            </div>
                        </div>      
                    </div>                     
                </div>    
        <button class="btn btn-primary">Inserir</button>
    </fieldset>
</form>
@endsection