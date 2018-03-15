<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable {
    
    use Notifiable;

    protected $fillable = [
        'nome', 'role_id', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role() {
        return $this->belongsTo(Roles::class);
    }

}
