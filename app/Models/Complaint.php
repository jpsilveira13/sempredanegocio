<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'complaints';
    protected $fillable = [
        'user_id',
        'url_site',
        'motivo',
        'descricao',
        'nome',
        'email'

    ];

}
