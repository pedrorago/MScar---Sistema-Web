@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<main class="cliente-main">
	<div class="container">
		<div class="menuMain clientesMenu">
			<a href="/clientes" class="Raleways Raleways1 menuMain-link" id="link1">Novos clientes</a>
			<a href="/clientes/todos" class="Raleways Raleways1 menuMain-link" id="link2">Todos Clientes</a>
			<span class="borda-link"></span>
		</div>
		<section id="newClientes">
			<form class="form-novosClientes dados-cliente formCliente">
				<span class="spanPessoas">
					<label>Tipo de pessoa *</label>
					<select name="pessoa" onchange="tipo_pessoa(this.value);">
						<option value="1">Física</option>
						<option value="2">Jurídica</option>
					</select>
				</span>
				<span class="spanCEP">
					<label>CEP *</label>
					<input type="text" name="cep" placeholder="00000-000" onkeyup="busca_cep(this.value)" data-mask="00000-000" class="required">
				</span>
				<span class="spanEndereco">
					<label>Endereço *</label>
					<input type="text" name="endereco" maxlength="500" class="required endereco js-maxlength" data-always-show="true">
				</span>
				<span class="spanTelefone">
					<label>Telefone *</label>
					<select name="telefone_ddd" class="required">
						<option value="">DDD</option>
						<?php
						$i = 11;
						while ($i <= 99) {
							echo '<option value="'.$i.'">'.$i.'</option>';
							$i++;
						}
						?>
					</select>
					<input type="text" name="telefone" placeholder="00000-0000" class="required input-telefone">
				</span>
				<span class="spanCliente">
					<label>Nome *</label>
					<input type="text" name="cliente" placeholder="Nome completo" class="required js-maxlength" maxlength="120" data-always-show="true">
				</span>
				<span class="spanNumero">
					<label>Número *</label>
					<input type="text" name="numero" class="required js-maxlength" maxlength="10" data-always-show="true">
				</span>
				<span class="spanComplemento">
					<label>Complemento (opcional)</label>
					<input type="text" name="complemento" class="js-maxlength" maxlength="150" data-always-show="true">
				</span>
				<span class="spanTelefone">
					<label>Celular *</label>
					<select name="celular_ddd">
						<option value="">DDD</option>
						<?php
						$i = 11;
						while ($i <= 99) {
							echo '<option value="'.$i.'">'.$i.'</option>';
							$i++;
						}
						?>
					</select>
					<input type="text" name="celular" placeholder="00000-0000" class="input-telefone">
				</span>
				<span class="spanAtividade">
					<label>Tipo de Atividade *</label>
					<select name="tipo_atividade" class="required">
						<option value="">Selecione...</option>
						<option value="fornecedor">Fornecedor</option>
					</select>
				</span>
				<span class="spanBairro">
					<label>Bairro *</label>
					<input type="text" name="bairro" class="required js-maxlength bairro" maxlength="150" data-always-show="true">
				</span>
				<span class="spanTelefone">
					<label>Comercial *</label>
					<select name="comercial_ddd">
						<option value="">DDD</option>
						<?php
						$i = 11;
						while ($i <= 99) {
							echo '<option value="'.$i.'">'.$i.'</option>';
							$i++;
						}
						?>
					</select>
					<input type="text" name="comercial" placeholder="00000-0000" class="input-telefone">
				</span>
				<span class="spanCPF">
					<label>CPF *</label>
					<input type="text" name="cpf" data-mask="000.000.000-00">
				</span>
				<span class="spanCNPJ" style="display: none;">
					<label>CNPJ *</label>
					<input type="text" name="cnpj" data-mask="000.000.000/0000-00">
				</span>
				<span class="spanCidade">
					<label>Cidade *</label>
					<input type="text" name="cidade" class="required cidade js-maxlength" maxlength="100" data-always-show="true"> 
				</span>
				<span class="spanUF">
					<label>UF</label>
					<select class="required uf" name="uf">
						<option value="">Selecione...</option>
					    <option value="AC">Acre</option>
					    <option value="AL">Alagoas</option>
					    <option value="AP">Amapá</option>
					    <option value="AM">Amazonas</option>
					    <option value="BA">Bahia</option>
					    <option value="CE">Ceará</option>
					    <option value="DF">Distrito Federal</option>
					    <option value="ES">Espírito Santo</option>
					    <option value="GO">Goiás</option>
					    <option value="MA">Maranhão</option>
					    <option value="MT">Mato Grosso</option>
					    <option value="MS">Mato Grosso do Sul</option>
					    <option value="MG">Minas Gerais</option>
					    <option value="PA">Pará</option>
					    <option value="PB">Paraíba</option>
					    <option value="PR">Paraná</option>
					    <option value="PE">Pernambuco</option>
					    <option value="PI">Piauí</option>
					    <option value="RJ">Rio de Janeiro</option>
					    <option value="RN">Rio Grande do Norte</option>
					    <option value="RS">Rio Grande do Sul</option>
					    <option value="RO">Rondônia</option>
					    <option value="RR">Rorâima</option>
					    <option value="SC">Santa Catarina</option>
					    <option value="SP">São Paulo</option>
					    <option value="SE">Sergipe</option>
					    <option value="TO">Tocantins</option>
					</select>
				</span>
				<span class="spanEmail">
					<label>Email *</label>
					<input type="email" name="email" placeholder="email@email.com" class="required js-maxlength" maxlength="150" data-always-show="true">
				</span>
				<span class="spanIdentidade">
					<label>Número de Identidade *</label>
					<input type="text" name="rg" class="required js-maxlength" maxlength="10" data-always-show="true">
				</span>
				<span class="spanData">
					<label>Data de Nascimento *</label>
					<select name="data_nascimento_dia" class="required">
						<option value="">DD</option>
						<?php
						$dia = 1;
						while($dia <= 31) 
						{
						?>
							<option value="<?= $dia; ?>"><?= $dia; ?></option>
						<?php  
							$dia++;
						} 
						?>
					</select>
					<select name="data_nascimento_mes" class="required">
						<option value="">MM</option>
						<?php
						$mes = 1;

						while($mes <= 12) 
						{
						?>
							<option value="<?= $mes; ?>"><?=$mes?></option>
						<?php  
							$mes++;
						} 
						?>
					</select>
					<select name="data_nascimento_ano" class="required">
						<option value="">AAAA</option>
						<?php
						$ano = 2018;

						while($ano >= 1920) 
						{
						?>
							<option value="<?=$ano; ?>"><?=$ano?></option>
							<?php  
							$ano--;
						} 
						?>
					</select>
				</span>
				<span class="spanConheceu">
					<label>Como o cliente conheceu? *</label>
					<input type="text" name="como_conheceu" placeholder="Digite aqui..." class="required js-maxlength" maxlength="1000" data-always-show="true">
				</span>
				<a class="btn-primary" href="javascript:void(0)" onclick="proximo('dados-cliente', 'dados-carros')">Próximo</a>
			</form>
			<form class="form-todosClientes dados-carros formCliente">
				<span class="spanModelo">
					<label>Modelo do Veículo *</label>
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
					<label>Km Atual *</label>
					<input type="text" name="km" class="required js-maxlength" maxlength="1000" data-always-show="true">
				</span>
				<span class="spanChassis">
					<label>Nº do Chassis *</label>
					<input type="text" name="chassis" class="required js-maxlength" maxlength="25" data-always-show="true">
				</span>
				<span class="spanChassis">
					<label>Placa *</label>
					<input type="text" name="placa" class="required js-maxlength" maxlength="8" data-always-show="true">
				</span>
				<span class="spanCor">
					<label>Cor do Carro *</label>
					<input type="text" name="cor" class="required js-maxlength" maxlength="100" data-always-show="true">
				</span>
				<span class="spanFabricacao">
					<label>Fabricação e Modelo *</label>
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
					<label>Combustível *</label>
					<select name="combustivel" class="required">
						<option value="">Selecionar...</option>
						<?php
						foreach ($combustivel as $key => $value) {
							echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
						}
						?>
					</select>
				</span>
				<a href="javascript:void(0)" class="btn-primary" onclick="salvar_cliente()">Salvar</a>
				<a href="javascript:void(0)" class="btn-secondary backFormTodos">Voltar</a>
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
	#link1 {
		color: #4DA1FF;
	border-bottom: 3px solid rgb(77, 161, 255);
	}
</style>