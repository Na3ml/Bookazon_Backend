<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
<<<<<<< HEAD
    protected $fillable = array('user_id','room_id', 'order_no', 'booking_date', 'check_in_date', 'check_out_date', 'transaction_id', 'paid_amount', 'status', 'payment_method');
=======
    protected $fillable = array('user_id', 'order_no', 'booking_date', 'check_in_date', 'check_out_date', 'transaction_id', 'paid_amount', 'status', 'payment_method');
>>>>>>> 7338c63cfd5605463560cc793d1d16ca2af4f423

}
