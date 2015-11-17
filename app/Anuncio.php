<?php

namespace sempredanegocio;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = "anuncios";
    protected $fillable = [
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'numero_quarto',
        'numero_garagem',
        'numero_suite',
        'area_construida',
        'valor_condominio',
        'valor_iptu',
        'anuncio_titulo',
        'anuncio_descricao',
        'preco',
        'valor_iptu',
        'caracteristicas',
        'anuncio_titulo',
        'anuncio_descricao',
        'anuncio_image',
        //'anuncio_geral_id',
        //'user_id'
    ];

   /* public function users(){
        return $this->belongsTo('sempredanegocio\User','user_id', 'id');

    } */


    public function images(){
        return $this->hasMany('sempredanegocio\AnuncioImages');

    }

    public function caracteristicas(){
        return $this->hasMany('sempredanegocio\AnuncioCaracteristica');

    }

    public function anuncioGeral(){
        return $this->hasMany('sempredanegocio\AnuncioGeral');

    }




}
