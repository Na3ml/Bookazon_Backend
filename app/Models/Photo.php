<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $table = 'photos';
    public $timestamps = true;
    protected $fillable = array('photo', 'property_id');
    public function getPhotoAttribute($value)
    {
        return url('dashboard/upload/property/multi_image') . '/' . $value;
    }
}
