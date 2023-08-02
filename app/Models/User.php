<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model 
{

    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('first_name', 'last_name', 'password', 'email', 'phone_number', 'address', 'gender', 'role', 'profile_picture', 'status');

}