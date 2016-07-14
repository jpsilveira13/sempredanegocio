<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class ImageCape extends Model
{

    protected $table = 'imagem_capa';
    protected $fillable = [
        'advert_id',
        'extension',


    ];

    public function advertcapaimage(){
        return $this->belongsTo(Advert::class);

    }

}
