@extends('admin.dashboard')

@section('getAllAS')
<div class="col-12 bg-danger">
    @foreach ($itens as $item)
    <div class="col-12">
        <p class="bg-primary p-2">{{$item}}</p>
        <a href="{{route('editarAS',['id'=>$item->id])}}">editar</a>
    </div>
    @endforeach
</div>
@endsection