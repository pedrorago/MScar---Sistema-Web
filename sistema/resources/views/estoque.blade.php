@extends('layouts.app')

@section('title', 'Estoque por serviço')

@section('content')

<main class="processos-main">
    <div class="container">
       <div class="menuMain servicoMenu">
        <a href="/ordens" class="Raleways Raleways1 menuMain-link" id='link1'>Ordens de serviço</a>
        <a href="/ordens/estoque" class="Raleways Raleways1 menuMain-link" id='link2'>Estoque por serviço</a>
        <span class="borda-link"></span>
    </div>
    <section id="ServicoOrdens">
        <div class="servicoFiltro-box">
            <label>Filtros</label>
            <form class="filtroServico" action="/ordens/estoque/busca" method="get">
                <select name="cliente" class="servicoFiltro-status">
                    <option value="">Clientes</option>
                    <?php
                    foreach ($clientes as $key => $value) {

                        if ($value['id'] == $_GET['cliente']) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }

                        echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['nome'].'</option>';
                    }
                    ?>
                </select>
                <select name="carro" class="servicoFiltro-carro">
                    <option value="">Carro</option>
                    <?php
                    foreach ($carros as $key => $value) {

                        if ($value['id'] == $_GET['carro']) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }

                        echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['nome'].'</option>';
                    }
                    ?>
                </select>
                <input type="text" name="numero" placeholder="Pesquisar por nº de pedido" class="servicoFiltro-numero" value="<?= $_GET['numero']; ?>">
                <button type="submit" class="btn-secondary">Ok</button>
            </form>
        </div>


        <div class="pedidos-content">

            <?php

                foreach ($itens as $key => $value):

            ?>

            <div class="pedidos-box">
                <span class="pedidosSpan">
                    <p class="Sources Source1">Nº do pedido</p>
                    <p class="Encodes Encode1"><?= $value['numero']; ?></p>
                </span>
                <span class="pedidosSpan">
                    <p class="Sources Source1">Cliente</p>
                    <p class="Encodes Encode1 nomeClienteP"><?= $value['cliente']; ?></p>
                </span>
                <span class="pedidosSpan">
                    <p class="Sources Source1">Carro</p>
                    <p class="Encodes Encode1"><?= $value['modelo']; ?> | <?= $value['placa']; ?></p>
                </span>
                <span class="pedidosSpan">
                    <p class="Sources Source1">Previsão de entrega</p>
                    <p class="Encodes Encode1"><?= $value['previsao']; ?></p>
                </span>

                <?php

                if ($value['status'] == 2) {
                    $status = "atrasado";
                } else if($value['status'] == 1){
                    $status = "emAndamento";
                } else {
                    $status = "aguardo";
                }

                ?>

                <div class="servico-status status-estoque <?= $status; ?>">
                    <p class="Sources Source1 status-estoque-atual" id="status-atual">
                        <?php

                            if ($value['status'] == 2) {
                                echo "Atrasado";
                            } else if($value['status'] == 1){
                                echo "Em andamento";
                            } else {
                                echo "Em aguardo";
                            }

                        ?>
                    </p>
                    <i class="ion-android-arrow-dropdown icone-dropdown1"></i>

                    <input type="hidden" value="" data-id="<?= $value['id']; ?>">

                    <span class="status-todos emAndamento">
                        <i class="ion-android-arrow-dropdown icone-dropdown2"></i>
                        <p class="Sources Source1 emAndamentoHover" id="status-feito">Feito</p>
                        <p class="Sources Source1 emAndamentoHover" id="status-andamento">Em andamento</p>
                        <p class="Sources Source1 emAndamentoHover" id="status-atrasado">Atrasado</p>
                    </span>
                </div>
                
                <i class="ion-more"></i>

                <span class="more-box more-estoue">
                    <i class="seta"></i>
                    <label class="moreLabel" id="visualizarChecklist" onclick="visualizarChecklist(<?= $value['id']; ?>)">Visualizar checklist</label>
                </span>

            </div>

            <?php

                endforeach;

                if (empty($itens)) {

                    if (isset($_GET['numero'])) {
                        echo '<span class="empty" style="margin-bottom: 2em;display: block;">Não foram encontrados serviços em fase de estoque com o número " '.$_GET['numero'].' ".</span>';
                    } else {
                        echo '<span class="empty" style="margin-bottom: 2em;display: block;">Não existem serviços cadastrados.</span>';
                    }

                }

            ?>

        </div>
    </section>
</div>
</main>

@stop


<style>
.ion-social-buffer {
    color: #4DA1FF !important;
}
#item3 .active-menu {
    display: block !important;
}
#link2 {
    color: #4DA1FF;
    border-bottom: 3px solid rgb(77, 161, 255);
}
</style>