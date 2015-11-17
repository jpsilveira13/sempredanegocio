<?php

namespace sempredanegocio;

use Illuminate\Database\Eloquent\Model;

class AnuncioImages extends Model
{
    protected $table = "anuncio_images";

    protected  $fillable = [

        'src',
        'anuncio_id',

    ];

    public function anuncio(){
        return $this->belongsTo('sempredanegocio\Anuncio','anuncio_id','id');

    }
}
