<nav>
    <div class="fecha_menu"><i class="fa fa-bars fechar_menu"></i></div>
    <ul class="ul_menu_lateral">
        <li><a href=""><i class="fa-solid fa-server"></i> Sistema</a>
            <ul>
                <li>
                    <a href="{{route('allUsers')}}"><i class="fa-solid fa-users"></i> Usuarios</a>
                    <a href="{{route('createUser')}}">Inserir Novo Usuario</a>
                </li>
                <li><a href=""><i class="fa-regular fa-credit-card"></i> Certificado Digital</a></li>
                <li><a href="{{route('manual')}}"><i class="fa-solid fa-book"></i> manual</a></li>
            </ul>
        </li>
        <li><a href=""><i class="fa-solid fa-clipboard-list"></i> Cadastros necessários</a>
            <ul>
                <li><a href="{{route('createColaborador')}}"><i class="fa-solid fa-user"></i> Colaborador</a></li>
                <li><a href="{{route('createVeiculo')}}"><i class="fa-solid fa-truck-front"></i> Veiculo</a></li>
                <li><a href=""><i class="fa-solid fa-handshake"></i> Cliente</a></li>
                <!-- <li>Motorista</li> -->
            </ul>
        </li>
        <li><a href="{{route('entregas')}}"> <i class="fa fa-truck"></i> Entregas</a>
            <ul>
                <li><a href="{{route('createEntrega')}}">Inserir Entrega</a></li>
                <li><a href="">Consultar Entrega</a></li>
            </ul>
        </li>  
        
        <li>
            <a href=""><i class="fa-solid fa-bottle-water"></i> Indaia</a>
            <ul>
                <li>
                    <a href="{{route('allAS')}}"><i class="fa-regular fa-note-sticky"></i> AS</a>
                    <a href="{{route('createAS')}}">Inserir AS</a>
                </li>
                <li><a href="{{route('notas')}}"><i class="fa-solid fa-note-sticky"></i> Notas</a></li>
            </ul>
        </li>  
        <li>
            <a href=""><i class="fa-solid fa-plate-wheat"></i> Rosa Branca</a>
            <ul>
                <li>
                    <a href=""><i class="fa-regular fa-note-sticky"></i> </a>
                </li>
            </ul>
        </li>  
        <li>
            <a href=""><i class="fa-solid fa-wine-bottle"></i>Coca Cola</a>
            <ul>
                <li>
                    <a href=""><i class="fa-regular fa-note-sticky"></i> </a>
                </li>
            </ul>
        </li>  
        <li>
            <a href=""><i class="fa-solid fa-basket-shopping"></i> Cesta Básica</a>
            <ul>
                <li>
                    <a href=""><i class="fa-regular fa-note-sticky"></i> </a>
                </li>
            </ul>
        </li>  
        <li>
            <a href=""><i class="fa-solid fa-wallet"></i>Financeiro</a>
            <ul>
                <li>
                    <a href=""><i class="fa-solid fa-circle-plus"></i> entrada</a>
                </li>
                <li>
                    <a href=""><i class="fa-solid fa-circle-minus"></i> saida</a>
                </li>
            </ul>
        </li>   
        <li>
            <a href=""><i class="fa-solid fa-gas-pump"></i> Abastecimento</a>
            <ul>
                <li><a href="">Inserir</a></li>
                <li><a href="">Consultar</a></li>
            </ul>
        </li>   
    </ul>
</nav>