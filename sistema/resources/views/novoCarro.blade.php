@extends('layouts.app')

@section('title', 'Novo Carro')

@section('content')
<main class="cliente-main">
    <div class="container">
        <div class="menuMain clientesMenu">
            <a href="/clientes/carros" class="Raleways Raleways1 menuMain-link" id="link1">Todos carro</a>
            <a href="/clientes/carros/novo" class="Raleways Raleways1 menuMain-link" id="link2">Novo carro</a>
            <span class="borda-link"></span>
        </div>
        <section id="newClientes">
            <form class="form-todosClientes dados-carros formCliente" id='form-editarCarros'>
                <span class="spanModelo">
                    <label>Modelo do Veículo</label>
                    <select name="modelo" class="required">
                        <option value="">Selecionar...</option>
                        <?php
                        foreach ($modelos as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
                        }
                        ?>
                    </select>
                </span>
                <span class="spanKm">
                    <label>Km Atual</label>
                    <input type="text" name="km" class="required js-maxlength" maxlength="1000" data-always-show="true">
                </span>
                <span class="spanChassis">
                    <label>Nº do Chassis</label>
                    <input type="text" name="chassis" class="required js-maxlength" maxlength="25" data-always-show="true">
                </span>
                <span class="spanCor">
                    <label>Cor do Carro</label>
                    <input type="text" name="cor" class="required js-maxlength" maxlength="100" data-always-show="true">
                </span>
                <span class="spanFabricacao">
                    <label>Fabricação e Modelo</label>
                    <select name="ano_fabricacao" class="required">
                        <option value="">AAAA</option>
                        <?php
                        $ano_fab = 2018;

                        while($ano_fab >= 1920) 
                        {
                        ?>
                            <option value="<?=$ano_fab; ?>"><?=$ano_fab; ?></option>
                            <?php  
                            $ano_fab--;
                        } 
                        ?>
                    </select>
                    <select name="ano_modelo" class="required">
                        <option value="">AAAA</option>
                        <?php
                        $ano_mod = 2018;

                        while($ano_mod >= 1920) 
                        {
                        ?>
                            <option value="<?=$ano_mod; ?>"><?=$ano_mod; ?></option>
                            <?php  
                            $ano_mod--;
                        } 
                        ?>
                    </select>
                </span>
                <span class="spanCombustivel">
                    <label>Combustível</label>
                    <select name="combustivel" class="required">
                        <option value="">Selecionar...</option>
                        <?php
                        foreach ($combustivel as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
                        }
                        ?>
                    </select>
                </span>
                <span class="spanCombustivel">
                    <label>Placa</label>
                    <input type="text" name="placa" class="required js-maxlength" maxlength="8" data-always-show="true">
                </span>
                <a href="javascript:void(0)" class="btn-primary" onclick="salvar_cliente()">Salvar</a>
                <a href="/clientes/carros" class="btn-secondary">Voltar</a>
            </form>
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