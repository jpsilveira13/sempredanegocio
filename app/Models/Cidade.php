<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{

    protected $fillable = [
        'nome',
        'uf',
    ];

}
