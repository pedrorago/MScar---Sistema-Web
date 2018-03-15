@extends('layouts.app')

@section('title', 'Pedidos')

@section('content')

<main class='processos-main'>
    <div class='container'>
        <div class='menuMain processosMenu'>
            <a href='/orcamentos/novo' class='Raleways Raleways1 menuMain-link' id='link1'>Nova ordem</a>
            <a href='/pedidos' class='Raleways Raleways1 menuMain-link' id='link2'>Pedidos</a>
            <a href='/orcamentos' class='Raleways Raleways1 menuMain-link' id='link3'>Orçamentos</a>
            <span class='borda-link'></span>
        </div>
        <section id='Pedidos'>
            <div class='pedidosFiltro-box'>
                <label>Filtros</label>
                <form class='filtroPedidos'>
                    <select value='Status' class='pedidosFiltro-status'>
                        <option>Status</option>
                    </select>
                    <select value='Clientes' class='pedidosFiltro-status'>
                        <option>Clientes</option>
                    </select>
                    <select value='Carro' class='pedidosFiltro-carro'>
                        <option>Carro</option>
                    </select>
                    <input type="text" name="numero" placeholder="Pesquisar por nº de pedido" class='pedidosFiltro-numero'>
                    <button type='submit' class='btn-secondary'>Ok</button>
                </form>
            </div>

            <div class='pedidos-content'>

                <?php

                foreach ($itens as $key => $value):

                ?>

                <div class='pedidos-box'>
                    <span class='pedidosSpan'>
                        <p class='Sources Source1'>Nº do pedido</p>
                        <p class='Encodes Encode1'><?= $value['numero']; ?></p>
                    </span>
                    <span class='pedidosSpan'>
                        <p class='Sources Source1'>Cliente</p>
                        <p class='Encodes Encode1 nomeClienteP'><?= $value['cliente']; ?></p>
                    </span>
                    <span class='pedidosSpan'>
                        <p class='Sources Source1'>Carro</p>
                        <p class='Encodes Encode1'><?= $value['modelo']; ?> | <?= $value['placa']; ?></p>
                    </span>
                    <span class='pedidosSpan'>
                        <p class='Sources Source1'>Previsão de entrega</p>
                        <p class='Encodes Encode1'><?= $value['previsao']; ?></p>
                    </span>
                    <div class='pedidos-status emAndamento' id='pedidos-status'>
                        <p class='Sources Source1' id='status-atual'>Em andamento</p>
                        <i class="ion-android-arrow-dropdown icone-dropdown1"></i>

                        <span class='status-todos emAndamento' id='status-todos'>
                            <i class="ion-android-arrow-dropdown icone-dropdown2"></i>
                            <p class='Sources Source1 emAndamentoHover' id='status-feito'>Feito</p>
                            <p class='Sources Source1 emAndamentoHover' id='status-andamento'>Em andamento</p>
                            <p class='Sources Source1 emAndamentoHover' id='status-atrasado'>Atrasado</p>
                        </span>
                    </div>
                    <i class="ion-more"></i>

                    <span class='more-box more-pedidos'>
                        <i class='seta'></i>
                        <label class='moreLabel' id='gerarOrcamento'>Gerar orçamento</label>
                    </span>

                </div>

                <?php

                endforeach;

                if (empty($itens)) {

                    if (isset($_GET['numero'])) {
                        echo '<span class="empty" style="margin-bottom: 2em;display: block;">Não foram encontrados pedidos com o número" '.$_GET['numero'].' ".</span>';
                    } else {
                        echo '<span class="empty" style="margin-bottom: 2em;display: block;">Não existem pedidos em andamento.</span>';
                    }

                }

                ?>

            </div>
        </section>
    </div>
</main>

@stop


<style>
.ion-ios-calculator {
    color: #4DA1FF !important;
}
#item2 .active-menu {
    display: block !important;
}
#link2 {
    color: #4DA1FF;
    border-bottom: 3px solid rgb(77, 161, 255);
}
</style>