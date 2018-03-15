<header>
		<a href="/"><img src="img/logo.svg" class='logo'></a>
		<span class='usuario-box'>
			<p class='Encodes Encode1'>Olá, <?= Auth::user()->nome; ?>!</p>
			<p class='Encodes Encode2'>Área de <?= $tipo_usuario; ?></p>
			<i class='ion-android-arrow-dropdown dropdown'></i>
			<a href="/resetar-senha" class='Encodes Encode1 logout-links alterarSenha'>Alterar senha</a>
			<a href="/sair" class='Encodes Encode1 logout-links logouLink'>Sair</a>
		</span>
</header>