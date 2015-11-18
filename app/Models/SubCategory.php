<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $fillable = [
        'nome',


    ];

    public function category(){
        return $this->belongsTo(Category::class);

    }


}
