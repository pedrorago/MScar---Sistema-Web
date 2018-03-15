
@extends('layouts.app')

@section('title', 'Relatórios')

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
		<section id='Relatorios'>
			<div class='forms relatoriosForm'>
				<ul class='relatorios-etapas'>
					<li class='Encodes Encode1' id='relatorios1'>Processamentos</li>
					<li class='Encodes Encode1' id='relatorios2'>Orçamentos</li>
					<li class='Encodes Encode1' id='relatorios3'>Clientes</li>
				</ul>

				<main>

					<div class='relatorios-container processamentos-container'>
						<form class='relatorios-filtro processamentos-filtro'>
							<label>Filtro</label>

							<select name='funcionarios'>
								<option value='funcionarios'>Funcionários</option>
								<?php
								foreach ($usuarios as $key => $value) {
									echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
								}
								?>
							</select>

							<select name='mesInicial'>
								<option value='mesInicial'>Mês (Inicial)</option>
							</select>

							<select name='mesFinal'>
								<option value='mesFinal'>Mês (Final)</option>
							</select>

							<select name='tipo'>
								<option value='tipo'>Tipo de serviço</option>
								<?php
								foreach ($tipo_servicos as $key => $value) {
									echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
								}
								?>
							</select>
							<button class='btn-secondary'>OK</button>
						</form>

						<div class='relatorios-box processamentos-box veiculos-atendidos box-graficos-relatorios'>

							<canvas id="myChart" width="400" height="300"></canvas>

						</div>

						<div class='relatorios-box  processamentos-box horas-trabalhadas box-graficos-relatorios'>
							<canvas id="chartLine" width="400" height="300"></canvas>
						</div>

						<div class='relatorios-box processamentos-box tempo-estimado box-graficos-relatorios'>
							<canvas id="bar-chart-grouped" width="400" height="300"></canvas>
						</div>

						<div class='relatorios-box processamentos-box atendimento-garantia box-graficos-relatorios'>
							<canvas id="pie-chart" width="400" height="300"></canvas>
						</div>

						<!--<div class='relatorios-box processamentos-box atendimento-venda'>
							<h2 class='Encodes Encode4'>30</h2>
							<p class='Encodes Encode1'>Atendimento por venda</p>
						</div>

						<div class='relatorios-box processamentos-box checklists-feitos notmargin'>
							<h2 class='Encodes Encode4'>51</h2>
							<p class='Encodes Encode1'>Checklists feitos</p>
						</div>-->

					</div>

					<div class='relatorios-container orcamento-container'>
						<form class='relatorios-filtro orcamento-filtro'>
							<label>Filtro</label>

							<select name='funcionarios'>
								<option value='funcionarios'>Funcionários</option>
							</select>

							<select name='mesInicial'>
								<option value='mesInicial'>Mês (Inicial)</option>
							</select>

							<select name='mesFinal'>
								<option value='mesFinal'>Mês (Final)</option>
							</select>

							<select name='tipo'>
								<option value='tipo'>Tipo de serviço</option>
							</select>
							<button class='btn-secondary'>OK</button>
						</form>

						<div class='relatoriosOrcamento-boxlef '>
							<div class='relatorios-box orcamento-box veiculos-atendidos'>
								<h2 class='Encodes Encode4'>60</h2>
								<p class='Encodes Encode1'>Orçamentos feitos</p>
							</div>
							<div class='relatorios-box  orcamento-box horas-trabalhadas'>
								<h2 class='Encodes Encode4'>40</h2>
								<p class='Encodes Encode1'>Orçamentos aprovados</p>
							</div>
						</div>
						<div class='relatoriosOrcamento-boxright '>
							<div class='ranking-box'>
								<span class='ranking-header'>
									<h4 class='Encodes Encode6'>Ranking de serviços</h4>
								</span>
								<div class='ranking-container'>
									<p class='Encodes Encode1'>1. Nome do serviço</p>
									<p class='Encodes Encode1'>2. Nome do serviço</p>
									<p class='Encodes Encode1'>3. Nome do serviço</p>
									<p class='Encodes Encode1'>4.Nome do serviço</p>
									<p class='Encodes Encode1'>5.Nome do serviço</p>
									<p class='Encodes Encode1'>6.Nome do serviço</p>
									<p class='Encodes Encode1'>7.Nome do serviço</p>
									<p class='Encodes Encode1'>8.Nome do serviço</p>
									<p class='Encodes Encode1'>10.Nome do serviço</p>
									<p class='Encodes Encode1'>11.Nome do serviço</p>
									<p class='Encodes Encode1'>12.Nome do serviço</p>
									<p class='Encodes Encode1'>13.Nome do serviço</p>
									<p class='Encodes Encode1'>14.Nome do serviço</p>
									<p class='Encodes Encode1'>15.Nome do serviço</p>
									<p class='Encodes Encode1'>16.Nome do serviço</p>
									<p class='Encodes Encode1'>17.Nome do serviço</p>
									<p class='Encodes Encode1'>18.Nome do serviço</p>
									<p class='Encodes Encode1'>19.Nome do serviço</p>
									<p class='Encodes Encode1'>20.Nome do serviço</p>
									<p class='Encodes Encode1'>21.Nome do serviço</p>

								</div>
							</div>
							<div class='ranking-box'>
								<span class='ranking-header'>
									<h4 class='Encodes Encode6'>Ranking de produtos</h4>
								</span>
								<div class='ranking-container'>
									<p class='Encodes Encode1'>1. Nome do produto</p>
									<p class='Encodes Encode1'>2. Nome do produto</p>
									<p class='Encodes Encode1'>3. Nome do produto</p>
									<p class='Encodes Encode1'>4.Nome do produto</p>
									<p class='Encodes Encode1'>5.Nome do produto</p>
									<p class='Encodes Encode1'>6.Nome do produto</p>
									<p class='Encodes Encode1'>7.Nome do produto</p>
									<p class='Encodes Encode1'>8.Nome do produto</p>
									<p class='Encodes Encode1'>10.Nome do produto</p>
									<p class='Encodes Encode1'>11.Nome do produto</p>
									<p class='Encodes Encode1'>12.Nome do produto</p>
									<p class='Encodes Encode1'>13.Nome do produto</p>
									<p class='Encodes Encode1'>14.Nome do produto</p>
									<p class='Encodes Encode1'>15.Nome do produto</p>
									<p class='Encodes Encode1'>16.Nome do produto</p>
									<p class='Encodes Encode1'>17.Nome do produto</p>
									<p class='Encodes Encode1'>18.Nome do produto</p>
									<p class='Encodes Encode1'>19.Nome do produto</p>
									<p class='Encodes Encode1'>20.Nome do produto</p>
									<p class='Encodes Encode1'>21.Nome do produto</p>

								</div>
							</div>
						</div>


					</div>

					<div class='relatorios-container relatorio-container'>
						<form class='relatorios-filtro relatorio-filtro'>
							<label>Filtro</label>


							<select name='mesInicial'>
								<option value='mesInicial'>Mês (Inicial)</option>
							</select>

							<select name='mesFinal'>
								<option value='mesFinal'>Mês (Final)</option>
							</select>

							<button class='btn-secondary'>OK</button>
						</form>

						<div class='relatorios-box relatorio-box veiculos-atendidos'>
							<h2 class='Encodes Encode4'>551</h2>
							<p class='Encodes Encode1'>Clientes cadastrados</p>
						</div>

						<div class='relatorios-box processamentos-box tempo-estimado notmargin'>
							<span><h2 class='Encodes Encode4'>4.8</h2><p class='Encodes Encode5'>/ 5</p></span>
							<p class='Encodes Encode1'>Rating de avaliação</p>
						</div>

						<div class='relatorio-comentario'>
							<span class='comentario-header'>
								<h4 class='Encodes Encode6'>Como o cliente connheceu a MScar</h4>
							</span>
							<div class='comentario-container'>
								<p class='Encodes Encode1'>Frase de como o cliente conheceu a mscar.</p>
								<p class='Encodes Encode1'>Frase de como o cliente conheceu a mscar.</p>
								<p class='Encodes Encode1'>Frase de como o cliente conheceu a mscar.</p>
								<p class='Encodes Encode1'>Frase de como o cliente conheceu a mscar.</p>
							</div>
						</div>
					</div>
				</main>

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
#link4 {
	color: #4DA1FF;
	border-bottom: 3px solid rgb(77, 161, 255);
}
</style>