<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class VeiculoAno extends Model
{
    protected $table = 'fp_ano';
    protected $fillable = [
        'codigo_modelo',
        'codigo_fipe',
        'ano',
        'combustivel',
        'valor',

    ];

    public function veiculoModelo(){
        return $this->hasOne(VeiculoModelo::class);

    }
}
