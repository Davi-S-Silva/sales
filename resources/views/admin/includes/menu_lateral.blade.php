<nav>
    <div class="fecha_menu"><i class="fa fa-bars fechar_menu"></i></div>
    <ul class="ul_menu_lateral">
        @for ($i = 0; $i < 15; $i++)
            <li><a href=""> item {{$i}}</a></li>            
        @endfor
    </ul>
</nav>