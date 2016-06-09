<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
	
	protected $table = 'users';
	protected $primaryKey = 'user_id';
	protected $fillable =  ['firstname', 'lastname', 'email', 'password', 'birth_date', 'school_name', 'active_code', 'created_at', 'updated_at'];
	
}

