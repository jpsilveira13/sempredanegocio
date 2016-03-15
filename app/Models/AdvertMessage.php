<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertMessage extends Model
{

    protected $table = 'adverts_message';
    protected $fillable = [
        'url_site',
        'nome_usuario',
        'email_usuario',
        'telefone_usuario',
        'nome',
        'email',
        'codigo_area',
        'telefone',
        'mensagem',
        'newsletter',

    ];
}
