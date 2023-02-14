@extends('admin/dashboard')

@section('entrega')
    @if($idEntrega)
        {{$idEntrega}}
        vamos consultar no banco e inserir todas as informacoes necessarias aqui
    @else
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <header>Formulario de entregas</header>
                <div>
                    <label for="">AS</label>
                    <input type="number" name="" id="" placeholder="Digite o numero da AS">
                </div>
                <div>
                    <label for="">Caminhão</label>
                    <select name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select>
                </div>
                <div>
                    <label for="">Motorista</label>
                    <select name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select>
                </div>
                <div>
                    <label for="">Ajudante 1</label>
                    <select name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select>
                </div>
                <div>
                    <label for="">Ajudante 2</label>
                    <select name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select>
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
                    <input type="file" name="Notas[]" id="" multiple>
                    <video autoplay class="video"></video>
                </div>
                <button class="btn btn-primary">Inserir</button>
            </fieldset>
        </form>
    @endif
@endsection