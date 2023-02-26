<select name="Ajudantes[]" id="Ajudantes" ajudante required {{$attributes->merge(['class'=>'ajudantes'])}}>
    <option value="">Ajudante</option>
    @foreach ($ajudante as $ajudante)
        <option value="{{$ajudante->id}}">{{$ajudante->nome}}</option>
    @endforeach
</select>
<a href="" class="fecha_select_ajudante">X</a>