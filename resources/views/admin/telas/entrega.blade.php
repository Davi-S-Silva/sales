
@extends('admin/dashboard')



<?php
    use App\Http\Controllers\ASEntrega;
    use App\Http\Controllers\Colaborador;
    use App\Http\Controllers\Veiculo;
    use App\Http\Controllers\Entrega;


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
        <form action="{{route('insertAS')}}" method="post" name="InsertAS" enctype="multipart/form-data" class="form-control">
            <fieldset>
                @csrf
    {{-- //Num, Data_as, Motorista_AS, Destino, Valor_Avista, Valor_Boleto, Valor_Bonificacao, Peso_Total, Quantidade_Notas, Status_AS --}}
                <header>Formulario de entregas</header>
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
                        <label for="" class="form-label">Caminhão</label>
                        <select class="form-control"  name="VeiculoAS" id="Veiculo_AS" required>
                            <option value="">Selecione o Veiculo</option>
                            @foreach ($veiculos as $veiculo)
                                <option value="{{$veiculo->id}}">{{$veiculo->id}} - {{$veiculo->placa}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-12">
                        <label for="" class="form-label">Motorista AS</label>
                        <select class="form-control" name="MotoristaAS" id="Motorista_AS" required>
                            <option value="">Selecione o Motorista da AS</option>
                            @foreach ($motoristas as $motorista)
                                <option value="{{$motorista->id}}">{{$motorista->id}} - {{$motorista->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-12">
                        <label for="" class="form-label">Motorista da entrega</label>
                        <select class="form-control" name="MotoristaEntregaAS" id="Motorista_Entrega_AS" required>
                            <option value="">Selecione o Motorista da AS</option>
                            @foreach ($motoristas as $motorista)
                                <option value="{{$motorista->id}}">{{$motorista->id}} - {{$motorista->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-around">
                    <div id="Area_Ajudantes" class="col-12">
                            <div class="row col-md-3 col-12">    
                                <div class="div_ajudantes col-12">
                                    <label for="" class="form-label">Ajudante: </label>  
                                    <select class="ajudantes form-control" name="Ajudantes[]" id="Ajudantes" required>
                                        <option value="">Selecione o 1º Ajudante</option>
                                        @foreach ($ajudantes as $ajudante)
                                        <option value="{{$ajudante->id}}">{{$ajudante->id}} - {{$ajudante->nome}}</option>
                                        @endforeach
                                    </select>   
                                    <div>
                                        <a href="" class="fecha_select_ajudante">X</a>                             
                                    </div>
                                </div>                        
                                <a href="" id="Add_Ajudante">Add Ajudante</a>   
                                <div id="Div_Add_Ajudante" class="col-12"> 
                                    <!-- <div class="ajudante1 d-none">
                                        <x-SelectColaborador :ajudante=$ajudantes/>                   
                                    </div>
                                    <div class="ajudante-clone d-none">
                                        <x-SelectColaborador :ajudante=$ajudantes/>                   
                                    </div> -->
                                </div>          
                            </div>                                                                   
                        <div class="area_sem_ajudante"></div>
                        
                    </div> 
                </div>     

                    <div>
                        <label for="" class="form-label">Notas</label>
                        <input class="form-control" type="file" name="Notas[]" id="" multiple required>
                        <div class="form-check">
                            <label class="form-check-label" for="">Digitar manualmente </label> <input class="form-check-input" type="checkbox" name="DigitarNotas" id="">
                            <br>
                            <a href="">Add Nota</a>
                        </div>
                        <!-- {{-- <video autoplay class="video"></video> --}} -->
                    </div>                 
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
{{-- <button class="btn_test">teste api</button> --}}

@endsection