<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    
     use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','parent'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function vouchers() {
        return $this->hasMany('App\Voucher');
    }

    public function available_vouchers() {
      /*  reference http://stackoverflow.com/questions/18520209/how-to-access-model-hasmany-relation-with-where-condition*/
        return $this->vouchers()->where('is_use','=', 0);
    }
}
