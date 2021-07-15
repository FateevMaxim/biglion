<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsCategories;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function index($id){

        $exactProduct = Products::where('id', $id)->with('brandBond')->get();
        $categories = ProductsCategories::all();
        $customTasteProduct = Products::select('id', 'taste')->where('available', '!=', '0')->where('categoryName', $exactProduct[0]->categoryName)->get();

        return view('singleProduct', compact('exactProduct', 'customTasteProduct', 'categories'));
    }
}
