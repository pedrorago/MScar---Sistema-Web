<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarrosModelos;
use App\TipoCombustivel;
use Validator;
use View;
use DB;
use App\Clientes;
use App\ClientesCarros;

class ClientesController extends Controller {

	/* tabela de códigos 
	   500 = Erro interno
	   501 = Formulário faltou preencher algum dado
	   200 = Ok
	*/
	
	public function novos() {

		return View::make('novosClientes')->with(
			array(
				'modelos' => CarrosModelos::get(),
				'combustivel' => TipoCombustivel::get()
			)
		);

    }
    
    public function carros() {

        $array = array();

        if (isset($_GET['cliente'])) {

            $carros = ClientesCarros::where('cliente_id', $_GET['cliente'])->with('modelo')->get();

            foreach ($carros as $key => $value) {
                
                $array[$key] = array(
                    'id' => $value['id'],
                    'modelo' => $value->modelo['nome'],
                    'chassis' => $value['n_chassis'],
                    'cor' => $value['cor'],
                    'placa' => $value['placa']
                );

            }

            return View::make('todosCarros')->with(array('itens' => $array));

        } else {
            return redirect('/clientes');
        }

    }

    public function editarCarros() {
      return view('editarCarros');
    }
	
	public function todos() {
        
        $array = array();

        $clientes = Clientes::orderBy('id', 'desc')->get();

        foreach ($clientes as $key => $value) {
            $array[$key] = array(
                'id' => $value['id'],
                'nome' => $value['nome'],
                'data' => date('d/m/Y', strtotime($value['created_at'])),
                'carros' => count(ClientesCarros::where('cliente_id', $value['id']))
            );
        }
		
		return View::make('todosClientes')->with(array('itens' => $array));
	
	}

	public function criar(Request $request) {
		
		return $this->validar_cliente($request);

	}

	private function validar_cliente($request){

		$validator = Validator::make(
            [
                'pessoa' => $request['pessoa'],
                'cep' => $request['cep'],
                'endereco' => $request['endereco'],
                'telefone_ddd' => $request['telefone_ddd'],
                'telefone' => $request['telefone'],
                'cliente' => $request['cliente'],
                'numero' => $request['numero'],
                'tipo_atividade' => $request['tipo_atividade'],
                'bairro' => $request['bairro'],
                'cidade' => $request['cidade'],
                'uf' => $request['uf'],
                'email' => $request['email'],
                'rg' => $request['rg'],
                'como_conheceu' => $request['como_conheceu'],
                'data_nascimento_dia' => $request['data_nascimento_dia'],
                'data_nascimento_mes' => $request['data_nascimento_mes'],
                'data_nascimento_ano' => $request['data_nascimento_ano'],
                'km' => $request['km'],
                'chassis' => $request['chassis'],
                'cor' => $request['cor'],
                'placa' => $request['placa'],
                'ano_fabricacao' => $request['ano_fabricacao'],
                'ano_modelo' => $request['ano_modelo'],
                'modelo' => $request['modelo'],
                'combustivel' => $request['combustivel']
            ],
            [
                'pessoa' => 'required',
                'cep' => 'required',
                'endereco' => 'required',
                'telefone_ddd' => 'required',
                'telefone' => 'required',
                'cliente' => 'required',
                'numero' => 'required',
                'tipo_atividade' => 'required',
                'bairro' => 'required',
                'cidade' => 'required',
                'uf' => 'required',
                'email' => 'required',
                'rg' => 'required',
                'como_conheceu' => 'required',
                'data_nascimento_dia' => 'required',
                'data_nascimento_mes' => 'required',
                'data_nascimento_ano' => 'required',
                'modelo' => 'required',
                'km' => 'required',
                'chassis' => 'required',
                'cor' => 'required',
                'placa' => 'required',
                'ano_fabricacao' => 'required',
                'ano_modelo' => 'required',
                'combustivel' => 'required',
            ]
        );

        if (count($validator->errors()->all()) == 0) {

        	DB::beginTransaction();

        	try {

        		$cliente = New Clientes;

        		$cliente->fill( 
        			array(
	        			'tipo_pessoa' => $request['pessoa'],
		                'cep' => $request['cep'],
		                'cpf' => $request['cpf'],
		                'cnpj' => $request['cnpj'],
		                'endereco' => $request['endereco'],
		                'telefone_1' => $request['telefone_ddd'].'-'.$request['telefone'],
		                'nome' => $request['cliente'],
		                'numero' => $request['numero'],
		                'telefone_2' => $request['celular_ddd'].'-'.$request['celular'],
		                'tipo_atividade' => $request['tipo_atividade'],
		                'bairro' => $request['bairro'],
		                'telefone_3' => $request['comercial_ddd'].'-'.$request['comercial'],
		                'cidade' => $request['cidade'],
		                'estado' => $request['uf'],
		                'email' => $request['email'],
		                'rg' => $request['rg'],
		                'como_conheceu' => $request['como_conheceu'],
		                'data_nascimento_dia' => $request['data_nascimento_dia'],
		                'data_nascimento_mes' => $request['data_nascimento_mes'],
		                'data_nascimento_ano' => $request['data_nascimento_ano']
		            )
        		);

        		$cliente->save();

        		// salvar carro do cliente

        		$carros = New ClientesCarros;

        		$carros->fill( 
        			array(
	        			'cliente_id' => $cliente->id,
		                'modelo_id' => $request['modelo'],
		                'tipo_combustivel_id' => $request['combustivel'],
		                'placa' => $request['placa'],
		                'n_chassis' => $request['chassis'],
		                'km' => $request['km'],
		                'cor' => $request['cor'],
		                'ano_modelo' => $request['ano_modelo'],
		                'ano_fabricacao' => $request['ano_fabricacao']
		            )
        		);

        		$carros->save();

        		DB::commit();

        		$status = 200;
        		
        	} catch (Exception $e) {

        		DB::rollback();

        		$status = 500;
        		
        	}

        } else {
        	$status = 501;
        }

        return $status;

	}


    public function busca_carro() {

        $array = array();

        if (isset($_GET['cliente'])) {

            $carros = ClientesCarros::where('cliente_id', $_GET['cliente'])->with('modelo')->get();

            foreach ($carros as $key => $value) {
                
                $array[$key] = array(
                    'id' => $value['id'],
                    'modelo' => $value->modelo['nome']
                );

            }

        }

        return $array;

    }

    public function busca_cliente(){

        $conditions = array();

        $array = array();

        if(!empty($_GET['nome'])){
            array_push($conditions, array('nome', 'like', '%'.$_GET['nome'].'%'));
        }

         if(!empty($_GET['cadastro'])){
            array_push($conditions, array('created_at', 'like', '%'.date('Y-m-d', strtotime($_GET['cadastro'])).'%'));
        }

        $clientes = Clientes::where($conditions)->orderBy('id', 'desc')->get();

        foreach ($clientes as $key => $value) {
            $array[$key] = array(
                'id' => $value['id'],
                'nome' => $value['nome'],
                'data' => date('d/m/Y', strtotime($value['created_at'])),
                'carros' => count(ClientesCarros::where('cliente_id', $value['id']))
            );
        }

        return View::make('todosClientes')->with(array('itens' => $array));

    }


}
