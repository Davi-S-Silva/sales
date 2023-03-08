@extends('admin.dashboard')
<?php
use App\Models\Colaborador;
// echo '<pre>';print_r((new Colaborador())->getMotoristas());echo '</pre>';
?>
@section('insertAS')
<form action="" method="post" name="InsertAS" enctype="multipart/form-data" class="col-12">
    <fieldset>
        @csrf
{{-- //Num, Data_as, Motorista_AS, Destino, Valor_Avista, Valor_Boleto, Valor_Bonificacao, Peso_Total, Quantidade_Notas, Status_AS --}}
        <header class="col-12 text-center"><b> Inserindo nova AS </b></header>
        <div class="d-flex justify-content-around">
            <div class="col-md-3 col-12">
                <label for="" class="form-label">AS</label>
                <input class="form-control" type="number" name="NumeroAS" id="Numero_AS" placeholder="Digite o numero da AS" required>
            </div>
            <div class="col-md-3 col-12">
                <label for="" class="form-label">Data AS</label>
                <input class="form-control"  type="datetime-local" name="DataAS" id="Data_AS" required>
            </div>
            <div class="col-md-3 col-12">
                <label for="" class="form-label">Destino</label>
                <input class="form-control" type="text" name="DestinoAS" id="Destino_AS" placeholder="Destino Final da Rota" required>
            </div>
        </div>
             
        <div class="d-flex justify-content-around">
            
            <div class="col-md-3 col-12">
                <label for="" class="form-label">Motorista da AS</label>
               
                <select class="form-control" name="MotoristaAS" id="Motorista_AS" required>
                    <option value="">Selecione o Motorista da AS</option>
                    @foreach ((new Colaborador())->getMotoristas() as $motorista)
                        <option value="{{$motorista->id}}">{{$motorista->id}} - {{$motorista->nome}}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
        <div class="d-flex justify-content-around align-items-center p-3">
                    <div class="col-md-3 col-12">
                        <label for="" class="form-label">Notas</label>
                        <input class="form-control" type="file" name="Notas[]" id="" multiple required>
                        <div class="form-check">
                            <label class="form-check-label" for="">Digitar manualmente </label> <input class="form-check-input" type="checkbox" name="DigitarNotas" id="">
                        </div>
                    </div>
                    <div>
                        <textarea name="NotasManual" id="" cols="100" rows="5" disabled placeholder="Digite as notas separadas por virgula" class="p-2"></textarea>
                        <dd>*marque a caixa "digitar manualmente" para liberar a caixa de texto.</dd>
                    </div>
                </div>   
        <div>
            <div>
                refrete:    <label for="Refrete_Sim">Sim</label><input type="radio" required name="Refrete" id="Refrete_Sim" value="0">
                            <label for="Refrete_Nao">Não</label><input type="radio" required name="Refrete" id="Refrete_Nao" value="0">
            </div>
            <input type="submit" value="Inserir" class="btn btn-primary">
        </div>
    </fieldset>
</form>
@endsection