
@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

<main class="processos-main">
    <div class="container">
        <div class="menuMain clientesMenu">
            <a href="/clientes" class="Raleways Raleways1 menuMain-link" id="link1">Novos clientes</a>
            <a href="/clientes/todos" class="Raleways Raleways1 menuMain-link" id="link2">Todos clientes</a>
            <span class="borda-link"></span>
        </div>
        <section id="TodosClientesSec">
            <div class="clientesFiltro-box">
                <label class="clientesFiltro-label">Filtros</label>
                <form class="filtroClientes" method="get" action="/clientes/busca">
                    <input type="date" name="cadastro" class="clientesFiltro-mesAno" value="<?= $_GET['cadastro']; ?>">
                    <input type="text" name="nome" placeholder="Pesquisar por nome" class="clientesFiltro-nome" value="<?= $_GET['nome']; ?>">
                    <button type="submit" class="btn-secondary">Ok</button>
                </form>
            </div>

            <div class="pedidos-content">

                <?php

                foreach ($itens as $key => $value):

                ?>
                <div class="clientes-box todosClientes-box">
                    <span class="clientesSpan nomeClienteSpan">
                        <p class="Sources Source1">Cliente</p>
                        <a href="clientes/detalhes?cliente=<?= $value['id']; ?>">
                            <p class="Encodes Encode1 nomeClienteP"><?= $value['nome']; ?></p>
                        </a>
                    </span>
                    <span class="clientesSpan dataClienteSpan">
                        <p class="Sources Source1">Data de cadastro</p>
                        <p class="Encodes Encode1"><?= $value['data']; ?></p>
                    </span>
                    <span class="clientesSpan quantClienteSpan">
                        <p class="Sources Source1">Quant. de carros cadastrados</p>
                        <p class="Encodes Encode1"><?= sprintf('%02d', $value['carros']); ?> carro(s)</p>
                    </span>

                    <a href="/clientes/carros?cliente=<?= $value['id']; ?>" class="ancoraIcone">
                        <i class="ion-android-car"></i>
                    </a>

                    <a href="/clientes/editar?cliente=<?= $value['id']; ?>" class="ancoraIcone">
                        <i class="ion-edit"></i>
                    </a>

                    <i class="ion-more"></i>

                    <span class="more-box more-clientes">
                        <i class="seta"></i>
                        <label class="moreLabel" id="moreExcluir">Excluir</label>
                    </span>

                </div>

                <?php

                endforeach;


                if (empty($itens)) {

                    if (isset($_GET['nome'])) {
                        echo '<span class="empty" style="margin-bottom: 2em;display: block;">Não foram encontrados clientes com o nome " '.$_GET['nome'].' ".</span>';
                    } else {
                        echo '<span class="empty" style="margin-bottom: 2em;display: block;">Não existem clientes cadastrados.</span>';
                    }

                }

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
#link2 {
    color: #4DA1FF;
    border-bottom: 3px solid rgb(77, 161, 255);
}
</style>