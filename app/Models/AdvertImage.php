<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertImage extends Model
{

    protected $fillable = [
        'advert_id',
        'extension',
        'capa'


    ];

    public function advertimage(){
        return $this->belongsTo(Advert::class);

    }

    public function imagemDestaque($query){
        return $query->where('destaque',1);
    }

}
