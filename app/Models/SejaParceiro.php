<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class SejaParceiro extends Model
{
    protected $table = 'parceiros';
    protected $fillable = [
        'name',
        'email',
        'estado',
        'cidade',
        'telefone',
        'assunto'

    ];
}
