<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = "features";
    protected $fillable = [
        'subcategory_id',

    ];
    public function adverts(){
        return $this->belongsToMany(Advert::class);

    }

    public function subcategories(){
        return $this->belongsTo(SubCategory::class);
    }

}
