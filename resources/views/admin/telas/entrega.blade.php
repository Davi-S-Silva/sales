
@extends('admin/dashboard')

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
        {{@$idEntrega}}
        vamos consultar no banco e inserir todas as informacoes necessarias aqui
    @else 
        <form action="{{route('insertAS')}}" method="post" name="InsertAS" enctype="multipart/form-data">
            <fieldset>
                @csrf
                {{-- //Num, Data_as, Motorista_AS, Destino, Valor_Avista, Valor_Boleto,
                     Valor_Bonificacao, Peso_Total, Quantidade_Notas, Status_AS --}}
                <header>Formulario de entregas</header>
                <div>
                    <label for="">AS</label>
                    <input type="number" name="NumeroAS" id="Numero_AS" placeholder="Digite o numero da AS" required>
                </div>
                <div>
                    <label for="">Data AS</label>
                    <input type="datetime-local" name="DataAS" id="Data_AS" required>
                </div>                
                <div>
                    <label for="">Caminhão</label>
                    <select name="VeiculoAS" id="Veiculo_AS" required>
                        <option value="">Selecione o Veiculo</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div>
                    <label for="">Motorista AS</label>
                    <select name="MotoristaAS" id="Motorista_AS" required>
                        <option value="">Selecione o Motorista da AS</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div>
                    <label for="">Motorista que vai para a entrega</label>
                    <select name="MotoristaEntregaAS" id="Motorista_Entrega_AS" required>
                        <option value="">Selecione o Motorista da AS</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div id="Area_Ajudantes">
                    <label for="">Ajudante: </label>
                    <select name="Ajudantes[]" id="Ajudantes" required>
                        <option value="">Selecione o 1º Ajudante</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <a href="" class="fecha_select_ajudante">X</a>
                    <div class="area_sem_ajudante"></div>
                </div>                
                <div id="Div_Add_Ajudante">                    
                </div>                
                <a href="" id="Add_Ajudante">Add Ajudante</a>
                <div>
                    <label for="">Destino</label>
                    <input type="text" name="DestinoAS" id="Destino_AS" placeholder="Destino Final da Rota" required>
                </div>
                <!-- <div>
                    <label for="">Passar Carga?</label>
                    <label for="Sim">Sim</label>
                    <input type="radio" name="PassaCarga" id="Sim" value="1">
                    <label for="Nao">Não</label>
                    <input type="radio" name="PassaCarga" id="Nao" value="0">

                </div> -->
                <div>
                    <label for="">Foto notas</label>
                    <input type="file" name="Notas[]" id="" multiple required>
                    {{-- <video autoplay class="video"></video> --}}
                </div>
                <button class="btn btn-primary" name="InsertAS">Inserir</button>
            </fieldset>
        </form>
    @endif
{{-- <button class="btn_test">teste api</button> --}}

@endsection