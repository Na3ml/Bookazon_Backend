<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'state_id', 'name', 'status'
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function rooms(){
        return $this->hasManyThrough(Room::class,Property::class,'city','property_id');
    }

//    public function rooms(){
//        return $this->hasManyThrough(Room::class,Property::class,'city','property_id');
//    }
}
