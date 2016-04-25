<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertVeiculo extends Model
{
    protected $table = "advert_carro";
    protected $fillable = [
        'advert_id',
        'category_id',
        'ano',
        'km',
        'cor',
        'portas',
        'cambio',
        'combustivel',
        'placa',
        'opcionais',
        'marca',
        'modelo'

    ];


    public function advertVeiculo(){
        return $this->belongsTo(Advert::class);

    }
}
