<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Provider extends Model {
    use HasFactory;

    protected $fillable = [ 'provider', 'provider_id', 'user_id', 'avatar' ];
    protected $hidden = [ 'created_at', 'updated_at' ];

    public function user() {
        return $this->belongsTo( User::class );
    }
}
