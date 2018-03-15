<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Auth;
use Hash;
use DB;
use Session;
use Validator;

class PerfisController extends Controller {

	public function __construct() { 

		$this->middleware(function ($request, $next) {
			
			$this->user= Auth::user();

			if (Auth::user()->role_id == 1) {
				return $next($request);
			} else {
				return redirect('/');
			}

		});

    }

	public function perfis() {
		
		$array = array();

		$usuarios = Usuario::where('role_id', '!=', 1)->where('role_id', '!=', 5)->with('role')->orderBy('id', 'desc')->get();

		foreach ($usuarios as $key => $value) {

			$array[$key] = array(
				'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
				'nome' => $value['nome'],
				'telefone' => '(81) 93287164',
				'tipo_acesso' => $value->role['nome'],
				'email' => $value['email']
			);
		}


		return View('perfis')->with(array('itens' => $array));

	}

	public function criar_perfil(Request $request) {
		
		return $this->validar_perfil($request);

	}

	private function validar_perfil($request){

		$validator = Validator::make(
            [
                'nome' => $request['nome'],
                'tipo_acesso' => $request['tipo'],
                'telefone' => $request['telefone'],
                'email' => $request['email'],
                'senha' => $request['senha']
            ],
            [
                'nome' => 'required',
                'tipo_acesso' => 'required',
                'telefone' => 'required',
                'email' => 'required',
                'senha' => 'required',
            ]
        );

        if (count($validator->errors()->all()) == 0) {

        	DB::beginTransaction();

        	try {

        		$usuario = New Usuario;

        		$usuario->fill( 
        			array(
	        			'nome' => $request['nome'],
		                'role_id' => $request['tipo'],
		                'email' => $request['email'],
		                'password' => Hash::make($request['senha']),
		                'telefone' => $request['telefone'],
		                'token' => Hash::make(date('Y-m-d h:i:s'))
		            )
        		);

        		$usuario->save();

        		DB::commit();

        		Session::flash('retorno', '200');
        		
        	} catch (Exception $e) {

        		Session::flash('retorno', '500');

        		DB::rollback();
        		
        	}

        } else {

        	Session::flash('retorno', '501');
        }

        return redirect('/perfis');

	}

	public function remover_perfil($id){

		if (is_numeric($id) and !empty($id)) {
			
			$busca = Usuario::where('id', $id)->first();

			if (!empty($busca)) {
				
				DB::beginTransaction();

				try {

					Usuario::where('id', $id)->delete();

					$status = 200;

					DB::commit();
					
				} catch (Exception $e) {

					DB::rollback();

					$status = 500; // generico
					
				}

			} else {
				$status = 501; // n achou usuario
			}

		} else {
			$status = 500; // generico
		}

		return $status;

	}

	public function busca(){

		if (isset($_GET['tipo']) || isset($_GET['nome'])) {
			
			$array = array();
			$conditions = array();

			if(!empty($_GET['nome'])){
			 	array_push($conditions, array('nome', 'like', '%'.$_GET['nome'].'%'));
			}

			if (!empty($_GET['tipo'])) {
				array_push($conditions, array('role_id', $_GET['tipo']));
			}

			$usuarios = Usuario::where($conditions)->with('role')->get();

			foreach ($usuarios as $key => $value) {
				
				$array[$key] = array(
					'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
					'nome' => $value['nome'],
					'telefone' => '(81) 93287164',
					'tipo_acesso' => $value->role['nome'],
					'email' => $value['email']
				);

			}

			return View('perfis')->with(array('itens' => $array));

		} else {
			return redirect('/perfis');
		}

	}


}
