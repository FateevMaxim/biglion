<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsBrand;
use App\Models\ProductsCategories;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index (){

        $brands = ProductsBrand::all();
        $categories = ProductsCategories::all();
        $products = Products::select('priceShop', 'id', 'brand', 'categoryName')->whereIn('id', ['47', '30', '63', '20'])->with(['brandBond'])->get(4);
        $sliders = Products::select('weight', 'id', 'brand', 'categoryName', 'description', 'pictures')->whereIn('id', ['32', '68'])->with(['brandBond'])->get(2);

        return view('index', compact('brands', 'categories', 'products', 'sliders'));
    }
}
