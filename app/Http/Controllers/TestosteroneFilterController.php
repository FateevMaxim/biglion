<?php

namespace App\Http\Controllers;

use App\Models\Testosterone;
use App\Models\TestosteroneBrand;
use App\Models\TestosteroneMainCategory;
use App\Models\TestosteroneSubCategory;
use Illuminate\Http\Request;

class TestosteroneFilterController extends Controller
{

    public function categoryTestosterone(Request $request, $id){

        if(isset($request->orderBy)){
            if ($request->orderBy == 'price-low-high'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('mainCategory', $id)->with(['mainCategoryBond'])->groupBy('productName')->orderBy('priceShop')->paginate(15);
                if($request->ajax()){
                    return view('ajaxTestosterone.orderByPrice-low-high', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'price-high-low'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('mainCategory', $id)->with(['mainCategoryBond'])->groupBy('productName')->orderBy('priceShop', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByPrice-high-low', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-a-z'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('mainCategory', $id)->with(['mainCategoryBond'])->groupBy('productName')->orderBy('productName')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByName-a-z', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-z-a'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('mainCategory', $id)->with(['mainCategoryBond'])->groupBy('productName')->orderBy('productName', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByName-z-a', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
            if ($request->orderBy == 'default'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('mainCategory', $id)->with(['mainCategoryBond'])->groupBy('productName')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByDefault', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
        }else{
            $allProducts = Testosterone::where('available', '!=', '0')->where('mainCategory', $id)->with(['mainCategoryBond'])->groupBy('productName')->paginate(15);
        }


        $allProductsMenu = Testosterone::select('mainCategory', 'brand', 'productName', 'subCategory')->where('available', '!=', '0')->get();
        /** Подтягивание и подсчёт товаров с определённым брендом**/
        $brands = TestosteroneBrand::all();
        foreach ($brands as $brand){
            if (!isset($brandCount)){
                $brandCount = collect([$brand->brand => (($allProductsMenu->where('brand', $brand->id)->unique('productName'))->count())]);
            }else{
                $brandCountFinal = $brandCount->put($brand->brand, (($allProductsMenu->where('brand', $brand->id)->unique('productName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённым брендом**/

        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $mainCategories = TestosteroneMainCategory::all();
        $categoriesTestosterone = $mainCategories;
        foreach ($mainCategories as $category){
            if (!isset($categoryCount)){
                $categoryCount = collect([$category->main_category => (($allProductsMenu->where('mainCategory', $category->id)->unique('productName'))->count())]);
            }else{
                $categoryCountFinal = $categoryCount->put($category->main_category, (($allProductsMenu->where('mainCategory', $category->id)->unique('productName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённой категорией**/
        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $subCategories = TestosteroneSubCategory::all();
        foreach ($subCategories as $subCategory){
            if (!isset($subCategoryCount)){
                $subCategoryCount = collect([$subCategory->sub_category => (($allProductsMenu->where('subCategory', $subCategory->id)->unique('productName'))->count())]);
            }else{
                $subCategoryCountFinal = $subCategoryCount->put($subCategory->sub_category, (($allProductsMenu->where('subCategory', $subCategory->id)->unique('productName'))->count()));
            }
        }
        /** Конец Подтягивания и подсчёта товаров с определённой категорией**/
        //dd(@$allProducts);
        return view('testosterone', compact( 'allProducts', 'brands', 'brandCountFinal', 'mainCategories', 'categoryCountFinal', 'categoriesTestosterone', 'subCategories', 'subCategoryCountFinal'));
    }





    public function subCategoryTestosterone(Request $request, $id){

        if(isset($request->orderBy)){
            if ($request->orderBy == 'price-low-high'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('subCategory', $id)->with(['subCategoryBond'])->groupBy('productName')->orderBy('priceShop')->paginate(15);
                if($request->ajax()){
                    return view('ajaxTestosterone.orderByPrice-low-high', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'price-high-low'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('subCategory', $id)->with(['subCategoryBond'])->groupBy('productName')->orderBy('priceShop', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByPrice-high-low', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-a-z'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('subCategory', $id)->with(['subCategoryBond'])->groupBy('productName')->orderBy('productName')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByName-a-z', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-z-a'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('subCategory', $id)->with(['subCategoryBond'])->groupBy('productName')->orderBy('productName', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByName-z-a', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
            if ($request->orderBy == 'default'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('subCategory', $id)->with(['subCategoryBond'])->groupBy('productName')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByDefault', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
        }else{
            $allProducts = Testosterone::where('available', '!=', '0')->where('subCategory', $id)->with(['subCategoryBond'])->groupBy('productName')->paginate(15);
        }


        $allProductsMenu = Testosterone::select('mainCategory', 'brand', 'productName', 'subCategory')->where('available', '!=', '0')->get();
        /** Подтягивание и подсчёт товаров с определённым брендом**/
        $brands = TestosteroneBrand::all();
        foreach ($brands as $brand){
            if (!isset($brandCount)){
                $brandCount = collect([$brand->brand => (($allProductsMenu->where('brand', $brand->id)->unique('productName'))->count())]);
            }else{
                $brandCountFinal = $brandCount->put($brand->brand, (($allProductsMenu->where('brand', $brand->id)->unique('productName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённым брендом**/

        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $mainCategories = TestosteroneMainCategory::all();
        $categoriesTestosterone = $mainCategories;
        foreach ($mainCategories as $category){
            if (!isset($categoryCount)){
                $categoryCount = collect([$category->main_category => (($allProductsMenu->where('mainCategory', $category->id)->unique('productName'))->count())]);
            }else{
                $categoryCountFinal = $categoryCount->put($category->main_category, (($allProductsMenu->where('mainCategory', $category->id)->unique('productName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённой категорией**/
        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $subCategories = TestosteroneSubCategory::all();
        foreach ($subCategories as $subCategory){
            if (!isset($subCategoryCount)){
                $subCategoryCount = collect([$subCategory->sub_category => (($allProductsMenu->where('subCategory', $subCategory->id)->unique('productName'))->count())]);
            }else{
                $subCategoryCountFinal = $subCategoryCount->put($subCategory->sub_category, (($allProductsMenu->where('subCategory', $subCategory->id)->unique('productName'))->count()));
            }
        }
        /** Конец Подтягивания и подсчёта товаров с определённой категорией**/
        //dd(@$allProducts);
        return view('testosterone', compact( 'allProducts', 'brands', 'brandCountFinal', 'mainCategories', 'categoryCountFinal', 'subCategories', 'categoriesTestosterone', 'subCategoryCountFinal'));
    }



    public function brandTestosterone(Request $request, $id){

        if(isset($request->orderBy)){
            if ($request->orderBy == 'price-low-high'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('brand', $id)->with(['testosteroneBrandBond'])->groupBy('productName')->orderBy('priceShop')->paginate(15);
                if($request->ajax()){
                    return view('ajaxTestosterone.orderByPrice-low-high', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'price-high-low'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('brand', $id)->with(['testosteroneBrandBond'])->groupBy('productName')->orderBy('priceShop', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByPrice-high-low', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-a-z'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('brand', $id)->with(['testosteroneBrandBond'])->groupBy('productName')->orderBy('productName')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByName-a-z', ['allProducts' => $allProducts])->render();
                }
            }
            if ($request->orderBy == 'name-z-a'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('brand', $id)->with(['testosteroneBrandBond'])->groupBy('productName')->orderBy('productName', 'desc')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByName-z-a', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
            if ($request->orderBy == 'default'){
                $allProducts = Testosterone::where('available', '!=', '0')->where('brand', $id)->with(['testosteroneBrandBond'])->groupBy('productName')->paginate(15);
                if($request->ajax()) {
                    return view('ajaxTestosterone.orderByDefault', ['allProducts' => $allProducts, 'selected' => 'selected'])->render();
                }
            }
        }else{
            $allProducts = Testosterone::where('available', '!=', '0')->where('brand', $id)->with(['testosteroneBrandBond'])->groupBy('productName')->paginate(15);
        }


        $allProductsMenu = Testosterone::select('mainCategory', 'brand', 'subCategory', 'productName')->where('available', '!=', '0')->get();
        /** Подтягивание и подсчёт товаров с определённым брендом**/
        $brands = TestosteroneBrand::all();
        foreach ($brands as $brand){
            if (!isset($brandCount)){
                $brandCount = collect([$brand->brand => (($allProductsMenu->where('brand', $brand->id)->unique('productName'))->count())]);
            }else{
                $brandCountFinal = $brandCount->put($brand->brand, (($allProductsMenu->where('brand', $brand->id)->unique('productName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённым брендом**/

        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $mainCategories = TestosteroneMainCategory::all();
        $categoriesTestosterone = $mainCategories;
        foreach ($mainCategories as $category){
            if (!isset($categoryCount)){
                $categoryCount = collect([$category->main_category => (($allProductsMenu->where('mainCategory', $category->id)->unique('productName'))->count())]);
            }else{
                $categoryCountFinal = $categoryCount->put($category->main_category, (($allProductsMenu->where('mainCategory', $category->id)->unique('productName'))->count()));
            }
        }
        /** Конец Подтягивание и подсчёт товаров с определённой категорией**/
        /** Подтягивание и подсчёт товаров с определённой категорией**/
        $subCategories = TestosteroneSubCategory::all();
        foreach ($subCategories as $subCategory){
            if (!isset($subCategoryCount)){
                $subCategoryCount = collect([$subCategory->sub_category => (($allProductsMenu->where('subCategory', $subCategory->id)->unique('productName'))->count())]);
            }else{
                $subCategoryCountFinal = $subCategoryCount->put($subCategory->sub_category, (($allProductsMenu->where('subCategory', $subCategory->id)->unique('productName'))->count()));
            }
        }
        /** Конец Подтягивания и подсчёта товаров с определённой категорией**/
        //dd(@$allProducts);
        return view('testosterone', compact( 'allProducts', 'brands', 'brandCountFinal', 'mainCategories', 'categoryCountFinal', 'subCategories', 'categoriesTestosterone', 'subCategoryCountFinal'));
    }

}
