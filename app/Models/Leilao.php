<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Leilao extends Model
{
    protected $table = 'leilao';
    protected $fillable = [
        'numero_lance',
        'user_id',
        'veiculo_id',
        'valor',

    ];

    public function userleilao(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function advertleilao(){
        return $this->belongsTo(AdvertVeiculo::class,'veiculo_id','id');
    }


}
