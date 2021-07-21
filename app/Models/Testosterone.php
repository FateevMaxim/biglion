<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testosterone extends Model
{
    protected $fillable = ['productName', 'slug', 'brand', 'weight', 'priceStore', 'priceShop', 'mainCategory', 'subCategory', 'description', 'avatar', 'available', 'pictures'];

    public function mainCategoryBond(){
        return $this->belongsTo( TestosteroneMainCategory::class, 'mainCategory');
    }
    public function subCategoryBond(){
        return $this->belongsTo(TestosteroneSubCategory::class, 'subCategory');
    }
    public function testosteroneBrandBond(){
        return $this->belongsTo(TestosteroneBrand::class, 'brand');
    }
}
