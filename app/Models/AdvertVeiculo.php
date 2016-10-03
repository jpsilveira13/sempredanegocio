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
        'modelo',
        'leilao',
        'preco_fipe',
        'preco_leilao',
        'preco_min',
        'preco_max',
        'variancia'
    ];


    public function advertVeiculo(){
        return $this->belongsTo(Advert::class,'advert_id','id');

    }

    public function ativo(){
        return $this->where('leilao','>',0);
    }

    public function leilao(){
        return $this->hasMany(Leilao::class,'veiculo_id','id');
    }

}
