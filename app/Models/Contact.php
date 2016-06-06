<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contatos';
    protected $fillable = [
        'name',
        'email',
        'estado',
        'cidade',
        'telefone',
        'assunto'

    ];
}
