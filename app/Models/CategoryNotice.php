<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryNotice extends Model
{
    protected $table = "category_notices";
    protected $fillable = [
        'nome',
        'url_site'
    ];
}
