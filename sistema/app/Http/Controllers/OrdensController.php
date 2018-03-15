<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ordens;
use App\Clientes;
use App\ClientesCarros;
use App\CarrosModelos;
use App\OrdensServicoServicos;
use App\OrdensCheckSeguranca;
use DB;
use Validator;
use Session;
use View;

class OrdensController extends Controller {

	public function ordens() {

		$array['estoque'] = array();

		$array['processamento'] = array();

		$array['entregue'] = array();

		$ordens = Ordens::with(array('cliente', 'clienteCarro'))->orderBy('id', 'desc')->get();

		foreach ($ordens as $key => $value) {

			if ($value['status_estoque'] != 3) {
				$area = 'estoque';
			} else if ($value['status_processamento'] <= 1) {
				$area = 'processamento';
			} else {
				$area = 'entregue';
			}

			$array[$area][$key] = array(
				'id' => $value['id'],
				'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
				'cliente' => $value->cliente['nome'],
				'cliente_id' => $value->cliente['id'],
				'modelo' => $value->clienteCarro['modelo']['nome'],
				'placa' => $value->clienteCarro['placa'],
				'previsao' => date('d/m/Y', strtotime($value['previsao_entrega'])),
				'status' => $value['status_processamento']
			);
			
		}

		$array['estoque'] = array_values($array['estoque']);
		$array['processamento'] = array_values($array['processamento']);
		$array['entregue'] = array_values($array['entregue']);

		return View('ordensServico')->with(array(
			'itens' => $array,
			'clientes' => Clientes::get(),
			'carros' => CarrosModelos::get()
		));
	
	}

	public function criar_ordem(Request $request){

		$this->validar_ordem($request);
	}

	private function validar_ordem($request){

		$validator = Validator::make(
            [
                'cliente' => $request['cliente'],
                'carro' => $request['carro'],
                'mecanico' => $request['mecanico'],
                'previsao' => $request['previsao']
            ],
            [
                'cliente' => 'required',
                'carro' => 'required',
                'mecanico' => 'required',
                'previsao' => 'required'
            ]
        );

        if (count($validator->errors()->all()) == 0) {

        	DB::beginTransaction();

        	try {

        		// cria ordem.. 

        		$ordem = New Ordens;

        		$ordem->fill( 
        			array(
	        			'cliente_id' => $request['cliente'],
		                'cliente_carro_id' => $request['carro'],
		                'modelo_id' => $request['carro'], // ver com calma
		                'usuario_id' => $request['mecanico'],
		                'previsao_entrega' => $request['previsao'],
		                'endereco' => $request['endereco'],
		                'telefone_1' => $request['telefone_ddd'].'-'.$request['telefone'],
		                'acessorio_antena' => $this->converter_checkbox($request['acessorio_antena']),
		                'acessorio_gps' => $this->converter_checkbox($request['acessorio_gps']),
		                'acessorio_carregador_celular' => $this->converter_checkbox($request['acessorio_carregador_celular']),
		                'acessorio_radio' => $this->converter_checkbox($request['acessorio_radio']),
		                'acessorio_documentos' => $this->converter_checkbox($request['acessorio_documentos']),
		                'acessorio_calota' => $this->converter_checkbox($request['acessorio_calota']),
		                'acessorio_manual' => $this->converter_checkbox($request['acessorio_manual']),
		                'acessorio_estepe' => $this->converter_checkbox($request['acessorio_estepe']),
		                'acessorio_pertences' => $this->converter_checkbox($request['acessorio_pertences']),
		                'status_pedido' => 0,
		                'status_orcamento' => 0,
		                'status_estoque' => 0,
		                'status_processamento' => 0,
		                'created_at' => date('Y-m-d h:i:s'),
		                'updated_at' => date('Y-m-d h:i:s')
		            )
        		);

        		$ordem->save();

        		// cria serviços... cria check seg.

        		$cseguranca = New OrdensCheckSeguranca;

        		$i = 1;

        		$array = array();

        		$array['ordem_servico_id'] = $ordem->id;

        		while ($i <= 20) {
        			$array['item_'.$i] = $this->cseguranca_checkbox($request['item_'.$i]);

        			$i++;

        		}

        		$cseguranca->fill($array);

        		$cseguranca->save();

        		// cria serviços... // criar serviços daqui a pouco
        		
        		// cria fotos..

        		DB::commit();

        		$status = 200;

        		//return redirect('/pedidos');
        		
        	} catch (Exception $e) {

        		DB::rollback();

        		$status = 500;
        		
        	}

        } else {
        	$status = 501;
        }

        echo $status;

        return $status;

	}

