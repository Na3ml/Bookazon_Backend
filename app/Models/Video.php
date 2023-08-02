<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model 
{

    protected $table = 'videos';
    public $timestamps = true;
    protected $fillable = array('video_id', 'caption', 'video_path', 'property_id');

}