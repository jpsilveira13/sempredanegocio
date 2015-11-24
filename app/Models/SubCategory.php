<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategories';
    protected $fillable = [
        'name',


    ];

    public function category(){
        return $this->belongsTo(Category::class);

    }


}
