<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;


class Advert extends Model
{
    protected $table = "adverts";

    protected $fillable = [
        'user_id',
        'subcategories_id',
        'tipo_anuncio',
        'origem',
        'origem_identificacao',
        'status',
        'estado',
        'status',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'anuncio_titulo',
        'anuncio_descricao',
        'preco',
        'url_anuncio',
        'active',
        'advert_count',
        'destaque',
        'confirm',

    ];

    public function advertImovel(){
        return $this->hasOne(AdvertImovel::class,'advert_id','id');
    }

   public function advertVeiculo(){
       return $this->hasOne(AdvertVeiculo::class);

   }
    public function images(){

        return $this->hasMany(AdvertImage::class,'advert_id','id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategories_id','id');

    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');

    }

    public function features(){
        return $this->belongsToMany(Feature::class);

    }

    public function advertMessage(){
        return $this->belongsTo(AdvertMessage::class);

    }
    public function cidades(){
        return $this->hasMany(Advert::class);

    }
}
