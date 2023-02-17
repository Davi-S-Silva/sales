@extends('admin/main')
@section('content')
        <div id="Dashboard" class="col-12 p-0 m-0">   
            <div class="menu_lateral col-md-2 col-12">
                @include('admin/includes/menu_lateral')
            </div>         
            <div class="conteudo_dashboard col-md-10 col-12">                
                @yield('entrega')
                @yield('entregas')
                @yield('usuarios')
                @yield('editUsuario')
                @yield('error')
            </div>
        </div>
@endsection