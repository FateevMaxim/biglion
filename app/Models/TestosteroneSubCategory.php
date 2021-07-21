<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestosteroneSubCategory extends Model
{
    public function mainCategoryBond(){
        return $this->belongsTo( TestosteroneMainCategory::class, 'main_category_link');
    }
}
