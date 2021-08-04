<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsBrand;
use App\Models\ProductsCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class IndexController extends Controller
{
    public function index (){
        $brands = ProductsBrand::all();
        $categories = ProductsCategories::all();
        $products = Products::select('priceShop', 'id', 'brand', 'categoryName')->whereIn('id', ['47', '30', '63', '20'])->with(['brandBond'])->get(4);
        $sliders = Products::select('weight', 'id', 'brand', 'categoryName', 'description', 'pictures')->whereIn('id', ['32', '68'])->with(['brandBond'])->get(2);

        return view('index', compact('brands', 'categories', 'products', 'sliders'));
    }

    public function details () {
        $categories = ProductsCategories::all();
        return view('details', compact('categories'));
    }
    public function offer () {
        $categories = ProductsCategories::all();
        return view('offer', compact('categories'));
    }
}