	private function converter_checkbox($value){
		if (isset($value) and !empty($value)) {
			
			if ($value == 'on') {
				$value = 1;
			} else {
				$value = 0;
			}

		} else {
			$value = 0;
		}

		return $value;

	}

	private function cseguranca_checkbox($value){
		if (isset($value) and !empty($value)) {
			
			if ($value == 'on') {
				$value = 1;
			} else {
				$value = 0;
			}

		} else {
			$value = null;
		}

		return $value;

	}

	public function atualizar_entregues(){

		if (!empty($_GET['servico']) and !empty($_GET['status'])) {
			
			$status = strtolower($_GET['status']);

			if ($status == 'em aguardo') {
				$status = 3;
			} else {
				$status = 4; // entregue
			}

			DB::beginTransaction();

        	try {

        		$ordem = New Ordens;

        		$ordem->where('id', $_GET['servico'])->update(array('status_processamento' => $status)); 

        		DB::commit();

        		$retorno = 200;
        		
        	} catch (Exception $e) {

        		DB::rollback();

        		$retorno = 500;
        		
        	}

		} else {
			$retorno = 500;
		}

		return $retorno;

	}

	public function atualizar_processamento(){

		if (!empty($_GET['servico']) and !empty($_GET['status'])) {
			
			$status = strtolower($_GET['status']);

			if ($status == 'em andamento') {
				$status = 1;
			} else if($status == 'atrasado'){
				$status = 2;
			} else{
				$status = 0;
			}

			DB::beginTransaction();

        	try {

        		$ordem = New Ordens;

        		$ordem->where('id', $_GET['servico'])->update(array('status_processamento' => $status)); 

        		DB::commit();

        		$retorno = 200;
        		
        	} catch (Exception $e) {

        		DB::rollback();

        		$retorno = 500;
        		
        	}

		} else {
			$retorno = 500;
		}

		return $retorno;

	}

	public function concluir_ordem(Request $request){

		$cliente_id =  $request['cliente_id'];

		$cliente = Clientes::where('id', $cliente_id)->first();

		DB::beginTransaction();

        	try {

        		$ordem = New Ordens;

        		$ordem->where('id', $request['ordem_id'])->update(array('status_processamento' => 3)); 

        		DB::commit();

        		return redirect('/ordens');
        		
        	} catch (Exception $e) {

        		DB::rollback();

        		//$retorno = 500;
        		
        	}

		//$this->envio_whatsapp(str_replace('-', '', $cliente['telefone_1']), $request);

	}

	private function envio_email(){
		// aguardando
	}

	private function envio_whatsapp($telefone, $request){

		$headers = array(
			'Content-Type: application/json',
		);

		$url = 'https://api.whatsapp.com/send?phone=5581995173706';

		$ch = curl_init($url);

		//curl_setopt($ch, CURLOPT_POST, 1);

		$response = curl_exec($ch);

		var_dump($response);

		curl_close($ch);

	}

	public function ordens_estoque() {

		$array = array();

		$ordens = Ordens::with(array('cliente', 'clienteCarro'))->orderBy('id', 'desc')->get();

		foreach ($ordens as $key => $value) {

			if ($value['status_estoque'] < 3) {
				
				$array[$key] = array(
					'id' => $value['id'],
					'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
					'cliente' => $value->cliente['nome'],
					'cliente_id' => $value->cliente['id'],
					'modelo' => $value->clienteCarro['modelo']['nome'],
					'placa' => $value->clienteCarro['placa'],
					'previsao' => date('d/m/Y', strtotime($value['previsao_entrega'])),
					'status' => $value['status_estoque']
				);

			}
			
		}

		return View('estoque')->with(array(
			'itens' => array_values($array),
			'clientes' => Clientes::get(),
			'carros' => CarrosModelos::get()
		));
	
	}

	public function ordens_estoque_busca(){

		$conditions = array();

		$array = array();

		if(!empty($_GET['numero'])){
			array_push($conditions, array('id', 'like', '%'.intval($_GET['numero']).'%'));
		}

		if (!empty($_GET['cliente'])) {
			array_push($conditions, array('cliente_id', $_GET['cliente']));
		}

		if (!empty($_GET['carro'])) {
			array_push($conditions, array('modelo_id', $_GET['carro']));
		}

		$ordens = Ordens::where($conditions)->with(array('cliente', 'clienteCarro'))->orderBy('id', 'desc')->get();

		foreach ($ordens as $key => $value) {

			$array[$key] = array(
				'id' => $value['id'],
				'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
				'cliente' => $value->cliente['nome'],
				'modelo' => $value->clienteCarro['modelo']['nome'],
				'placa' => $value->clienteCarro['placa'],
				'previsao' => date('d/m/Y', strtotime($value['previsao_entrega'])),
				'status' => $value['status_estoque']
			);

		}

		return View('estoque')->with(array(
			'itens' => $array,
			'clientes' => Clientes::get(),
			'carros' => CarrosModelos::get()
		));

	}

