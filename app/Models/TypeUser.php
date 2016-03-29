<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    protected $table = 'types_user';
    protected $fillable = [
        'position'

    ];

    public function plans(){
        return $this->hasMany(Plans::class);

    }
}
