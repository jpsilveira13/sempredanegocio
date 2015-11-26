<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertCategory extends Model
{
    protected $table = 'adverts_categories';
    protected $fillable = [
        'name',


    ];

    public function subcategoryAdvert(){
        return $this->belongsTo(SubCategory::class);

    }



}
