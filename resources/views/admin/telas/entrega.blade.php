
@extends('admin/dashboard')



<?php
    use App\Http\Controllers\ASEntrega;
    use App\Models\Veiculo;
    use App\Http\Controllers\Entrega;
    use App\Models\AS;
    
    use App\Models\Colaborador;

    $colaboradores = new Colaborador();
    $motoristas = $colaboradores->selectForFunction(1);
    $ajudantes = $colaboradores->selectForFunction(2);
    // echo '<pre>';
    // print_r($colaboradores->selectForFunction(1));
    // print_r($colaboradores->selectForFunction(2));
    // echo '</pre>';
    // $ASEntrega = new ASEntrega();
    // $ASEntrega->create(1,1);

    $veiculos = (new Veiculo())->getAll();
    // print_r($veiculos);
?>
{{-- <video autoplay id="video"></video>
<canvas></canvas>
<button>Tirar foto</button>
<!-- <script src="./script.js"></script> -->

<form action="" method="post" name="loadFoto">        
    @csrf
    <h1>Formulário</h1>
    <label>Foto: </label>
    <input type="file" name="imagem" id="imagem"><br><br>
    <input type="text" name="AS">
    <button class="btn-upload-imagem">Enviar</button>

    <div id="preview">preview</div>
</form> --}}

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script> --}}
    
    <!-- <script src="http://192.168.1.108/sales/public/js/custom.js"></script> -->
    {{-- <!-- <script src="{{asset('js/custom.js')}}"></script> --> --}}

@section('entrega')
    @if(@$idEntrega)
        <?php
            $entrega = new Entrega();
            $entrega->showAllEntrega($idEntrega);
        ?>        
    @else 

    <h1>validar os campos no javascript e no php</h1>
        <form action="" method="post" name="InsertAS" enctype="multipart/form-data" class="form-control">
            <fieldset>
                @csrf
    {{-- //Num, Data_as, Motorista_AS, Destino, Valor_Avista, Valor_Boleto, Valor_Bonificacao, Peso_Total, Quantidade_Notas, Status_AS --}}
                <div class="d-flex justify-content-around">
                    <header class="col-12 text-center"><b> AS </b></header>
                   
                </div>
                <div class="d-flex justify-content-around">
                    <header class="col-12 text-center"><b> Dados da Entrega </b></header>
                    <div class="col-md-3 col-12">
                        <label for="" class="form-label">Motorista da entrega</label>
                        <select class="form-control" name="MotoristaEntregaAS" id="Motorista_Entrega_AS" required>
                            <option value="">Selecione o Motorista da AS</option>
                            @foreach ($motoristas as $motorista)
                                <option value="{{$motorista->id}}">{{$motorista->id}} - {{$motorista->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-12">
                        <label for="" class="form-label">Caminhão</label>
                        <select class="form-control"  name="VeiculoAS" id="Veiculo_AS" required>
                            <option value="">Selecione o Veiculo</option>
                            @foreach ($veiculos as $veiculo)
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
                    <!-- {{-- <video autoplay class="video"></video> --}} -->
                </div>   
                
                <!-- <div>
                    <label for="">Passar Carga?</label>
                    <label for="Sim">Sim</label>
                    <input type="radio" name="PassaCarga" id="Sim" value="1">
                    <label for="Nao">Não</label>
                    <input type="radio" name="PassaCarga" id="Nao" value="0">

                </div> -->
                
                <button class="btn btn-primary" name="InsertAS">Inserir</button>
            </fieldset>
        </form>
    @endif
<!-- {{-- <button class="btn_test">teste api</button> --}} -->

@endsection