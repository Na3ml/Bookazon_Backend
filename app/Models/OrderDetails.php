<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected  $table = 'orders_details';
    protected $fillable = [
    'InvoiceID',
        'InvoiceURL',
        'order_id',
        'user_id',
        'price'
    ];
}
