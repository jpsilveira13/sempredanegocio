<?php

namespace sempredanegocio;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model{

    private $anuncioModel;

    public function __construct(Anuncio $anuncioModel){
        $this->anuncioModel = $anuncioModel;


    }

}
