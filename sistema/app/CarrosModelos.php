<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarrosModelos extends Model {

    protected $table = 'carros_modelos';

    protected $fillable = [
        'nome', 'id',
    ];

}
