<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertMessage extends Model
{

    protected $table = 'adverts_message';
    protected $fillable = [
        'id_user',
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
        'visto'
    ];

    public function messageAdvert(){
        return $this->hasMany(Advert::class);

    }

    public function messageUser(){
        return $this->belongsTo(User::class,'id','id_user');
    }
}
