<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class VeiculoModelo extends Model{
    protected $table = 'fp_modelo';
    protected $fillable = [
        'codigo_marca',
        'codigo_fipe',
        'modelo',
    ];

    public function veiculoAno(){
        return $this->hasMany(VeiculoAno::class);

    }
    public function veiculoMarca(){
        return $this->belongsTo(VeiculoMarca::class);

    }
}
