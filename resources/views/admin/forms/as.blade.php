@extends('admin.dashboard')

@section('insertAS')
<form action="" method="post" name="InsertAS" enctype="multipart/form-data" class="form-control">
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
                <label for="" class="form-label">Motorista AS</label>
                <select class="form-control" name="MotoristaAS" id="Motorista_AS" required>
                    <option value="">Selecione o Motorista da AS</option>
                    {{-- @foreach ($motoristas as $motorista)
                        <option value="{{$motorista->id}}">{{$motorista->id}} - {{$motorista->nome}}</option>
                    @endforeach --}}
                </select>
            </div>
            
        </div>
        <div>
            <input type="submit" value="Inserir" class="btn btn-primary">
        </div>
    </fieldset>
</form>
@endsection