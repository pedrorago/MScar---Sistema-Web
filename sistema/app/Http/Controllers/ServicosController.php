<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicos;
use App\ServicosTipos;
use App\CarrosModelos;
use DB;
use Validator;
use Session;
use View;

class ServicosController extends Controller {

	// depois verificar qual a permissão disso

	public function servicos() {

		$array = array();

		$servicos = Servicos::with('tipo')->get();

		foreach ($servicos as $key => $value) {

			$array[$key] = array(
				'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
				'categoria' => $value->tipo['nome'],
				'preco' => number_format($value['preco'], 2, ',', ' '),
				'nome' => $value['nome'],
				'estimativa_hora' => $value['estimativa_hora'],
				'estimativa_minuto' => $value['estimativa_minuto']
			);
			
		}

		return View('servicos')->with(array(
			'itens' => $array, 
			'modelos' => CarrosModelos::get(),
			'tipos' => $this->servicos_categorias()
		));
	}

	private function servicos_categorias(){

		$array = array();

		$categorias = ServicosTipos::get();

		foreach ($categorias as $key => $value) {
			$array[$key] = array(
				'id' => $value['id'],
				'nome' => $value['nome']
			);
		}

		return $array;

	}


	public function criar_servico(Request $request) {
		
		return $this->validar_servico($request);

	}

	private function validar_servico($request){

		$validator = Validator::make(
            [
                'nome' => $request['nome'],
                'categoria' => $request['tipo'],
                'hora' => $request['hora'],
                'minuto' => $request['minuto'],
                'preco' => $request['preco'],
                'garantia' => $request['garantia'],
                'manutencao' => $request['manutencao']
            ],
            [
                'nome' => 'required',
                'categoria' => 'required',
                'hora' => 'required',
                'minuto' => 'required',
                'preco' => 'required',
                'garantia' => 'required',
                'manutencao' => 'required'
            ]
        );

        if (count($validator->errors()->all()) == 0) {

        	DB::beginTransaction();

        	try {

        		$servicos = New Servicos;

        		$servicos->fill( 
        			array(
	        			'nome' => $request['nome'],
		                'modelo_id' => $request['modelo'],
		                'servico_tipo_id' => $request['tipo'],
		                'preco' => floatval(str_replace(',', '.', str_replace('.', '', $request['preco']))),
		                'estimativa_hora' => $request['hora'],
		                'estimativa_minuto' => $request['minuto'],
		                'garantia' => $request['garantia'],
		                'manutencao' => $request['manutencao']
		            )
        		);

        		$servicos->save();

        		DB::commit();

        		Session::flash('retorno', '200');

        		
        	} catch (Exception $e) {

        		DB::rollback();

        		Session::flash('retorno', '500');
        		
        	}

        } else {

        	Session::flash('retorno', '501');

        }

        return redirect('/servicos');

	}

	public function busca(){

		if (isset($_GET['nome'])) {
			
			$array = array();
			$conditions = array();

			if(!empty($_GET['nome'])){
			 	array_push($conditions, array('nome', 'like', '%'.$_GET['nome'].'%'));
			}

			if (!empty($_GET['tipo'])) {
				array_push($conditions, array('servico_tipo_id', $_GET['tipo']));
			}

			$servicos = Servicos::where($conditions)->with('tipo')->get();

			foreach ($servicos as $key => $value) {

				$array[$key] = array(
					'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
					'categoria' => $value->tipo['nome'],
					'preco' => number_format($value['preco'], 2, ',', ' '),
					'nome' => $value['nome'],
					'estimativa_hora' => $value['estimativa_hora'],
					'estimativa_minuto' => $value['estimativa_minuto']
				);

			}

			return View('servicos')->with(array(
				'itens' => $array, 
				'modelos' => CarrosModelos::get(),
				'tipos' => $this->servicos_categorias()
			));

		} else {
			return redirect('/servicos');
		}

	}


	public function relatorios() {
		return view('relatorios');
	}

}
