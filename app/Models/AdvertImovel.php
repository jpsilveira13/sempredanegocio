<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertImovel extends Model
{
    protected $table = "advert_imovel";
    protected $fillable = [
        'advert_id',
        'category_id',
        'numero_quarto',
        'numero_garagem',
        'numero_banheiro',
        'area_construida',
        'valor_condominio',
        'valor_iptu',
        'acomodacoes'

    ];


    public function advertImo(){
        return $this->belongsTo(Advert::class);

    }
}
