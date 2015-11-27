<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureImage extends Model
{

    protected $fillable = [
        'features_id',
        'extension',


    ];

    public function advertimage(){
        return $this->belongsTo(Advert::class);

    }


}
