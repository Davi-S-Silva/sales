<nav>
    <div class="fecha_menu"><i class="fa fa-bars fechar_menu"></i></div>
    <ul class="ul_menu_lateral">
        @for ($i = 0; $i < 15; $i++)
            <li><a href=""> <i class="fa fa-home"></i> Assinante {{$i}}</a>
            <ul>
                <li><a href="link {{$i}}">sub menu</a></li>
                <li><a href="link {{$i}}">sub menu</a></li>
                <li><a href="link {{$i}}">sub menu</a></li>
            </ul>
        </li>            
        @endfor
    </ul>
</nav>