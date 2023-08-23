<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $appends = ['full_name'];
    public $timestamps = true;
    protected $fillable = array('first_name', 'last_name', 'password', 'email', 'phone_number', 'address', 'gender', 'role_id', 'profile_picture', 'status');

    public function properties()
    {
        return $this->hasMany(Property::class, 'user_id');
    }

    public function providers()
    {
        return $this->hasMany(Provider::class, 'user_id', 'id');
    }

    public function rooms(){
        return $this->belongsToMany(Room::class,'orders','user_id','room_id');
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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getProfilePictureAttribute($value)
    {
        return asset('image') . '/' . $value;
    }

    public function getFirstNameAttribute($value)
    {
        return ucwords($value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    //    public function profilePicture(): Attribute
    // {
    //        return Attribute::make(
    //            get: fn() => asset( 'image/' ).$this->profile_picture
    // );
    //    }

}

