<?php
use App\Http\Controllers\ASEntrega;
use App\Http\Controllers\AutorizacaoServico;
use App\Http\Controllers\Colaborador;
use App\Http\Controllers\AjudanteController;
use App\Http\Controllers\Veiculo;
$ASEntrega = new ASEntrega();
$ASsEntrega = $ASEntrega->getASEntrega($entrega->id);
$colaborador = new Colaborador();
$ajudantes = new AjudanteController();
$veiculo = new Veiculo();
// print_r();
?>

<article class="col-lg-3 col-md-4 col-sm-6 col-12">   
    <header class="col-12">
        <div class="placa_entrega col-12">
            <span> Entrega: <a href="{{route('entrega',['id'=>$entrega->id])}}">
            <b>{{$entrega->id}}</b></a></span> <span> Placa: {{$veiculo->getPlacaById($entrega->id_veiculo)->placa}}</span>
        </div>
        <div class="equipe_entrega col-12">
            <div class=""><label for=""> Mot </label><a href="">{{$colaborador->getColaborador($entrega->id_motorista)->nome}}</a></div>
            <div class="ajudantes"> 
                @if (count($ajudantes->getAjudantesEntrega($entrega->id))!=0)
                    @foreach ($ajudantes->getAjudantesEntrega($entrega->id) as $ajudante)
                        <div class=""><label for=""> Ajud </label><a href=''>{{$colaborador->getColaborador($ajudante->id_ajudante)->nome}}</a></div> 
                    @endforeach                    
                @else
                    nao teve ajudante                    
                @endif           
        </div>
    </header>
    <div class="entregas col-12">
        <ul>
            @foreach ($ASsEntrega as $AS)
            <?php 
                $as = new AutorizacaoServico();               
                // print_r($notas);
            ?>
                <li>
                    <div>AS <a href="">{{$as->getAS($AS->id_as)->num}}</a></div>
                    <div class="notas_entrega">
                        <span><label>total</label> <a href="">{{count($as->getNotasForAS($AS->id_as))}}</a></span>
                        <span><label>abertas</label> <a href="">{{count($as->getNotasForAS($AS->id_as,1))}}</a></span>
                        <span><label>concluidas</label> <a href="">{{count($as->getNotasForAS($AS->id_as,2))}}</a></span>
                    </div>
                </li>    
            @endforeach
        </ul>
        <button class="btn btn-primary">Finalizar Entrega</button>
    </div>
</article>