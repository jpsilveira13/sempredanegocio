<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategories';
    protected $fillable = [
        'category_id',
        'name',
    ];


    public function category(){
        return $this->belongsTo(Category::class);

    }

    public function features(){
        return $this->hasMany(Feature::class);

    }

    public function advertCategory(){
        return $this->hasMany(AdvertCategory::class);

    }

    public function advert(){
        return $this->hasMany(Advert::class);

    }



}
