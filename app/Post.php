<?php

namespace sempredanegocio;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = [
        'categoria',
        'subcategoria',
        'apartamento_type',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'tipo_moradia',
        'numero_quarto',
        'numero_garagem',
        'numero_suite',
        'area_construida',
        'valor_condominio',
        'valor_iptu',
        'caracteristicas',
        'anuncio_titulo',
        'anuncio_descricao',
        'anuncio_image',

    ];



}
