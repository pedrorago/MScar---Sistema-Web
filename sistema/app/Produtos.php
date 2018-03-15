<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model {

    protected $table = 'produtos';

    protected $fillable = [
        'id', 
        'servico_id',
        'nome',
        'fabricante',
        'preco',
        'descricao',
        'created_at',
        'updated_at'
    ];

    public function servico() {
        return $this->belongsTo(Servicos::class);
    }

}
