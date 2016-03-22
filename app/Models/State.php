<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'state';
    protected $fillable = [
        'uf'
    ];
}
