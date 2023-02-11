<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('/css/styleadmin.css')}}">
    <title>Sales Almeida Transportes</title>
</head>
<body>
    <div class="container-fluid p-0">
        <div id="RespostaAjax" class="alert ">resposta ajax</div>
      @if (session()->has('usuario'))
        <header class="topo_sistema">
            <div class="logo_topo col-2">
                <figure><img src="" alt="asdfasfd"></figure>
            </div>
            <div><i class="fa-solid fa-user"></i> {{session('usuario')}} - <a href="{{route('sair')}}">Sair</a></div>
        </header>                      
      @endif
        
        