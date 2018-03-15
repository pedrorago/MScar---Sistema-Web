<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicos extends Model {

    protected $table = 'servicos';

    protected $fillable = [
        'id', 
        'servico_tipo_id',
        'modelo_id',
        'nome',
        'preco',
        'estimativa_hora',
        'estimativa_minuto',
        'manutencao',
        'garantia',
        'created_at',
        'updated_at'
    ];

    public function tipo() {
        return $this->belongsTo(ServicosTipos::class, 'servico_tipo_id');
    }

}
