<?php

namespace sempredanegocio;

use Illuminate\Database\Eloquent\Model;

class AnuncioSubcategoria extends Model
{
    protected $table = 'anuncio_subcategorias';

    protected $fillable = [
        'nome',
        'categorias_id'

    ];


    public function categoria(){
        return $this->belongsTo('sempredanegocio\AnuncioCategoria','categorias_id', 'id');

    }
}
