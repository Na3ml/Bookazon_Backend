<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('user_id', 'order_no', 'booking_date', 'check_in_date', 'checko_out_date', 'transaction_id', 'paid_amount', 'status', 'payment_method');

}