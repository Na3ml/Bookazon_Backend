<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('user_id','room_id', 'order_no', 'booking_date', 'check_in_date', 'check_out_date', 'transaction_id', 'paid_amount', 'status', 'payment_method');

    public function user()
    {
        return  $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function payment() {
        return $this->hasOne( Payment::class, 'order_id');
    }
}
