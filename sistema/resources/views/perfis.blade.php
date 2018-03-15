
@extends('layouts.app')

@section('title', 'Perfis')

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
        <div class="produtosfiltro-box ">
            <label>Filtros</label>
            <form class="filtroUsuario" method="get" action="perfis/busca">
                <select value="tipo" name="tipo" class="filtroUsuario-tipo">
                    <option value="">Tipo de acesso</option>
                    <option value="2" <?= ($_GET['tipo'] == 2) ? 'selected' : '' ;?>>Assistente administrativo</option>
                    <option value="3" <?= ($_GET['tipo'] == 3) ? 'selected' : '' ;?>>Estoquista</option>
                    <option value="4" <?= ($_GET['tipo'] == 4) ? 'selected' : '' ;?>>Mecânico</option>
                </select>
                <input type="text" name="nome" placeholder="Pesquisar por nome de usuário" class="filtroUsuario-nome" value="<?= $_GET['nome']; ?>">
                <button type="submit" class="btn-secondary btn-filtro">Ok</button>
            </form>
        </div>
        <section id="Perfis">

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

            <form class="forms perfisForm" method="post" onsubmit="required();return false;">

                <h3 class="Encodes Encode3">Novo usuário</h3>

                <span>
                    <label for="Nome">Nome *</label>
                    <input type="text" name="nome" maxlength="100" class="js-maxlength required" data-always-show="true">
                </span>

                <span>
                    <label for="tipo">Tipo de acesso *</label>
                    <select id="tipo" name="tipo" class="required">
                        <option value="2">Assistente administrativo</option>
                        <option value="3">Estoquista</option>
                        <option value="4">Mecânico</option>
                    </select>
                </span>

                <span>
                    <label for="Telefone">Telefone *</label>
                    <input type="text" name="telefone" class="input-telefone required">
                </span>

                <span>
                    <label for="Email">Email *</label>
                    <input type="email" name="email" maxlength="100" class="js-maxlength required" data-always-show="true">
                </span>

                <span class="notmargin">
                    <label for="Email">Senha *</label>
                    <input type="password" name="senha" maxlength="50" class="js-maxlength required" data-always-show="true">
                </span>

                <button type="submit" class="btn-primary">Salvar</button>

            </form>

            <div class="servicos-container perfis-container">

                <?php

                foreach ($itens as $key => $value):

                ?>

                    <div class="servico-box">
                        <span class="servicoSpan">
                            <p class="Sources Source1">Nº do Usuário</p>
                            <p class="Encodes Encode1"><?= $value['numero']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Nome</p>
                            <p class="Encodes Encode1 nomeClienteP"><?= $value['nome']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Telefone</p>
                            <p class="Encodes Encode1"><?= $value['telefone']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Tipo de acesso</p>
                            <p class="Encodes Encode1"><?= $value['tipo_acesso']; ?></p>
                        </span>
                        <span class="servicoSpan">
                            <p class="Sources Source1">Email</p>
                            <p class="Encodes Encode1"><?= $value['email']; ?></p>
                        </span>
                    </div>

                <?php

                endforeach;

                if (empty($itens)) {

                    if (isset($_GET['nome'])) {
                        echo '<span class="empty">Não foram encontrados usuários com o nome " '.$_GET['nome'].' ".</span>';
                    } else {
                        echo '<span class="empty">Não existem usuários cadastrados.</span>';
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
#link3 {
    color: #4DA1FF;
    border-bottom: 3px solid rgb(77, 161, 255);
}
</style>