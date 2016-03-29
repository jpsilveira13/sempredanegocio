<?php

namespace sempredanegocio\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model{
    protected $table = 'payments';
    protected $fillable = [
        'plan_name',
        'plan_value',
        'liquide_value',
        'payment_terms_id',
        'plan_id',
        'user_id',
        'confirmed', // 0 = not processed, 1 = ok, 2 = canceled or not accepted
        'status_code', // 0 = not proccessed, 1, 2, 3.... pagseguro
        'transaction_id',


    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function plans(){
        return $this->belongsTo(Plans::class);

    }


}
