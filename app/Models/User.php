<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('first_name', 'last_name', 'password', 'email', 'phone_number', 'address', 'gender', 'role', 'profile_picture', 'status');

    public function ptoperties()
    {
        return $this->hasMany(Property::class);
    }
}
