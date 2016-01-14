<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $table = "adverts";

    protected $fillable = [
        'user_id',
        'advert_categories_id',
        'tipo_anuncio',
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
        'url_anuncio'

    ];

    public function images(){

        return $this->hasMany('sempredanegocio\Models\AdvertImage');
    }

    public function advertcategory(){
        return $this->belongsTo(AdvertCategory::class);

    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');

    }

    public function features(){
        return $this->belongsToMany(Feature::class);

    }


}
