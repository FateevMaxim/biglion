<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestosteroneBrand extends Model
{
    public function testosteroneBrand(){
        return $this->hasMany(Testosterone::class);
    }
}
