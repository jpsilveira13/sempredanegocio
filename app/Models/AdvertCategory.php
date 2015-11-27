<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertCategory extends Model
{
    protected $table = 'adverts_categories';
    protected $fillable = [
        'subcategory_id',
        'name',


    ];

    public function subcategoryAdvert(){
        return $this->belongsTo(SubCategory::class);

    }

    public function advert(){
        return $this->hasMany(Advert::class);

    }


}
