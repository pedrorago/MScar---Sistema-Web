<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientesCarros extends Model {

    protected $table = 'clientes_carros';

    protected $fillable = [
        'id', 
        'cliente_id',
        'modelo_id',
        'placa',
        'n_chassis',
        'km',
        'cor',
        'tipo_combustivel_id',
        'ano_modelo',
        'ano_fabricacao',
        'created_at',
        'updated_at'
    ];
    
    public function modelo() {
        return $this->belongsTo(CarrosModelos::class);
    }

}
