<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;

class AppServiceProvider extends ServiceProvider {
    
    public function boot() {
        
        error_reporting(0);

        //echo Hash::make('teste123');

        session_start();

        if ($_SERVER['SERVER_NAME'] == "mscar") {
            $url_base = config('app.url');
        } else {
            $url_base = config('app.url_oficial');
        }

        view()->composer('*', function ($view) {

            if (Auth::check() == true) {

                $role = Db::table('roles')->where('id', '=', Auth::user()->role_id)->first();

                $tipo_usuario = $role->nome;

            } else {
                $tipo_usuario = null;
            }

            view()->share(array(
                //'url_base' => $url_base,
                'tipo_usuario' => $tipo_usuario
            ));

        });

        view()->share(array(
            'url_base' => $url_base,
        ));

    }


    public function register() {
        //
    }
}
