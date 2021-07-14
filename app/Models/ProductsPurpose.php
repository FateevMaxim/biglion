<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsPurpose extends Model
{
    public function productsPurpose(){
        return $this->hasMany(Products::class);
    }
}
