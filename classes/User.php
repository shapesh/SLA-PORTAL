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

        'first_name','last_name', 'email','phone_number', 'password','user_image', 'confirm_reg'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [

        'password', 'remember_token',

    ];

    /*
    * Get Todo of User
    *
    */

    public function token()

    {
        return $this->hasOne('Token');

    }

}
