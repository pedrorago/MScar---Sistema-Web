<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use DB;
use Auth;
use Session;
use Mail;
use Validator;
use App\Usuario;

class UsuarioController extends Controller {

    public function editar(Request $request){
        return $this->validate_edit($request);
    }
    
    private function validate_edit($request){
        
        $usuario = null;
        
        if(!empty($request->input('nome')) || !empty($request->input('senha'))){
            
            $usuario = Db::table('usuarios')->where('email', '=', $request['email'])->first();
            
            
            if (!empty($qry)) {
                $check_ativo = $usuario->status;
                
                if ($check_ativo == 1) {
                    
                    try {
                             
                        $usuario->nome = $request->input('nome');
                        $usuario->password = $request->input('senha');
                        $usuario->updated_at = date("d-m-Y H:i:s");
                        
                        
                        if ($usuario->save()) {
                            $status = 200;
                        } else {
                            $status = 501;
                        }

                    } catch (Exception $e) {
                        $status = 500;
                    }

                } else {
                    $status = 503;
                }
                
            }else{
                 $status = 501;
            }
            
        }else{
            $status = 502;
        }
        
    }


}