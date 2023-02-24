<article class="col-lg-3 col-md-4 col-12">   
    <header>
        <div class="placa_entrega"><span> Entrega: <a href="{{route('entrega',['id'=>$entrega->id])}}">
            <b>{{$entrega->id}}</b></a></span> <span> Placa: {{$entrega->id_veiculo}}</span></div>
        <div class="equipe_entrega">
            <div>Mot: <a href="">{{$entrega->id_motorista}}</a></div>
            <div>Ajud: 
                
            <?php
            $ajudante = true;
                if($ajudante){                    
                    echo '<a href="">Junior</a> - <a href="">Clodoval</a></div>';
                }else{
                    echo 'Não teve ajudante';
                }
            ?>
        </div>
    </header>
    <div class="entregas">
        <ul>
            <li><div>AS: <a href="">40640198</a></div><div class="notas_entrega"><span> total: <a href="">25</a></span><span>abertas: <a href="">13</a></span><span>concluidas: <a href="">12</a></span></div></li>
            <li><div>AS: <a href="">40640198</a></div><div class="notas_entrega"><span> total: <a href="">25</a></span><span>abertas: <a href="">13</a></span><span>concluidas: <a href="">12</a></span></div></li>
            <li><div>AS: 2 </div><div class="notas_entrega"><span> total: <a href="">50</a></span><span>abertas: <a href="">26</a></span><span>concluidas: <a href="">24</a></span></div></li>
        </ul>
        <button class="btn btn-primary">Finalizar Entrega</button>
    </div>
</article>