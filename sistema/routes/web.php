<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


/* rotas de login / logout / recuperação / reset de senha */

Route::get('login',array('as'=>'login',function(){

	if($user = Auth::user()) {
		return redirect('/');
	} else {
		return view('/login');
	}
	
}));


Route::post('/login', 'LoginController@login');

Route::get('/resetar_senha', 'LoginController@reset_view');

Route::post('/resetar_senha', 'LoginController@reset');

Route::post('/recuperar_senha', 'LoginController@recuperar');

Route::post('/editar_perfil', 'UsuarioController@editar');

Route::get('/sair', 'LoginController@logout');

Route::get('/logout', 'LoginController@logout');

/* fim rotas de login / logout / recuperação e reset de senha */
	
Route::get('/orcamentos', 'OrcamentoController@novaOrdem');

Route::get('/pedidos', 'OrcamentoController@pedidos');

Route::get('/orcamento-final', 'OrcamentoController@orcamentos');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/processos', 'ProcessosController@ordens');
Route::get('/estoque', 'ProcessosController@estoque');


Route::group(['middleware' => 'auth'], function () {
	
	/* dashboard */

	Route::get('/', function(){
		return redirect('/clientes');
	});

	Route::get('/clientes', 'ClientesController@novos');
	
	Route::get('/clientes/todos', 'ClientesController@todos');

	Route::get('/clientes/busca', 'ClientesController@busca_cliente');

	Route::get('/clientes/carros', 'ClientesController@carros');

	Route::get('/clientes/carros/editar', 'ClientesController@editarCarros');
	Route::get('/clientes/carros/novo', 'ClientesController@novoCarro');
	
	Route::post('/clientes/novo', 'ClientesController@criar');

	/* criação de ordem de serviço */

	Route::get('/orcamentos/novo', 'OrcamentoController@nova_ordem');
	Route::get('/busca_carros', 'ClientesController@busca_carro'); // auxiliar


	/* pedidos e orçamentos */


	Route::get('/pedidos', 'OrcamentoController@pedidos');
	
	Route::get('/orcamentos', 'OrcamentoController@orcamentos');


	/* ordens de serviços */

	Route::post('/ordens/criar', 'OrdensController@criar_ordem');

	Route::get('/ordens', 'OrdensController@ordens');

	Route::get('/ordens/busca', 'OrdensController@ordens_busca');

	Route::get('/ordens/entregues/atualizar', 'OrdensController@atualizar_entregues');

	Route::get('/ordens/processamento/atualizar', 'OrdensController@atualizar_processamento');

	Route::post('/ordens/concluir_ordem', 'OrdensController@concluir_ordem');

	Route::get('/ordens/estoque', 'OrdensController@ordens_estoque');

	Route::get('/ordens/estoque/busca', 'OrdensController@ordens_estoque_busca');

	Route::get('/ordens/estoque/atualizar', 'OrdensController@atualizar_estoque');

	Route::get('/ordens/estoque/checklist', 'OrdensController@dados_ordem');

	Route::get('/ordens/estoque/produto/atualizar', 'OrdensController@atualizar_status_produto');

	/* perfis de acesso */

	Route::get('/perfis', 'PerfisController@perfis');

	Route::post('/perfis', 'PerfisController@criar_perfil');

	Route::get('/perfis/remover/{id}', 'PerfisController@remover_perfil');

	Route::get('/perfis/busca', 'PerfisController@busca');

	/* perfis de acesso fim */

	/* produtos */

	Route::get('/produtos', 'ProdutosController@produtos');

	Route::post('/produtos', 'ProdutosController@criar_produto');

	Route::get('/produtos/busca', 'ProdutosController@busca');

	/* produtos fim */

	/* serviços */

	Route::get('/servicos', 'ServicosController@servicos');

	Route::post('/servicos', 'ServicosController@criar_servico');

	Route::get('/servicos/busca', 'ServicosController@busca');

	/* serviços fim */

	/* relatórios */

	Route::get('/relatorios', 'RelatoriosController@relatorios');

	/* relatórios fim */


});
