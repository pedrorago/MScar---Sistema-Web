<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCombustivel extends Model {

    protected $table = 'tipo_combustivel';

    protected $fillable = [
        'id', 'nome',
    ];

}