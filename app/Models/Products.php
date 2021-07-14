<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['categoryName', 'slug', 'brand', 'weight', 'taste', 'priceStore', 'priceShop', 'categoryNutrition', 'purpose', 'description', 'avatar', 'available', 'pictures'];


    public function purposeBond(){
        return $this->belongsTo(ProductsPurpose::class, 'purpose');
    }
    public function categoryBond(){
        return $this->belongsTo(ProductsCategories::class, 'categoryNutrition');
    }
    public function brandBond(){
        return $this->belongsTo(ProductsBrand::class, 'brand');
    }
    public function tasteBond(){
        return $this->belongsTo(ProductsTaste::class, 'taste');
    }
}
