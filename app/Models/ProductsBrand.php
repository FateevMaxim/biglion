<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsBrand extends Model
{
    public function productsBrand(){
        return $this->hasMany(Products::class);
    }
}
