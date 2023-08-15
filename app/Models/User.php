<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject {
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array( 'first_name', 'last_name', 'password', 'email', 'phone_number', 'address', 'gender', 'role_id', 'profile_picture', 'status' );

    public function properties()
 {
        return $this->hasMany( Property::class, 'user_id' );
    }

    /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
    * Return a key value array, containing any custom claims to be added to the JWT.
    *
    * @return array
    */

    public function getJWTCustomClaims() {
        return [];
    }

}