	public function atualizar_estoque(){

		if (!empty($_GET['servico']) and !empty($_GET['status'])) {
			
			$status = strtolower($_GET['status']);

			if ($status == 'em andamento') {
				$status = 1;
			} elseif ($status == 'atrasado') {
				$status = 2;
			} elseif ($status == 'feito') {
				$status = 3;
			} else {
				$status = 0; // em aguardo
			}

			DB::beginTransaction();

        	try {

        		$ordem = New Ordens;

        		$ordem->where('id', $_GET['servico'])->update(array('status_estoque' => $status, 'status_processamento' => 0)); 

        		DB::commit();

        		$retorno = 200;
        		
        	} catch (Exception $e) {

        		DB::rollback();

        		$retorno = 500;
        		
        	}

		} else {
			$retorno = 500;
		}

		return $retorno;

	}

	public function dados_ordem(){

		if (!empty($_GET['id'])) {

			$checklist = Ordens::where('id', $_GET['id'])->with(array('cliente', 'clienteCarro'))->first();

			$array['dados'] = array();

			$carro = $checklist->clienteCarro['modelo']['nome'].'|'.$checklist->clienteCarro['placa'];

			if (strlen($carro) > 28){

                $carro = substr($carro, 0 ,23);
                $carro = $carro."..."; 
                $carro = ucwords(mb_strtolower($carro, 'UTF-8'));
            } else {
                $carro = ucwords(mb_strtolower($carro, 'UTF-8'));
            }


			if (!empty($checklist)) {
				$array['dados'] = array(
					'id' => $checklist['id'],
					'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
					'cliente' => $checklist->cliente['nome'],
					'cliente_id' => $checklist->cliente['id'],
					'carro' => $carro,
					'modelo' => $checklist->clienteCarro['placa'],
					'placa' => $checklist->clienteCarro['placa'],
					'previsao' => date('d/m/Y', strtotime($checklist['previsao_entrega']))
				);
			}


			// trazer produtos

			$produtos = OrdensServicoServicos::with('produto')->where('ordem_servico_id', $checklist['id'])->get();

			foreach ($produtos as $key => $value) {

				if (!empty($value['servico_id'])) {
					
					$array['produtos'][$key] = array(
						'id' => $value['id'],
						'status' => $value['item_comprado'],
						'nome' => $value->produto['nome'],
					);

				}
			} 

			return $array;
		}

	}

	public function atualizar_status_produto(){

		if (!empty($_GET['id']) and !empty($_GET['status'])) {
			

			if ($_GET['status'] == 1) {
				$status_update = 0;
			} else {
				$status_update = 1;
			}

			DB::beginTransaction();

        	try {

        		$ordem_ss = New OrdensServicoServicos;

        		$ordem_ss->where('id', $_GET['id'])->update(array('item_comprado' => $status_update)); 

        		DB::commit();

        		$retorno = 200;
        		
        	} catch (Exception $e) {

        		DB::rollback();

        		$retorno = 500;
        		
        	}

		} else {
			$retorno = 500;
		}

		return $retorno;

	}

	public function ordens_busca(){

		$conditions = array();

		$array['estoque'] = array();

		$array['processamento'] = array();

		$array['entregue'] = array();

		if(!empty($_GET['numero'])){
			array_push($conditions, array('id', 'like', '%'.intval($_GET['numero']).'%'));
		}

		if (!empty($_GET['cliente'])) {
			array_push($conditions, array('cliente_id', $_GET['cliente']));
		}

		if (!empty($_GET['carro'])) {
			array_push($conditions, array('modelo_id', $_GET['carro']));
		}

		$ordens = Ordens::where($conditions)->with(array('cliente', 'clienteCarro'))->orderBy('id', 'desc')->get();

		foreach ($ordens as $key => $value) {

			if ($value['status_estoque'] != 3) {
				$area = 'estoque';
			} elseif ($value['status_processamento'] <= 2) {
				$area = 'processamento';
			} else {
				$area = 'entregue';
			}

			$array[$area][$key] = array(
				'id' => $value['id'],
				'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
				'cliente' => $value->cliente['nome'],
				'modelo' => $value->clienteCarro['modelo']['nome'],
				'placa' => $value->clienteCarro['placa'],
				'previsao' => date('d/m/Y', strtotime($value['previsao_entrega'])),
				'status' => $value['status_processamento']
			);

		}

		return View('ordensServico')->with(array(
			'itens' => $array,
			'clientes' => Clientes::get(),
			'carros' => CarrosModelos::get()
		));

	}

}
