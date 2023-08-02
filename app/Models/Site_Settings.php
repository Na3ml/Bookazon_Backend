<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site_Settings extends Model 
{

    protected $table = 'site_settings';
    public $timestamps = true;
    protected $fillable = array('logo', 'address', 'support_phone', 'email', 'copyright', 'facebook', 'twitter');

}