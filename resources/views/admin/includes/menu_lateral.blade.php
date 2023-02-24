<nav>
    <div class="fecha_menu"><i class="fa fa-bars fechar_menu"></i></div>
    <ul class="ul_menu_lateral">
        <li><a href=""><i class="fa-solid fa-server"></i> Sistema</a>
            <ul>
                <li><a href="{{route('allUsers')}}"><i class="fa-solid fa-users"></i> Usuarios</a></li>
                <li><a href=""><i class="fa-regular fa-credit-card"></i> Certificado Digital</a></li>
                <li><a href="{{route('manual')}}"><i class="fa-solid fa-book"></i> manual</a></li>
            </ul>
        </li>
        <li><a href=""><i class="fa-solid fa-clipboard-list"></i> Cadastros necessários</a>
            <ul>
                <li><a href=""><i class="fa-solid fa-user"></i> Colaborador</a></li>
                <li><a href=""><i class="fa-solid fa-truck-front"></i> Veiculo</a></li>
                <!-- <li>Motorista</li> -->
            </ul>
        </li>
        <li><a href="{{route('admin')}}"> <i class="fa fa-truck"></i> Entregas</a>
            <ul>
                <li><a href="{{route('entrega')}}">Inserir Entrega</a></li>
                <li><a href="{{route('entregas')}}">Consultar Entrega</a></li>
            </ul>
        </li>  
        <li>
            <a href=""><i class="fa-solid fa-gas-pump"></i> Abastecimento</a>
            <ul>
                <li><a href="">Inserir</a></li>
                <li><a href="">Consultar</a></li>
            </ul>
        </li> 
        <li>
            <a href=""><i class="fa-solid fa-bottle-water"></i> Indaia</a>
            <ul>
                <li><a href=""><i class="fa-regular fa-note-sticky"></i> AS</a></li>
                <li><a href=""><i class="fa-solid fa-note-sticky"></i> Notas</a></li>
            </ul>
        </li>       
    </ul>
</nav>