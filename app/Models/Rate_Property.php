<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate_Property extends Model 
{

    protected $table = 'rate_property';
    public $timestamps = true;
    protected $fillable = array('proprty_id', 'comment');

}