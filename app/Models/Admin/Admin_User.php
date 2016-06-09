<?php

namespace App\Models\Admin;

use App\Models\UserModel;

class Admin_User extends UserModel
{
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
