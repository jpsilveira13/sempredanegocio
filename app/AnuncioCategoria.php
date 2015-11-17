<?php

namespace sempredanegocio;

use Illuminate\Database\Eloquent\Model;

class AnuncioCategoria extends Model
{
    protected $table = 'anuncio_categorias';

    protected $fillable = [
        'nome',


    ];
}
