@extends('layouts.login')

@section('title', 'Reset')

@section('content')


<form class="resetForm" method="post" onsubmit="return false;">
	<img src="img/logo-azul.svg" class="login-logo">

	<h2 class="Raleways Raleway2">Troca de senha</h2>

	<label>
		<span for="email">Nova senha</span>
		<input type="password" name="nova" id="nova" placeholder="Digite sua nova senha">
	</label>

	<input type="hidden" name="email" value="{{ app('request')->input('email') }}">
    <input type="hidden" name="token" value="{{ app('request')->input('tk') }}">

	<label>
		<span for="email">Confirmar senha</span>
		<input type="password" name="confirmar" placeholder="Confirme sua nova senha">
	</label>


	<div class="responseReset"></div>

	<button href="javascript:void(0)" class="btn-secondary resetEnviar">Salvar</button>
	<a href="/login" class="btn-three recuVoltar">Voltar</a>
</form>

@stop
