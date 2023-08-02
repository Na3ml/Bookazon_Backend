<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_Us extends Model 
{

    protected $table = 'contact_us';
    public $timestamps = true;
    protected $fillable = array('user_id', 'msg', 'contact_email');

}