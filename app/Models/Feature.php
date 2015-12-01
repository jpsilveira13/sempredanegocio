<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = "features";
    public function adverts(){
        return $this->belongsToMany(Advert::class);

    }
}
