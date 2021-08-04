<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsCategories;
use App\Models\Testosterone;
use App\Models\TestosteroneMainCategory;
use Gloudemans\Shoppingcart\Facades\Cart;

class SingleProductController extends Controller
{
    public function index($id){

        $exactProduct = Products::where('id', $id)->with('brandBond')->get();
        $relatedProducts = Products::where('categoryNutrition', $exactProduct[0]->categoryNutrition)->where('available', '!=', '0')->with('brandBond')->groupBy('categoryName')->get();
        $categories = ProductsCategories::all();
        $cart = Cart::content();
        return view('singleProduct', compact('exactProduct','cart', 'categories', 'relatedProducts'));
    }

    public function singleTestosterone ($id) {
        $exactProduct = Testosterone::where('id', $id)->with('testosteroneBrandBond')->get();
        $mainCategories = TestosteroneMainCategory::all();
        $categoriesTestosterone = $mainCategories;
        return view('singleTestosterone', compact('exactProduct', 'mainCategories', 'categoriesTestosterone'));
    }
}
