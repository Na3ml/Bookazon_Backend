<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat_Message extends Model 
{

    protected $table = 'chat_messages';
    public $timestamps = true;
    protected $fillable = array('receiver_id', 'msg');

}