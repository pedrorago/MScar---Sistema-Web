@extends('layouts.login')

@section('title', 'Login')

@section('content')

<form class="loginForm" method="post" onsubmit="return false;">
	<img src="img/logo-azul.svg" class='login-logo'>

	<label>
		<span for="email">Email</span>
		<input type="email" name="email" id="email" placeholder="Digite seu e-mail">
	</label>

	<label>
		<span for="senha">Senha</span>
		<input type="password" name="senha" id="senha" placeholder="Digite sua senha">
	</label>

	<div class="responseLogin"></div>

	<span class="spanLembrar">
		<input type="checkbox" name="lembrar" value="lembrar" class="lembrarInput">
		<p class="Sources Source1">Lembrar senha</p>
	</span>

	<button>Acessar</button>

	<span class="spanRecuperar">
		<p class="Encodes Encode1">Esqueceu sua senha?</p>
		<a href="javascript:void(0)" class="Encodes Encode1 recuLink">Clique para recuperar </a>
	</span>
</form>

<form class="recuForm recuperar" onsubmit="return false;">
	<img src="img/logo-azul.svg" class="login-logo">

	<h2 class="Raleways Raleway2">Recuperar senha</h2>

	<label>
		<span for="email">Email</span>
		<input type="email" name="email" placeholder="Digite o email cadastrado">
	</label>

	<div class="responseRecuperar"></div>

	<button href="javascript:void(0)" class="btn-secondary recuEnviar">Enviar instruções</button>
	<a href="javascript:void(0)" class="btn-three recuVoltar">Cancelar</a>
</form>

@stop
