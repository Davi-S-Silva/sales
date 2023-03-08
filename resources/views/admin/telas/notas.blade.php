@extends('admin.dashboard')
<?php
use App\Models\Nota;
?>
@section('notas')
    @foreach ((new Nota())->All() as $item)
        {{$item}}
    @endforeach
@endsection