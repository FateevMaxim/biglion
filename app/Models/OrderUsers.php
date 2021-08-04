<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderUsers extends Model
{
    protected $fillable = ['city', 'name', 'phone', 'street', 'apartment', 'order_sig', 'notes'];
    public $timestamps = false;
}
