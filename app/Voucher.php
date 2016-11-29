<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    //
    protected $fillable = [
        'code', 'is_use', 'date_use','expiration_date','user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
