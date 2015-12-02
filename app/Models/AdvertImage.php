<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertImage extends Model
{

    protected $fillable = [
        'advert_id',
        'extension',


    ];

    public function advertimage(){
        return $this->belongsTo(Advert::class);

    }


}
