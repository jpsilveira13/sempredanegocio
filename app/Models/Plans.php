<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model{

    protected $table = 'plans';

    protected $fillable = [
        'name',
        'description',
        'value',
        'permonth',
        'plan_priority',
        'typeuser_id'

    ];

    public function typeuser(){
        return $this->hasOne(TypeUser::class);

    }

    public function plans(){
        return $this->hasMany(Payments::class);

    }
}
