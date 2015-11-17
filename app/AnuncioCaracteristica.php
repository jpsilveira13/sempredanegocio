<?php

namespace sempredanegocio;

use Illuminate\Database\Eloquent\Model;

class AnuncioCaracteristica extends Model{

    protected $table = 'anuncio_caracteristicas';

    protected $fillable = [
        'caracteristicas',
        'anuncio_id'

    ];

    public function anuncioCaract(){
        return $this->belongsTo('sempredanegocio\Anuncio','anuncio_id','id');

    }


}
