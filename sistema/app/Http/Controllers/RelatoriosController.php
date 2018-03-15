<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\ServicosTipos;
use View;

class RelatoriosController extends Controller {

	// depois verificar qual a permissão disso

	public function relatorios() {
		
		return View::make('relatorios')->with(array(
            'tipo_servicos' => $this->servicos_categorias(),
            'usuarios' => $this->getUsuarios()
            ));
	}

	private function getUsuarios(){

        $array = array();

        $usuarios = Usuario::where('role_id', '!=', 1)->where('role_id', '!=', 5)->with('role')->orderBy('id', 'desc')->get();

        foreach ($usuarios as $key => $value) {
            $array[$key] = array(
                'id' => $value['id'],
                'nome' => $value['nome']
            );
        }

        return $array;

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


	private function getQuantidadeAtendimentoServico(Request $request){

		if(!empty($request->input('funcionarios'))){

			//filtro para quantidade de servicos realizadas por um determinado funcionario
			
		}
	}

}
