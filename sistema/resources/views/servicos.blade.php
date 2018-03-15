@extends('layouts.app')

@section('title', 'Serviços')

@section('content')

<main class="servicos-main">
    <div class="container">
        <div class="menuMain servicosMenu">
            <a href="/servicos" class="Raleways Raleways1 menuMain-link" id="link2">Serviços</a>
            <a href="/produtos" class="Raleways Raleways1 menuMain-link" id="link1">Produtos</a>
            <a href="/perfis" class="Raleways Raleways1 menuMain-link" id="link3">Perfis de acesso</a>
            <a href="/relatorios" class="Raleways Raleways1 menuMain-link" id="link4">Relatórios</a>
            <span class="borda-link"></span>
        </div>
        <div class="produtosfiltro-box">
            <label>Filtros</label>
            <form class="filtroservico" method="get" action="servicos/busca">
                <input type="text" name="nome" placeholder="Nome" class="servicoFiltro-numero" value="<?= $_GET['nome']; ?>">
                <select name="tipo" class="servicoFiltro-numero">
                    <option value="">Tipo de serviço</option>
                    <?php
                    foreach ($tipos as $key => $value) {

                        $selected = '';

                        if(isset($_GET['tipo'])){
                            if ($_GET['tipo'] == $value['id']) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                        }

                        echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['nome'].'</option>';
                    }
                    ?>
                </select>
                <button type="submit" class="btn-secondary">Ok</button>
            </form>
        </div>
        <section id="Servicos">

            <?php
            if (Session::has('retorno')){

                $retorno = Session('retorno');

                if ($retorno == 200) {
                    echo '<div class="alert alert-success" onclick="destroy()">Cadastrado com sucesso.</div>';
                } else if($retorno == 501){
                    echo '<div class="alert alert-warning" onclick="destroy()">Preencha todos os campos.</div>';
                } else if($retorno == 500){
                    echo '<div class="alert alert-danger" onclick="destroy()">Não foi possível completar a solicitação.</div>';
                }

            }
            ?>

            <form class="forms servicosForm" method="post" onsubmit="required();return false;">
                
                <h3 class="Encodes Encode3">Novo Serviço</h3>

                <span class="servicos-descricaoSpan">
                   <label for="npme">Nome do serviço *</label>
                   <input type="text" name="nome" id="nome" maxlength="100" class="js-maxlength required" data-always-show="true">
                </span>

                <span class="servicos-tipoSpan">
                   <label for="tipo">Tipo de serviço *</label>
                   <select id="tipo" value="tipo" name="tipo" class="required">
                       <option value="">Selecione...</option>
                       <?php
                        foreach ($tipos as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
                        }
                        ?>
                   </select>
                </span>

                <span class="servicos-montadoraSpan notmargin">
                    <label for="modelo">Modelo do veículo</label>
                    <select name="modelo">
                        <option value="">Todos os carros...</option>
                        <?php
                        foreach ($modelos as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
                        }
                        ?>
                    </select>
                </span>

                <span class="servicos-estimativaSpan">
                    <label>Estimativa de tempo *</label>
                    <span>
                        <input type="number" name="hora" placeholder="hh" class="required">
                        <input type="number" name="minuto" placeholder="mm" class="required">
                    </span>
                </span>

                <span class="servicos-precoSpan">
                    <label for="preco">Preço (R$) *</label>
                    <input type="text" name="preco" id="preco" data-mask="#.##0,00" data-mask-reverse="true" class="required">
                </span>


                <span class="servicos-garantiaSpan notmargin">
                    <label for="garantia">Garantia *</label>
                    <input type="text" name="garantia" id="garantia" maxlength="50" class="js-maxlength required" data-always-show="true">
                </span>


                <span class="servicos-manutencaoSpan">
                    <label for="manutencao">Proxima manutenção *</label>
                    <input type="date" name="manutencao" class="required">
                </span>

                <button type="submit" class="btn-primary">Salvar</button>

            </form>

            <div class="servicos-container">

                <?php

                foreach ($itens as $key => $value):

                ?>

                    <div class="servico-box">
                        <span class="servicoSpan">
                            <p class="Sources Source1">Nº do serviço</p>
                            <p class="Encodes Encode1"><?= $value['numero']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Nome</p>
                            <p class="Encodes Encode1 nomeClienteP"><?= $value['nome']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Preço (R$)</p>
                            <p class="Encodes Encode1"><?= $value['preco']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Estimativa de tempo</p>
                            <p class="Encodes Encode1"><?= $value['estimativa_hora']."h ".$value['estimativa_minuto'].'m'; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Tipo de serviço</p>
                            <p class="Encodes Encode1"><?= $value['categoria']; ?></p>
                        </span>
                    </div>

                <?php

                endforeach;

                if (empty($itens)) {

                    if (isset($_GET['nome'])) {
                        echo '<span class="empty">Não foram encontrados serviços com o nome " '.$_GET['nome'].' ".</span>';
                    } else {
                        echo '<span class="empty">Não existem serviços cadastrados.</span>';
                    }
                    
                }

                ?>
            </div>

        </section>
    </div>
</main>

@stop


<style>
.ion-wrench {
    color: #4DA1FF !important;
}
#item4 .active-menu {
    display: block !important;
}
#link2 {
    color: #4DA1FF;
    border-bottom: 3px solid rgb(77, 161, 255);
}
</style>