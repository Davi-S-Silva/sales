<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('/css/styleadmin.css')}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
    <title>Sales Almeida Transportes</title>
</head>
<body>
    <div class="container-fluid p-0">
        <div id="RespostaAjax" class="alert ">resposta ajax</div>
      @if (session()->has('usuario'))
        <header class="topo_sistema">
            <div class="logo_topo col-md-2 col-12">
                <figure><a href="{{route('admin')}}"><img src="{{asset('img/logo.png')}}" alt="asdfasfd"></a></figure>
            </div>
            <div class="col-md-10 col-12">
                <div>
                    <form action="" method="post">
                        <label class="form-control"><i class="fa fa-search"></i></label>
                        <input class="form-control col-8" type="search" name="" id="" placeholder="">
                        <button class="btn btn-primary">Buscar</button>
                    </form>
                </div>
                <div>
                    infos
                </div>
                <div class="user_top m-0">
                    <div class="toggle_user_top">
                        <i class="fa-solid fa-user"></i> <span>{{session('usuario')}}</span> <i class="fa-solid fa-caret-down"></i>
                    </div>
                    <ul class="p-0 m-0">
                        <li>
                            <a href="">Perfil</a>
                        </li>    
                        <li>
                            <a href="{{route('sair')}}">Sair</a>
                        </li>
                    </ul>
                </div>
        </header>                      
      @endif
        
        