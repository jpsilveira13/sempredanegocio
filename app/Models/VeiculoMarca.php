<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class VeiculoMarca extends Model
{
    protected $table = 'fp_marca';
    protected $fillable = [
        'codigo_marca',
        'marca',
        'tipo',
    ];

    public function veiculoMarcaModelo(){
        return $this->hasMany(VeiculoModelo::class);

    }


}
