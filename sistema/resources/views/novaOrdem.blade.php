@extends('layouts.app')

@section('title', 'Nova ordem')

@section('content')

<main class="processos-main">
	<div class="container">
		<div class="menuMain processosMenu">
			<a href="/orcamentos/novo" class="Raleways Raleways1 menuMain-link" id="link1">Nova ordem</a>
			<a href="/pedidos" class="Raleways Raleways1 menuMain-link" id="link2">Pedidos</a>
			<a href="/orcamentos" class="Raleways Raleways1 menuMain-link" id="link3">Orçamentos</a>
			<span class="borda-link"></span>
		</div>
		<section id="Processos">
			<form class="novaOrdem-form checklist-inicial" method="post" onsubmit="return false;" enctype="multipart/form-data">
				<ul class="processos-etapas">
					<li class="Encodes Encode1" id="processos1">1.Checklist inicial</li>
					<li class="Encodes Encode1" id="processos2">2.Checklist de segurança</li>
				</ul>

				<div class="selects-novaOrdem">
					<span class="nova-clienteSpan">
						<label for="cliente">Cliente</label>
						<select id="cliente" name="cliente" onchange="carros_cliente(this.value)" class="required">
							<option value="">Selecione...</option>
							<?php
							foreach ($clientes as $key => $value) {
								echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
							}
							?>
						</select>
					</span>
					<span class="nova-carroSpan">
						<label for="carro">Carro a ser revisado</label>
						<select id="carro" name="carro" class="required">
							<option value="">Selecione o cliente...</option>
						</select>
					</span>
