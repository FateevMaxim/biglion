<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsBrand;
use App\Models\ProductsCategories;
use App\Models\ProductsPurpose;
use App\Models\ProductsTaste;
use Illuminate\Http\Request;

class ShopFilterController extends Controller
{

    public function purpose(Request $request, $id)
    {

        if(isset($request->orderBy)){
            if ($request->orderBy == 'price-low-high'){
                $allProducts = Products::where('available', '!=', '0')->where('purpose', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('priceShop')->paginate(15);
                if($request->ajax()){
                    return view('ajax.orderByPrice-low-high', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'price-high-low'){
                $allProducts = Products::where('available', '!=', '0')->where('purpose', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('priceShop', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByPrice-high-low', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-a-z'){
                $allProducts = Products::where('available', '!=', '0')->where('purpose', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('categoryName')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByName-a-z', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-z-a'){
                $allProducts = Products::where('available', '!=', '0')->where('purpose', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('categoryName', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByName-z-a', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
            if ($request->orderBy == 'default'){
                $allProducts = Products::where('available', '!=', '0')->where('purpose', $id)->with(['purposeBond'])->groupBy('categoryName')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByDefault', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
        }else{
                $allProducts = Products::where('available', '!=', '0')->where('purpose', $id)->with(['purposeBond'])->groupBy('categoryName')->paginate(15);
        }


        //$allProductsMenu = Products::all();
        $allProductsMenu = Products::select('categoryNutrition', 'brand', 'taste', 'categoryName', 'purpose')->where('available', '!=', '0')->get();
        /** Подтягивание и подсчёт товаров с определённым брендом**/
        $brands = ProductsBrand::all();
        foreach ($brands as $brand){
            if (!isset($brandCount)){
                $brandCount = collect([$brand->brand => (($allProductsMenu->where('categoryNutrition', $brand->id)->unique('categoryName'))->count())]);
            }else{
                $brandCountFinal = $brandCount->put($brand->brand, (($allProductsMenu->where('categoryNutrition', $brand->id)->unique('categoryName'))->count()));
            }

        }
        /** Конец Подтягивание и подсчёт товаров с определённым брендом**/

        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $categories = ProductsCategories::all();
        foreach ($categories as $category){
            if (!isset($categoryCount)){
                $categoryCount = collect([$category->category => (($allProductsMenu->where('categoryNutrition', $category->id)->unique('categoryName'))->count())]);
            }else{
                $categoryCountFinal = $categoryCount->put($category->category, (($allProductsMenu->where('categoryNutrition', $category->id)->unique('categoryName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённой категорией**/

        /** Подтягивание и подсчёт товаров с определённой целью**/
        $purposes = ProductsPurpose::all();
        foreach ($purposes as $purpose){
            if (!isset($purposeCount)){
                $purposeCount = collect([$purpose->purpose => (($allProductsMenu->where('purpose', $purpose->id)->unique('categoryName'))->count())]);
            }else{
                $purposeCountFinal = $purposeCount->put($purpose->purpose, (($allProductsMenu->where('purpose', $purpose->id)->unique('categoryName'))->count()));
            }

        }
        /** Конец Подтягивание и подсчёт товаров с определённой целью**/

        /** Подтягивание и подсчёт товаров с определённым вкусом**/
        $tastes = ProductsTaste::all();
        foreach ($tastes as $taste){
            if (!isset($tasteCount)){
                $tasteCount = collect([$taste->taste => (($allProductsMenu->where('taste', '=', $taste->id)->unique('categoryName'))->count())]);
            }else{
                $tasteCountFinal = $tasteCount->put($taste->taste, (($allProductsMenu->where('taste', '=', $taste->id)->unique('categoryName'))->count()));
            }

        }
        /** Конец Подтягивание и подсчёт товаров с определённым вкусом**/
        return view('shop', compact( 'allProducts', 'brands', 'brandCountFinal', 'categories', 'categoryCountFinal', 'purposes', 'purposeCountFinal', 'tastes', 'tasteCountFinal'));
    }




    public function category(Request $request, $id){

        if(isset($request->orderBy)){
            if ($request->orderBy == 'price-low-high'){
                $allProducts = Products::where('available', '!=', '0')->where('categoryNutrition', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('priceShop')->paginate(15);
                if($request->ajax()){
                    return view('ajax.orderByPrice-low-high', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'price-high-low'){
                $allProducts = Products::where('available', '!=', '0')->where('categoryNutrition', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('priceShop', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByPrice-high-low', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-a-z'){
                $allProducts = Products::where('available', '!=', '0')->where('categoryNutrition', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('categoryName')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByName-a-z', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-z-a'){
                $allProducts = Products::where('available', '!=', '0')->where('categoryNutrition', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('categoryName', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByName-z-a', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
            if ($request->orderBy == 'default'){
                $allProducts = Products::where('available', '!=', '0')->where('categoryNutrition', $id)->with(['purposeBond'])->groupBy('categoryName')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByDefault', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
        }else{
            $allProducts = Products::where('available', '!=', '0')->where('categoryNutrition', $id)->with(['categoryBond'])->groupBy('categoryName')->paginate(15);
        }


        $allProductsMenu = Products::select('categoryNutrition', 'brand', 'taste', 'categoryName', 'purpose')->where('available', '!=', '0')->get();
        /** Подтягивание и подсчёт товаров с определённым брендом**/
        $brands = ProductsBrand::all();
        foreach ($brands as $brand){
            if (!isset($brandCount)){
                $brandCount = collect([$brand->brand => (($allProductsMenu->where('brand', $brand->id)->unique('categoryName'))->count())]);
            }else{
                $brandCountFinal = $brandCount->put($brand->brand, (($allProductsMenu->where('brand', $brand->id)->unique('categoryName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённым брендом**/

        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $categories = ProductsCategories::all();
        foreach ($categories as $category){
            if (!isset($categoryCount)){
                $categoryCount = collect([$category->category => (($allProductsMenu->where('categoryNutrition', $category->id)->unique('categoryName'))->count())]);
            }else{
                $categoryCountFinal = $categoryCount->put($category->category, (($allProductsMenu->where('categoryNutrition', $category->id)->unique('categoryName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённой категорией**/

        /** Подтягивание и подсчёт товаров с определённой целью**/
        $purposes = ProductsPurpose::all();
        foreach ($purposes as $purpose){
            if (!isset($purposeCount)){
                $purposeCount = collect([$purpose->purpose => (($allProductsMenu->where('purpose', $purpose->id)->unique('categoryName'))->count())]);
            }else{
                $purposeCountFinal = $purposeCount->put($purpose->purpose, (($allProductsMenu->where('purpose', $purpose->id)->unique('categoryName'))->count()));
            }

        }
        /** Конец Подтягивание и подсчёт товаров с определённой целью**/

        /** Подтягивание и подсчёт товаров с определённым вкусом**/
        $tastes = ProductsTaste::all();
        foreach ($tastes as $taste){
            if (!isset($tasteCount)){
                $tasteCount = collect([$taste->taste => (($allProductsMenu->where('taste', '=', $taste->id)->unique('categoryName'))->count())]);
            }else{
                $tasteCountFinal = $tasteCount->put($taste->taste, (($allProductsMenu->where('taste', '=', $taste->id)->unique('categoryName'))->count()));
            }

        }
        /** Конец Подтягивание и подсчёт товаров с определённым вкусом**/

        return view('shop', compact( 'allProducts', 'brands', 'brandCountFinal', 'categories', 'categoryCountFinal', 'purposes', 'purposeCountFinal', 'tastes', 'tasteCountFinal'));
    }



    public function brand(Request $request, $id){

        if(isset($request->orderBy)){
            if ($request->orderBy == 'price-low-high'){
                $allProducts = Products::where('available', '!=', '0')->where('brand', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('priceShop')->paginate(15);
                if($request->ajax()){
                    return view('ajax.orderByPrice-low-high', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'price-high-low'){
                $allProducts = Products::where('available', '!=', '0')->where('brand', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('priceShop', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByPrice-high-low', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-a-z'){
                $allProducts = Products::where('available', '!=', '0')->where('brand', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('categoryName')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByName-a-z', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-z-a'){
                $allProducts = Products::where('available', '!=', '0')->where('brand', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('categoryName', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByName-z-a', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
            if ($request->orderBy == 'default'){
                $allProducts = Products::where('available', '!=', '0')->where('brand', $id)->with(['purposeBond'])->groupBy('categoryName')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByDefault', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
        }else{
            $allProducts = Products::where('available', '!=', '0')->where('brand', $id)->with(['brandBond'])->groupBy('categoryName')->paginate(15);
        }


        $allProductsMenu = Products::select('categoryNutrition', 'brand', 'taste', 'categoryName', 'purpose')->where('available', '!=', '0')->get();
        /** Подтягивание и подсчёт товаров с определённым брендом**/
        $brands = ProductsBrand::all();
        foreach ($brands as $brand){
            if (!isset($brandCount)){
                $brandCount = collect([$brand->brand => (($allProductsMenu->where('brand', $brand->id)->unique('categoryName'))->count())]);
            }else{
                $brandCountFinal = $brandCount->put($brand->brand, (($allProductsMenu->where('brand', $brand->id)->unique('categoryName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённым брендом**/

        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $categories = ProductsCategories::all();
        foreach ($categories as $category){
            if (!isset($categoryCount)){
                $categoryCount = collect([$category->category => (($allProductsMenu->where('categoryNutrition', $category->id)->unique('categoryName'))->count())]);
            }else{
                $categoryCountFinal = $categoryCount->put($category->category, (($allProductsMenu->where('categoryNutrition', $category->id)->unique('categoryName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённой категорией**/

        /** Подтягивание и подсчёт товаров с определённой целью**/
        $purposes = ProductsPurpose::all();
        foreach ($purposes as $purpose){
            if (!isset($purposeCount)){
                $purposeCount = collect([$purpose->purpose => (($allProductsMenu->where('purpose', $purpose->id)->unique('categoryName'))->count())]);
            }else{
                $purposeCountFinal = $purposeCount->put($purpose->purpose, (($allProductsMenu->where('purpose', $purpose->id)->unique('categoryName'))->count()));
            }

        }
        /** Конец Подтягивание и подсчёт товаров с определённой целью**/

        /** Подтягивание и подсчёт товаров с определённым вкусом**/
        $tastes = ProductsTaste::all();
        foreach ($tastes as $taste){
            if (!isset($tasteCount)){
                $tasteCount = collect([$taste->taste => (($allProductsMenu->where('taste', '=', $taste->id)->unique('categoryName'))->count())]);
            }else{
                $tasteCountFinal = $tasteCount->put($taste->taste, (($allProductsMenu->where('taste', '=', $taste->id)->unique('categoryName'))->count()));
            }

        }
        /** Конец Подтягивание и подсчёт товаров с определённым вкусом**/

        return view('shop', compact( 'allProducts', 'brands', 'brandCountFinal', 'categories', 'categoryCountFinal', 'purposes', 'purposeCountFinal', 'tastes', 'tasteCountFinal'));
    }


    public function taste(Request $request, $id){

        if(isset($request->orderBy)){
            if ($request->orderBy == 'price-low-high'){
                $allProducts = Products::where('available', '!=', '0')->where('taste', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('priceShop')->paginate(15);
                if($request->ajax()){
                    return view('ajax.orderByPrice-low-high', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'price-high-low'){
                $allProducts = Products::where('available', '!=', '0')->where('taste', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('priceShop', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByPrice-high-low', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-a-z'){
                $allProducts = Products::where('available', '!=', '0')->where('taste', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('categoryName')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByName-a-z', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-z-a'){
                $allProducts = Products::where('available', '!=', '0')->where('taste', $id)->with(['purposeBond'])->groupBy('categoryName')->orderBy('categoryName', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByName-z-a', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
            if ($request->orderBy == 'default'){
                $allProducts = Products::where('available', '!=', '0')->where('taste', $id)->with(['purposeBond'])->groupBy('categoryName')->paginate(15);
                if($request->ajax()) {
                    return view('ajax.orderByDefault', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
        }else{
            $allProducts = Products::where('available', '!=', '0')->where('taste', $id)->with(['tasteBond'])->groupBy('categoryName')->paginate(15);
        }


        $allProductsMenu = Products::select('categoryNutrition', 'brand', 'taste', 'categoryName', 'purpose')->where('available', '!=', '0')->get();
        /** Подтягивание и подсчёт товаров с определённым брендом**/
        $brands = ProductsBrand::all();
        foreach ($brands as $brand){
            if (!isset($brandCount)){
                $brandCount = collect([$brand->brand => (($allProductsMenu->where('brand', $brand->id)->unique('categoryName'))->count())]);
            }else{
                $brandCountFinal = $brandCount->put($brand->brand, (($allProductsMenu->where('brand', $brand->id)->unique('categoryName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённым брендом**/

        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $categories = ProductsCategories::all();
        foreach ($categories as $category){
            if (!isset($categoryCount)){
                $categoryCount = collect([$category->category => (($allProductsMenu->where('categoryNutrition', $category->id)->unique('categoryName'))->count())]);
            }else{
                $categoryCountFinal = $categoryCount->put($category->category, (($allProductsMenu->where('categoryNutrition', $category->id)->unique('categoryName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённой категорией**/

        /** Подтягивание и подсчёт товаров с определённой целью**/
        $purposes = ProductsPurpose::all();
        foreach ($purposes as $purpose){
            if (!isset($purposeCount)){
                $purposeCount = collect([$purpose->purpose => (($allProductsMenu->where('purpose', $purpose->id)->unique('categoryName'))->count())]);
            }else{
                $purposeCountFinal = $purposeCount->put($purpose->purpose, (($allProductsMenu->where('purpose', $purpose->id)->unique('categoryName'))->count()));
            }

        }
        /** Конец Подтягивание и подсчёт товаров с определённой целью**/

        /** Подтягивание и подсчёт товаров с определённым вкусом**/
        $tastes = ProductsTaste::all();
        foreach ($tastes as $taste){
            if (!isset($tasteCount)){
                $tasteCount = collect([$taste->taste => (($allProductsMenu->where('taste', '=', $taste->id)->unique('categoryName'))->count())]);
            }else{
                $tasteCountFinal = $tasteCount->put($taste->taste, (($allProductsMenu->where('taste', '=', $taste->id)->unique('categoryName'))->count()));
            }

        }
        /** Конец Подтягивание и подсчёт товаров с определённым вкусом**/





        return view('shop', compact( 'allProducts', 'brands', 'brandCountFinal', 'categories', 'categoryCountFinal', 'purposes', 'purposeCountFinal', 'tastes', 'tasteCountFinal'));
    }
}
