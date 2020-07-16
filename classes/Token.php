<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent

{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [

        'token','user_id', 'token_expires'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    /*
    * Get Token of User
    *
    */

    public function user()

    {
        return $this->hasOne('User');

    }

}
