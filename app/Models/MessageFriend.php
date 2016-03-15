<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class MessageFriend extends Model
{

    protected $table = 'friends_message';
    protected $fillable = [
        'user_id',
        'url_site',
        'nome_amigo',
        'email_amigo',
        'nome_anuncio',
        'email_anuncio',
        'assunto_anuncio'

    ];
}
