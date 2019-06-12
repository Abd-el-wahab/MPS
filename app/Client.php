<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

        protected $fillable = [
        'usrename',
        'email',
        'password',
        'age',
        'credit_card'
    ];


    
    public function movie(){


        return $this->hasMany('App\Movie');
    }
}
