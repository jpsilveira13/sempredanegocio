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
        'tel_count',
        'destaque',
        'confirm',

    ];

    public function advertImovel(){
        return $this->hasOne(AdvertImovel::class,'advert_id','id');
    }

   public function advertVeiculo(){
       return $this->hasOne(AdvertVeiculo::class,'advert_id','id');

   }
    public function images(){

        return $this->hasMany(AdvertImage::class,'advert_id','id');
    }

    public function imagecapa(){

        return $this->hasOne(ImageCape::class,'advert_id','id');
    }

    public function getImagemDestaque($id){
        return AdvertImage::where('advert_id',$id)->where('capa',1);
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
