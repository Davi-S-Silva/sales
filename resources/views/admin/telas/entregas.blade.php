<?php
    use App\Http\Controllers\Entrega;

    $Entrega = new Entrega();
?>

@extends('admin/dashboard')
@section('entregas')
<section class="container_entregas col-12">
    <section>
        <form action="" method="post">
            <fieldset>
                <input type="search" name="" id=""/>
            </fieldset>
        </form>
    </section>
    <header>
        total de Entregas {{$Entrega->getCount()}}
    </header>
    <section class="area_entregas">
        <?php
            $Entrega->showEntregas();
        ?>
    </section>
</section>
@endsection