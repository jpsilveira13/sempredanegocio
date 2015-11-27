<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{

    protected $fillable = [
        'name',


    ];


    public function adverts(){

        return $this->belongsToMany(Advert::class);
    }
}