<<<<<<< HEAD
					<span class="nova-carroSpan">
						<label for="mecanico">Mecânico Responsável</label>
						<select id="mecanico" value="carro" class="required">
							<option value="">Selecione o mecânico...</option>
							<?php
							foreach ($usuarios as $key => $value) {
=======

					<span class="nova-mecanicoSpan">
						<label for="mecanico">Mecânico responsável</label>
						<select id="mecanico" name="mecanico" class="required">
							<option value="">Selecione...</option>
							<?php
							foreach ($mecanicos as $key => $value) {
>>>>>>> ff3f93327d5fa468bb305f5c3042b5b5a4de4f7a
								echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
							}
							?>
						</select>
					</span>
<<<<<<< HEAD

=======
>>>>>>> ff3f93327d5fa468bb305f5c3042b5b5a4de4f7a
				</div>
				<label class="marcasLabel">Marcas e observações na carroceria</label>

				<div class="carros-checklist">
					<div class="carros-box">
						<span class="checkbox">
							<input type="checkbox" name="frontal" id="frontal">
							<label for="frontal">Frontal</label>
							<div class="box-add-fotos">
								<label for="carro_frontal" class="btn-secondary carros-adicionarFotos carro_frontal">Adicionar Fotos</label>
							    <input type="file" name="carro_frontal" style="display: none;" id="carro_frontal" multiple accept="image/*">
							</div>
						</span>
						<span class="carro-img">
							<img src="img/Processos/novaOrdem/Frontal.png">
						</span>
					</div>
					<div class="carros-box">
						<span class="checkbox">
							<input type="checkbox" name="traseira" id="traseira">
							<label for="traseira">Traseira</label>
							<div class="box-add-fotos">
								<label for="carro_traseira" class="btn-secondary carros-adicionarFotos carro_traseira">Adicionar Fotos</label>
							    <input type="file" name="carro_traseira" style="display: none;" id="carro_traseira" multiple accept="image/*">
							</div>
						</span>
						<span class="carro-img">
							<img src="img/Processos/novaOrdem/Traseira.png">
						</span>
					</div>
					<div class="carros-box">
						<span class="checkbox">
							<input type="checkbox" name="esquerda" id="esquerda">
							<label for="esquerda">Lateral esquerda</label>
							<div class="box-add-fotos">
								<label for="carro_esquerda" class="btn-secondary carros-adicionarFotos carro_esquerda">Adicionar Fotos</label>
							    <input type="file" name="carro_esquerda" style="display: none;" id="carro_esquerda" multiple accept="image/*">
							</div>
						</span>
						<span class="carro-img">
							<img src="img/Processos/novaOrdem/esquerda.png">
						</span>
					</div>
					<div class="carros-box">
						<span class="checkbox">
							<input type="checkbox" name="direita" id="direita">
							<label for="direita">Lateral direita</label>
							<div class="box-add-fotos">
								<label for="carro_direita" class="btn-secondary carros-adicionarFotos carro_direita">Adicionar Fotos</label>
							    <input type="file" name="carro_direita" style="display: none;" id="carro_direita" multiple accept="image/*">
							</div>
							<a href="javascript:void(0)" class="btn-secondary carros-adicionarFotos">Adicionar Fotos</a>
						</span>
						<span class="carro-img">
							<img src="img/Processos/novaOrdem/direita.png">
						</span>
					</div>
					<div class="carros-box">
						<span class="checkbox">
							<input type="checkbox" name="superior" id="superior">
							<label for="superior">Superior</label>
							<div class="box-add-fotos">
								<label for="carro_superior" class="btn-secondary carros-adicionarFotos carro_superior">Adicionar Fotos</label>
							    <input type="file" name="carro_superior" style="display: none;" id="carro_superior" multiple accept="image/*">
							</div>
							<a href="javascript:void(0)" class="btn-secondary carros-adicionarFotos">Adicionar Fotos</a>
						</span>
						<span class="carro-img">
							<img src="img/Processos/novaOrdem/superior.png">
						</span>
					</div>
				</div>

				<label class="label-acessorios">Possui acessórios abaixo?</label>
					<div class="box-acessorios">
						<span class="acessorios-span">
							<p class="Encodes Encode1">Antena</p>
							<label class="switch" for="antena">
								<input type="checkbox" id="antena" name="antena" class="inputSwitch">
								<span class="slider round"></span>
								<p id="switch" class="valorSwitch">Não</p>
							</label>
						</span>
						<span class="acessorios-span">
							<p class="Encodes Encode1">Rádio</p>
							<label class="switch" for="radio">
								<input type="checkbox" id="radio" name="acessorio_radio" class="inputSwitch">
								<span class="slider round"></span>
								<p id="switch" class="valorSwitch">Não</p>
							</label>
						</span>
						<span class="acessorios-span">
							<p class="Encodes Encode1">Manual</p>
							<label class="switch" for="manual">
								<input type="checkbox" id="manual" name="acessorio_manual" class="inputSwitch">
								<span class="slider round"></span>
								<p id="switch" class="valorSwitch">Não</p>
							</label>
						</span>
						<span class="acessorios-span">
							<p class="Encodes Encode1">GPS</p>
							<label class="switch" for="gps">
								<input type="checkbox" id="gps" name="acessorio_gps" class="inputSwitch">
								<span class="slider round"></span>
								<p id="switch" class="valorSwitch">Não</p>
							</label>
						</span>
						<span class="acessorios-span">
							<p class="Encodes Encode1">Documentos</p>
							<label class="switch" for="Documentos">
								<input type="checkbox" id="Documentos" name="acessorio_documentos" class="inputSwitch">
								<span class="slider round"></span>
								<p id="switch" class="valorSwitch">Não</p>
							</label>
						</span>
						<span class="acessorios-span">
							<p class="Encodes Encode1">Estepe</p>
							<label class="switch" for="Estepe">
								<input type="checkbox" id="Estepe" name="acessorio_estepe" class="inputSwitch">
								<span class="slider round"></span>
								<p id="switch" class="valorSwitch">Não</p>
							</label>
						</span>
						<span class="acessorios-span">
							<p class="Encodes Encode1">Carregador de celular</p>
							<label class="switch" for="Carregador de celular">
								<input type="checkbox" id="Carregador de celular" name="acessorio_carregador" class="inputSwitch">
								<span class="slider round"></span>
								<p id="switch" class="valorSwitch">Não</p>
							</label>
						</span>
						<span class="acessorios-span">
							<p class="Encodes Encode1">Calota</p>
							<label class="switch" for="Calota">
								<input type="checkbox" id="Calota" name="acessorio_calota" class="inputSwitch">
								<span class="slider round"></span>
								<p id="switch" class="valorSwitch">Não</p>
							</label>
						</span>
						<span class="acessorios-span">
							<p class="Encodes Encode1">Pertences</p>
							<label class="switch" for="Pertences">
								<input type="checkbox" id="Pertences" name="acessorio_pertences" class="inputSwitch">
								<span class="slider round"></span>
								<p id="switch" class="valorSwitch">Não</p>
							</label>
						</span>
					</div>
					<label class="label-servicosSolicitados">Problemas relatados pelo cliente</label>
					<select class="js-select2 required" name="servicos[]" style="width: 100%;" data-placeholder="Escrever aqui..." multiple="">
						<option></option>
						<?php
                        foreach ($servicos as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
                        }
                        ?>
                    </select>
                    <a class="btn-primary proximoBtn" href="javascript:void(0)" onclick="proximo('checklist-inicial', 'checklist-deSeguranca')">
                        Próximo
                    </a>
			</form>

				<form class="novaOrdem-form checklist-deSeguranca" method="post" onsubmit="return false;">
					<ul class="processos-etapas">
						<li class="Encodes Encode1" id="processos1">1. Checklist inicial</li>
						<li class="Encodes Encode1" id="processos2">2. Checklist de segurança</li>
					</ul>

					<div class="deSeguranca-i">
						<span class="deSeguranca-box">
							
							<div class="deSeguranca-info">
								<label class="switch deSegurancaInfo-switch">
									<input type="checkbox" class="inputSwitch" disabled="disabled">
									<span class="slider round nAvaliado"></span>
									<p class="Encodes Encode1 deSeguranca-label">Não foi avaliado.</p>
								</label>

								<label class="switch deSegurancaInfo-switch">
									<input type="checkbox" class="inputSwitch" disabled="disabled">
									<span class="slider round"></span>
									<p class="Encodes Encode1 deSeguranca-label">Não está ok.</p>
								</label>

								<label class="switch">
									<input type="checkbox" class="inputSwitch" checked="checked" disabled="disabled">
									<span class="slider round"></span>
									<p class="Encodes Encode1 deSeguranca-label">Está ok.</p>
								</label>

							</div>
							<i class="ion-information-circled infoIcone"></i>
						</span>
					</div>

					<main class="deSeguranca-main">
						<div class="deSeguranca-left">
							<label class="dentro-label">Dentro do  veículo</label>

							<label class="switch deSeguranca-checklist" for="item_1">
								<input type="checkbox" id="item_1" name="item_1" class="inputSwitch">
								<span class="slider round nAvaliado"></span>
								<p id="switch" class="Encodes Encode1">Instrumentos do painel e lâmpadas de controle</p>
							</label>

							<label class="switch deSeguranca-checklist" for="item_2">
								<input type="checkbox" id="item_2" name="item_2" class="inputSwitch">
								<span class="slider round nAvaliado"></span>
								<p id="switch" class="Encodes Encode1">Iluminação dos instrumentos do painel</p>
							</label>

							<label class="switch deSeguranca-checklist" for="item_3">
								<input type="checkbox" id="item_3" name="item_3" class="inputSwitch">
								<span class="slider round nAvaliado"></span>
								<p id="switch" class="Encodes Encode1">Lâmpadas internas</p>
							</label>

							<label class="switch deSeguranca-checklist" for="item_4">
								<input type="checkbox" id="item_4" name="item_4" class="inputSwitch">
								<span class="slider round nAvaliado"></span>
								<p id="switch" class="Encodes Encode1">Setas de direção e luzes de sinalização</p>
							</label>

							<label class="switch deSeguranca-checklist" for="item_5">
								<input type="checkbox" id="item_5" name="item_5" class="inputSwitch">
								<span class="slider round nAvaliado"></span>
								<p id="switch" class="Encodes Encode1">Jato d’água dos limpadores de parabrisa</p>
							</label>

							<label class="switch deSeguranca-checklist" for="item_6">
								<input type="checkbox" id="item_6" name="item_6" class="inputSwitch">
								<span class="slider round nAvaliado"></span>
								<p id="switch" class="Encodes Encode1">Ar-condicionado</p>
							</label>

							<label class="switch deSeguranca-checklist" for="item_7">
								<input type="checkbox" id="item_7" name="item_7" class="inputSwitch">
								<span class="slider round nAvaliado"></span>
								<p id="switch" class="Encodes Encode1">Buzina</p>
							</label>

							<label class="switch deSeguranca-checklist" for="item_8">
								<input type="checkbox" id="item_8" name="item_8" class="inputSwitch">
								<span class="slider round nAvaliado"></span>
								<p id="switch" class="Encodes Encode1">Etiqueta de óleo</p>
							</label>

							<label class="switch deSeguranca-checklist" for="item_9">
								<input type="checkbox" id="item_9" name="item_9" class="inputSwitch">
								<span class="slider round nAvaliado"></span>
								<p id="switch" class="Encodes Encode1">Freio estacionamento</p>
							</label>

							<label class="switch deSeguranca-checklist" for="item10">
								<input type="checkbox" id="item_10" name="item_10" class="inputSwitch">
								<span class="slider round nAvaliado"></span>
								<p id="switch" class="Encodes Encode1">Tem extintor de incêncio e está na validade</p>
							</label>

						</span>
					</div>
					<div class="deSeguranca-right">
						<label class="dentro-label">Fora do veículo</label>

						<label class="switch deSeguranca-checklist" for="item_11">
							<input type="checkbox" id="item_11" name="item_11" class="inputSwitch">
							<span class="slider round nAvaliado"></span>
							<p id="switch" class="Encodes Encode1">Palhetas dos limpadores de para-briza e vidro traseiro</p>
						</label>

						<label class="switch deSeguranca-checklist" for="item_12">
							<input type="checkbox" id="item_12" name="item_12" class="inputSwitch">
							<span class="slider round nAvaliado"></span>
							<p id="switch" class="Encodes Encode1">Sistema de iluminação (Faróis, setas, freio, placas, ré…) </p>
						</label>

						<label class="switch deSeguranca-checklist" for="item_13">
							<input type="checkbox" id="item_13" name="item_13" class="inputSwitch">
							<span class="slider round nAvaliado"></span>
							<p id="switch" class="Encodes Encode1">Verificar condições de pneu/pressão e estepe </p>
						</label>

						<label class="switch deSeguranca-checklist" for="item_14">
							<input type="checkbox" id="item_14" name="item_14" class="inputSwitch">
							<span class="slider round nAvaliado"></span>
							<p id="switch" class="Encodes Encode1">Chave de roda, macaco e triângulo </p>
						</label>

						<label class="dentro-label capoLabel">Capô levantado </label>

						<label class="switch deSeguranca-checklist" for="item_15">
							<input type="checkbox" id="item_15" name="item_15" class="inputSwitch">
							<span class="slider round nAvaliado"></span>
							<p id="switch" class="Encodes Encode1">Liquido de arrefecimento (vazamento, nível, aditivo) </p>
						</label>

						<label class="switch deSeguranca-checklist" for="item_16">
							<input type="checkbox" id="item_16" name="item_16" class="inputSwitch">
							<span class="slider round nAvaliado"></span>
							<p id="switch" class="Encodes Encode1">Fluido de freio: nível, qualidade (cor e contaminação) </p>
						</label>

						<label class="switch deSeguranca-checklist" for="item_17">
							<input type="checkbox" id="item_17" name="item_17" class="inputSwitch">
							<span class="slider round nAvaliado"></span>
							<p id="switch" class="Encodes Encode1">Nível do óleo no motor </p>
						</label>

						<label class="switch deSeguranca-checklist" for="item_18">
							<input type="checkbox" id="item_18" name="item_18" class="inputSwitch">
							<span class="slider round nAvaliado"></span>
							<p id="switch" class="Encodes Encode1">Nível do óleo hidráulico (óleo de direção) </p>
						</label>

						<label class="switch deSeguranca-checklist" for="item_19">
							<input type="checkbox" id="item_19" name="item_19" class="inputSwitch">
							<span class="slider round nAvaliado"></span>
							<p id="switch" class="Encodes Encode1">Sistema de limpa-vidros/completar reservatório </p>
						</label>

						<label class="switch deSeguranca-checklist" for="item_20">
							<input type="checkbox" id="item_20" name="item_20" class="inputSwitch">
							<span class="slider round nAvaliado"></span>
							<p id="switch" class="Encodes Encode1">Reservatório de partida a frio </p>
						</label>

					</div>
				</main>

				<label class="dataEHoraLabel">Data e hora prevista para entrega</label>
				<span class="dataEHoraSpan">
					<input type="datetime-local" name="previsao" placeholder="00/00/0000, às 00:00h" class="dataEHoraInput">
					<i class="ion-calendar icone-calendario"></i>
				</span>
				<button type="submit" class="btn-primary proximoBtn" onclick="criar_ordem()">Enviar para pedidos</button>
				<a class="btn-secondary voltarBtn" href="javascript:void(0)">Voltar</a>
			</form>
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
#link1 {
	color: #4DA1FF;
	border-bottom: 3px solid rgb(77, 161, 255);
}
</style>