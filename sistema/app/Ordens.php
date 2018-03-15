<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordens extends Model {

    protected $table = 'ordens_servico';

    protected $fillable = [
        'id', 
        'cliente_id',
        'modelo_id',
        'cliente_carro_id',
        'usuario_id',
        'acessorio_antena',
        'acessorio_gps',
        'acessorio_carregador_celular',
        'acessorio_radio',
        'acessorio_documentos',
        'acessorio_calota',
        'acessorio_manual',
        'acessorio_estepe',
        'acessorio_pertences',
        'previsao_entrega',
        'status_pedido',
        'status_orcamento',
        'status_estoque',
        'status_processamento',
        'created_at',
        'updated_at'
    ];

    public function cliente() {
        return $this->belongsTo(Clientes::class);
    }

    public function clienteCarro() {
        return $this->belongsTo(ClientesCarros::class);
    }

}
