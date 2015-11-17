<?php

namespace sempredanegocio;

use Illuminate\Database\Eloquent\Model;

class AnuncioGeral extends Model
{
    protected $table = 'anuncio_gerais';

    protected $fillable = [

        'nome',
        'subcategoria_id'

    ];


    public function anuncioGeral(){
        return $this->hasMany('sempredanegocio\AnuncioSubcategoria','subcategoria_id', 'id');

    }

    public function anuncioTotal(){
        return $this->belongsTo('sempredanegocio\Anuncio');

    }

}
