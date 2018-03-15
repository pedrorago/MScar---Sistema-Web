@extends('layouts.app')

@section('title', 'Produtos')

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
            <form class="filtroProdutos" action="produtos/busca" method="GET">
                <input type="text" name="nome" placeholder="Nome" class="servicoFiltro-numero" value="<?= $_GET['nome']; ?>">
                <input type="text" name="fabricante" placeholder="Fabricante" class="servicoFiltro-numero" value="<?= $_GET['fabricante']; ?>">
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

            <form class="forms produtosForm" method="post" onsubmit="required();return false;">
               <h3 class="Encodes Encode3">Novo Produto</h3>

                <span>
                    <label for="nome">Nome *</label>
                    <input type="text" name="nome" id="nome" maxlength="100" class="js-maxlength required" data-always-show="true">
                </span>

                <span>
                    <label for="fabricante">Fabricante *</label>
                    <input type="text" name="fabricante" id="fabricante" maxlength="100" class="js-maxlength required" data-always-show="true">
                </span>

                <span>
                    <label for="descricao">Descrição *</label>
                    <input type="text" name="descricao" id="descricao" maxlength="500" class="js-maxlength required" data-always-show="true">
                </span>

                <span>
                    <label for="preco">Preço de venda *</label>
                    <input type="text" name="preco" id="preco" class="required" data-mask="#.##0,00" data-mask-reverse="true">
                </span>

                <span class="notmargin">
                    <label for="preco">Vincular ao serviço de</label>
                    <select name="servico" class="required">
                        <option value="">Selecionar...</option>
                        <?php
                        foreach ($servicos as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
                        }
                        ?>
                    </select>
                </span>

                <button type="submit" class="btn-primary">Salvar</button>

            </form>
            <div class="servicos-container produtos-container">

                <?php

                foreach ($itens as $key => $value):

                ?>

                    <div class="servico-box">
                        <span class="servicoSpan">
                            <p class="Sources Source1">Nº do produto</p>
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
                            <p class="Sources Source1">Fabricante</p>
                            <p class="Encodes Encode1"><?= $value['fabricante']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Serviço</p>
                            <p class="Encodes Encode1"><?= $value['servico']; ?></p>
                        </span>
                    </div>

                <?php

                endforeach;

                if (empty($itens)) {

                    if (isset($_GET['nome'])) {
                        echo '<span class="empty">Não foram encontrados produtos com o nome " '.$_GET['nome'].' ".</span>';
                    } else {
                        echo '<span class="empty">Não existem produtos cadastrados.</span>';
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
#link1 {
    color: #4DA1FF;
    border-bottom: 3px solid rgb(77, 161, 255);
}
</style>