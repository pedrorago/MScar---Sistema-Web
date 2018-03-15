<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\Servicos;
use Validator;
use Session;
use Auth;
use DB;

class ProdutosController extends Controller {

	public function __construct() { 

		$this->middleware(function ($request, $next) {
			
			$this->user= Auth::user();

			if (Auth::user()->role_id == 1 or Auth::user()->role_id == 3) {
				return $next($request);
			} else {
				return redirect('/');
			}

		});

    }

	public function produtos() {
		
		$array = array();

		$produtos = Produtos::with('servico')->orderBy('id', 'desc')->get();

		foreach ($produtos as $key => $value) {


			$array[$key] = array(
				'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
				'nome' => $value['nome'],
				'servico' => $value->servico['nome'],
				'preco' => number_format($value['preco'], 2, ',', ' '),
				'fabricante' => $value['fabricante']
			);
		}

		return View('produtos')->with(array('itens' => $array, 'servicos' => Servicos::get()));

	}

	public function criar_produto(Request $request) {
		
		return $this->validar_produto($request);

	}

	private function validar_produto($request){

		$validator = Validator::make(
            [
                'nome' => $request['nome'],
                'fabricante' => $request['fabricante'],
                'descricao' => $request['descricao'],
                'preco' => $request['preco'],
                'servico' => $request['servico']
            ],
            [
                'nome' => 'required',
                'fabricante' => 'required',
                'descricao' => 'required',
                'preco' => 'required',
                'servico' => 'required',
            ]
        );

        if (count($validator->errors()->all()) == 0) {

        	DB::beginTransaction();

        	try {

        		$produto = New Produtos;

        		$produto->fill( 
        			array(
	        			'nome' => $request['nome'],
		                'fabricante' => $request['fabricante'],
		                'descricao' => $request['descricao'],
		                'preco' => floatval(str_replace(',', '.', str_replace('.', '', $request['preco']))),
		                'servico_id' => $request['servico']
		            )
        		);

        		$produto->save();

        		DB::commit();

        		Session::flash('retorno', '200');
        		
        	} catch (Exception $e) {

        		DB::rollback();

        		Session::flash('retorno', '500');
        		
        	}

        } else {
        	
        	Session::flash('retorno', '501');

        }

        return redirect('/produtos');

	}

	public function busca(){

		if (isset($_GET['nome'])) {
			
			$array = array();
			$conditions = array();

			if(!empty($_GET['nome'])){
			 	array_push($conditions, array('nome', 'like', '%'.$_GET['nome'].'%'));
			}

			if(!empty($_GET['fabricante'])){
			 	array_push($conditions, array('fabricante', 'like', '%'.$_GET['fabricante'].'%'));
			}

			$produtos = Produtos::with('servico')->where($conditions)->get();

			foreach ($produtos as $key => $value) {

				$array[$key] = array(
					'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
					'nome' => $value['nome'],
					'servico' => $value->servico['nome'],
					'preco' => number_format($value['preco'], 2, ',', ' '),
					'fabricante' => $value['fabricante']
				);

			}

			return View('produtos')->with(array('itens' => $array, 'servicos' => Servicos::get()));

		} else {
			return redirect('/produtos');
		}

	}


}
