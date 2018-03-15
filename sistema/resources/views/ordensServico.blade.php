@extends('layouts.app')

@section('title', 'Ordens de serviços')

@section('content')

<main class="servico-main">
    <div class="container">
        <div class="menuMain servicoMenu">
            <a href="/ordens" class="Raleways Raleways1 menuMain-link" id="link1">Ordens de serviço</a>
            <a href="/ordens/estoque" class="Raleways Raleways1 menuMain-link" id="link2">Estoque por serviço</a>
            <span class="borda-link"></span>
        </div>
        <section id="ServicoOrdens">
            <div class="servicoFiltro-box">
                <label>Filtros</label>
                <form class="filtroServico" method="get" action="ordens/busca">
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

                <span class="servicoSpanDrop servicoAguardando">
                    <i class="ion-android-arrow-dropup"></i>
                    <p class="Raleways Raleway2">Aguardando conclusão de estoque</p>    
                </span>

                <?php

                $estoque = $itens['estoque'];

                foreach ($estoque as $key => $value):

                ?>

                <div class="servicobox servicoAguardando-box">
                    <div class="servico-box">
                        <span class="servicoSpan">
                            <p class="Sources Source1">Nº do pedido</p>
                            <p class="Encodes Encode1"><?= $value['numero']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Cliente</p>
                            <p class="Encodes Encode1 nomeClienteP"><?= $value['cliente']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Carro</p>
                            <p class="Encodes Encode1"><?= $value['modelo']; ?> | <?= $value['placa']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Previsão de entrega</p>
                            <p class="Encodes Encode1"><?= $value['previsao']; ?></p>
                        </span>
                        <div class="servico-status emAndamento">
                            <p class="Sources Source1" id="status-atual">Em compra</p>
                            <i class="ion-android-arrow-dropdown icone-dropdown1"></i>

                            <span class="status-todos emCompra">
                                <i class="ion-android-arrow-dropdown icone-dropdown2"></i>
                                <p class="Sources Source1 emCompraHover" id="status-compra">Em compra</p>
                                <p class="Sources Source1 emCompraHover" id="status-atrasado">Atrasado</p>
                            </span>
                        </div>
                        <i class="ion-more"></i>
                        <span class="more-box more-ordens">
                            <i class="seta"></i>
                            <label class="moreLabel" id="visualizarProcesso">Visualizar</label>
                        </span>
                    </div>
                </div>

                <?php

                endforeach;

                if (empty($estoque)) {

                    if (isset($_GET['numero'])) {
                        echo '<span class="empty" style="margin-bottom: 2em;display: block;">Não foram encontrados serviços em fase de estoque com o número " '.$_GET['numero'].' ".</span>';
                    } else {
                        echo '<span class="empty" style="margin-bottom: 2em;display: block;">Não existem serviços cadastrados.</span>';
                    }

                }

                ?>

                <span class="servicoSpanDrop servicoProcessamento">
                    <i class="ion-android-arrow-dropup"></i>
                    <p class="Raleways Raleway2">Serviços em processamento</p>    
                </span>

                <?php

                $processamento = $itens['processamento'];

                foreach ($processamento as $key => $value):

                ?>

                <div class="servicobox servicoProcessamento-box">
                    <div class="servico-box">
                        <span class="servicoSpan">
                            <p class="Sources Source1">Nº do pedido</p>
                            <p class="Encodes Encode1"><?= $value['numero']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Cliente</p>
                            <p class="Encodes Encode1"><?= $value['cliente']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Carro</p>
                            <p class="Encodes Encode1"><?= $value['modelo']; ?> | <?= $value['placa']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Previsão de entrega</p>
                            <p class="Encodes Encode1"><?= $value['previsao']; ?></p>
                        </span>

                        <?php

                        if ($value['status'] == 2) {
                            $status_pro = "atrasado";
                        } else if($value['status'] == 1){
                            $status_pro = "emAndamento";
                        } else {
                            $status_pro = "aguardo";
                        }

                        ?>

                        <div class="servico-status status-processamento <?= $status_pro; ?>">
                            <p class="Sources Source1 status-processamento-atual" id="status-atual">
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
                                <p class="Sources Source1 emAndamentoHover" id="status-concluido">Concluido</p>
                                <p class="Sources Source1 emAndamentoHover" id="status-andamento">Em andamento</p>
                                <p class="Sources Source1 emAndamentoHover" id="status-atrasado">Atrasado</p>
                                <p class="Sources Source1 emAndamentoHover" id="status-aguardo">Em aguardo</p>
                            </span>
                        </div>
                        <!--<i class="ion-more"></i>
                        <span class="more-box more-ordens">
                            <i class="seta"></i>
                            <label class="moreLabel" id="visualizarProcesso">Visualizar</label>
                        </span>-->

                        <form class="conclusao-box" method="post" onsubmit="required();return false;" action="ordens/concluir_ordem">
                            <span class="conclusao-header">
                                <p class="Raleways Raleway1">Enviar comunicado</p>
                                <i class="ion-android-close closeConclusao"></i>
                            </span>
                            <span class="conclusao-container">
                                <textarea placeholder="Digite um texto informando ao cliente que o serviço está pronto…" name="texto" maxlength="500" class="js-maxlength required" data-always-show="true"></textarea>
                                <input type="hidden" name="cliente_id" value="<?= $value['cliente_id']; ?>">
                                <input type="hidden" name="ordem_id" value="<?= $value['id']; ?>">
                                <p class="Sources Source2">Próxima revisão</p>
                                <input type="date" name="data" placeholder="00/00/0000" class="required">
                                <i class="ion-calendar"></i>
                                <button class="btn-secondary">Enviar</button>
                            </span>
                        </form >
                    </div>
                </div>

                <?php

                endforeach;

                if (empty($processamento)) {

                    if (isset($_GET['numero'])) {
                        echo '<span class="empty" style="margin-bottom: 2em;display: block;">Não foram encontrados serviços em processamento com o número " '.$_GET['numero'].' ".</span>';
                    } else {
                        echo '<span class="empty" style="margin-bottom: 2em;display: block;">Não existem serviços cadastrados.</span>';
                    }

                }
                   

                ?>

                <span class="servicoSpanDrop servicoEntregues">
                    <i class="ion-android-arrow-dropup"></i>
                    <p class="Raleways Raleway2">Serviços entregues</p>    
                </span>

                <?php

                $entregue = $itens['entregue'];

                foreach ($entregue as $key => $value):

                ?>

                <div class="servicobox servicoEntregues-box">
                    <div class="servico-box">
                        <span class="servicoSpan">
                            <p class="Sources Source1">Nº do pedido</p>
                            <p class="Encodes Encode1"><?= $value['numero']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Cliente</p>
                            <p class="Encodes Encode1"><?= $value['cliente']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Carro</p>
                            <p class="Encodes Encode1"><?= $value['modelo']; ?> | <?= $value['placa']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Previsão de entrega</p>
                            <p class="Encodes Encode1"><?= $value['previsao']; ?></p>
                        </span>
                        <div class="servico-status status-entregue <?= ($value['status'] == 3) ? 'aguardo' : 'entregue'; ?>" >
                            <p class="Sources Source1 status-entregue-atual" id="status-atual">
                                <?php

                                if ($value['status'] == 3) {
                                    echo "Em aguardo";
                                } else {
                                    echo "Entregue";
                                }

                                ?>
                            </p>
                            <input type="hidden" value="" data-id="<?= $value['id']; ?>">
                            <i class="ion-android-arrow-dropdown icone-dropdown1"></i>
                            <span class="status-todos aguardo" for="status-servicos-entregue">
                                <i class="ion-android-arrow-dropdown icone-dropdown2"></i>
                                <p class="Sources Source1 aguardoHover" id="status-aguardo">Em aguardo</p>
                                <p class="Sources Source1 aguardoHover" id="status-entregue">Entregue</p>
                            </span>
                        </div>
                        <!--<i class="ion-more"></i>
                        <span class="more-box more-ordens">
                            <i class="seta"></i>
                            <label class="moreLabel" id="visualizarProcesso">Visualizar</label>
                        </span>-->
                    </div>
                </div>

                <?php

                endforeach;

                if (empty($entregue)) {

                    if (isset($_GET['numero'])) {
                        echo '<span class="empty" style="margin-bottom: 2em;display: block;">Não foram encontrados serviços entregues com o número " '.$_GET['numero'].' ".</span>';
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
#link1 {
    color: #4DA1FF;
    border-bottom: 3px solid rgb(77, 161, 255);
}
</style>