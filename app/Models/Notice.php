<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = "notice";

    protected $fillable = [
        'titulo',
        'descricao',
        'visitas',
        'ativa',
        'url_image',
        'url_site',
        'notice_category_id',
        'user_id'
    ];

    public function userNotice(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function categoryNotice(){
        return $this->belongsTo(CategoryNotice::class);
    }
}
