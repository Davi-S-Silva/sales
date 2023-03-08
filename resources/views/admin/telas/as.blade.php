@extends('admin.dashboard')
<?php
use App\Models\Colaborador;
$countLinha = 0;
?>
@section('getAllAS')
<div class="col-12 bg-danger text-center">
<table class="col-12 p-2 bg-primary">
        <tr class="d-flex bg-dark text-white py-2 col-12">
            <th class="col-1">id</th>
            <th class="col-1">num</th>
            <th class="col-1">data as</th>
            <th class="col-1">destino</th>
            <th class="col-1">motorista as</th>
            <th class="col-1">avista</th>
            <th class="col-1">boleto</th>
            <th class="col-1">bonificacao</th>
            <th class="col-1">peso total</th>
            <th class="col-1">qtd notas</th>
            <th class="col-1">status</th>
            <th class="col-1">criacao</th>
        </tr>
        @foreach ($itens as $item)
        <?php
            if($countLinha%2==0){
                $bg = 'bg-light';
            }else{
                $bg = 'bg-white';
            }
        ?>
                <!-- <p class="bg-primary p-2">{{$item}}</p> -->
                <!-- <a href="{{route('editarAS',['id'=>$item->id])}}">editar</a> -->            
            <tr class="d-flex py-2 align-items-center border-bottom {{$bg}}">
                <td class="col-1">{{$item->id}}</td>
                <td class="col-1">{{$item->num}}</td>
                <td class="col-1">{{date('d/m/Y H:i:s', strtotime($item->data_as))}}</td>
                <td class="col-1">{{$item->destino}}</td>
                <td class="col-1">{{(new Colaborador())->getColaborador($item->motorista_as)->nome}}</td>
                <td class="col-1">R$ {{$item->valor_avista}}</td>
                <td class="col-1">R$ {{$item->valor_boleto}}</td>
                <td class="col-1">R$ {{$item->valor_bonificacao}}</td>
                <td class="col-1">Kg {{$item->peso_total}}</td>
                <td class="col-1">{{$item->quantidade_notas}}</td>
                <td class="col-1">{{$item->status_as}}</td>
                <td class="col-1">{{date('d/m/Y H:i:s', strtotime($item->created_at))}}</td>            
            </tr>
            <tr class="d-flex p-1 {{$bg}} border-bottom">
                <td class="col-1">
                    <a href="{{route('editarAS',['id'=>$item->id])}}">Editar</a>
                </td>
                <td class="col-1">
                    <a href="{{route('editarAS',['id'=>$item->id])}}">Assinante</a>
                </td>
                <td class="col-1">
                    <a href="{{route('editarAS',['id'=>$item->id])}}">Notas</a>
                </td>
            </tr>
        <?php
            $countLinha++;
        ?>
        @endforeach
    </table>
</div>
@endsection