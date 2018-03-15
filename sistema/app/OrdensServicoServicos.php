<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdensServicoServicos extends Model {

    protected $table = 'ordens_servico_servicos';

    protected $fillable = [
        'id', 
        'servico_id',
        'item_comprado',
        'created_at',
        'updated_at'
    ];

    public function produto() {
        return $this->belongsTo(Produtos::class, 'servico_id');
    }

}
