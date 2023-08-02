<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Properties_Facilities extends Model 
{

    protected $table = 'properties_facilities';
    public $timestamps = true;
    protected $fillable = array('facility_id');

}