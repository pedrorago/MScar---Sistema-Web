<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
<<<<<<< HEAD
use App\Usuario;
=======
use App\Servicos;
use App\Usuario;
use App\Ordens;
>>>>>>> ff3f93327d5fa468bb305f5c3042b5b5a4de4f7a
use View;

class OrcamentoController extends Controller {

    public function nova_ordem() {

        return View::make('novaOrdem')->with(
            array(
                'mecanicos' => Usuario::where('role_id', 4)->get(),
                'clientes' => Clientes::get(),
                'servicos' => Servicos::get()
            )
        );

    }

    public function pedidos() {

        $array = array();

<<<<<<< HEAD
        return View::make('novaOrdem')->with(array(
            'clientes' => $array,
            'usuarios' => $this->getUsuariosMecanicos()
            ));
=======
        $ordens = Ordens::with(array('cliente', 'clienteCarro'))->where('status_pedido', 0)->orderBy('id', 'desc')->get();
>>>>>>> ff3f93327d5fa468bb305f5c3042b5b5a4de4f7a

        foreach ($ordens as $key => $value) {

            $array[$key] = array(
                'id' => $value['id'],
                'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
                'cliente' => $value->cliente['nome'],
                'cliente_id' => $value->cliente['id'],
                'modelo' => $value->clienteCarro['modelo']['nome'],
                'placa' => $value->clienteCarro['placa'],
                'previsao' => date('d/m/Y', strtotime($value['previsao_entrega'])),
                'status' => $value['status_pedido']
            );
            
        }

        return View('pedidos')->with(array(
            'itens' => $array
        ));
    
    }

    public function orcamentos() {
        
        $array = array();

        $ordens = Ordens::with(array('cliente', 'clienteCarro'))->where('status_pedido', 1)->where('status_orcamento', 0)->orderBy('id', 'desc')->get();

        foreach ($ordens as $key => $value) {

            $array[$key] = array(
                'id' => $value['id'],
                'numero' => str_pad($value['id'], 5, '0', STR_PAD_LEFT),
                'cliente' => $value->cliente['nome'],
                'cliente_id' => $value->cliente['id'],
                'modelo' => $value->clienteCarro['modelo']['nome'],
                'placa' => $value->clienteCarro['placa'],
                'previsao' => date('d/m/Y', strtotime($value['previsao_entrega'])),
                'status' => $value['status_orcamento']
            );
            
        }

        return View('orcamentos')->with(array(
            'itens' => $array
        ));

    }

    private function getUsuariosMecanicos(){

        $array = array();

        $usuarios = Usuario::where('role_id', '=', 4)->with('role')->orderBy('id','desc')->get();

        foreach ($usuarios as $key => $value) {
            $array[$key] = array(
                'id' => $value['id'],
                'nome' => $value['nome']
            );
        }

        return $array;

    }

}
