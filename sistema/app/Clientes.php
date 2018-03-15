<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model {

    protected $table = 'clientes';

    protected $fillable = [
        'id', 
        'nome',
        'email',
        'tipo_pessoa',
        'cpf',
        'cnpj',
        'rg',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'telefone_1',
        'telefone_2',
        'telefone_3',
        'data_nascimento_dia',
        'data_nascimento_mes',
        'data_nascimento_ano',
        'como_conheceu',
        'created_at',
        'updated_at'
    ];

    public function carros() {
        return $this->hasOne(ClientesCarros::class);
    }

}
