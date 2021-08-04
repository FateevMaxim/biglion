<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['slug', 'quantity', 'price', 'paymentStatus', 'payment_method', 'order_sig', 'order_id'];
}
