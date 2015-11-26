<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name',


    ];

    public function subcategory(){
        return $this->hasMany(SubCategory::class);

    }



}
