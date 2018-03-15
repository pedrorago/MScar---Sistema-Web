<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicosTipos extends Model {

    protected $table = 'servicos_tipos';

    protected $fillable = [
        'id', 
        'nome',
        'created_at',
        'updated_at'
    ];

}
