<div><label for="">Ajudante</label> <a href="" class="fecha_select_ajudante">X</a></div>
<select name="Ajudantes[]" ajudante disabled required {{$attributes->merge(['class'=>'ajudantes form-control'])}}>
    <option value="">Selecione o prox. Ajudante</option>
    @foreach ($ajudante as $ajudante)
        <option value="{{$ajudante->id}}">{{$ajudante->nome}}</option>
    @endforeach
</select>