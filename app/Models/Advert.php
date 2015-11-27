<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{

    protected $fillable = [
        'user_id',
        'adverts_categories_id',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'numero_quarto',
        'numero_garagem',
        'numero_suite',
        'area_construida',
        'valor_condominio',
        'valor_iptu',
        'anuncio_titulo',
        'anuncio_descricao',
        'preco',

    ];

    public function images(){

        return $this->hasMany(FeatureImage::class);
    }

    public function advertcategory(){
        return $this->belongsTo(AdvertCategory::class);

    }

    public function user(){
        return $this->hasOne(User::class);

    }

    public function features(){
        return $this->belongsToMany(Feature::class,FeatureAdvert::class);

    }







}
