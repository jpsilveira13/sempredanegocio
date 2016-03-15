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
        'estado',
        'status',
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
        'url_anuncio',
        'active'

    ];

    public function images(){

        return $this->hasMany('sempredanegocio\Models\AdvertImage');
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





}
