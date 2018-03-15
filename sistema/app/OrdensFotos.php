<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdensFotos extends Model {

    protected $table = 'ordens_servico_fotos';

    protected $fillable = [
        'id', 
        'ordem_servico_id',
        'tipo',
        'imagem',
        'created_at',
        'updated_at'
    ];

}
