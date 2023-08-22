<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{

    protected $table = 'facilities';
    public $timestamps = true;
    protected $fillable = array('facility_name','distance','property_id');

}
