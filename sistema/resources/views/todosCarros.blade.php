
@extends('layouts.app')

@section('title', 'Carros')

@section('content')

<main class="processos-main">
    <div class="container">
        <div class="menuMain clientesMenu">
            <a href="/clientes/carros" class="Raleways Raleways1 menuMain-link" id="link1">Todos carros</a>
            <a href="/clientes/carros/novo" class="Raleways Raleways1 menuMain-link" id="link2">Novo carro</a>

            <span class="borda-link"></span>
        </div>
        <section id="TodosClientesSec">
            <div class="clientesFiltro-box carrosFiltro-box">
                <label class="clientesFiltro-label">Filtros</label>
                <form class="filtroClientes">
                    <input type="text" name="placa" placeholder="Pesquisar por placa" class="clientesFiltro-nome">
                    <input type="text" name="modelo" placeholder="Pesquisar por modelo" class="clientesFiltro-nome">
                    <button type="submit" class="btn-secondary">Ok</button>
                </form>
            </div>

            <div class="pedidos-content">

                <?php

                foreach ($itens as $key => $value):

                ?>

                <div class="clientes-box todosCarros-box">
                    <span class="clientesSpan nomeClienteSpan">
                        <p class="Sources Source1">Modelo</p>
                        <p class="Encodes Encode1"><?= $value['modelo']; ?></p>
                    </span>
                    <span class="clientesSpan dataClienteSpan">
                        <p class="Sources Source1">Nº do Chassis</p>
                        <p class="Encodes Encode1"><?= $value['chassis']; ?></p>
                    </span>
                    <span class="clientesSpan quantClienteSpan">
                        <p class="Sources Source1">Cor do carro</p>
                        <p class="Encodes Encode1"><?= $value['cor']; ?></p>
                    </span>
                    <span class="clientesSpan quantClienteSpan">
                        <p class="Sources Source1">Placa</p>
                        <p class="Encodes Encode1"><?= $value['placa']; ?></p>
                    </span>

                    <a href="/clientes/carros/editar" class="ancoraIcone2" ><i class="ion-edit"></i></a>
                    <i class="ion-more"></i>

                    <span class="more-box more-carros">
                        <i class="seta"></i>
                        <label class="moreLabel" id='moreExcluir'>Excluir</label>
                    </span>

                </div>

                <?php

                endforeach;

                ?>

            </div>
        </section>
    </div>
</main>

@stop


<style>
.ion-ios-person {
    color: #4DA1FF !important;
}
#item1 .active-menu {
    display: block !important;
}
#link1 {
    color: #4DA1FF;
    border-bottom: 3px solid rgb(77, 161, 255);
}
</style>