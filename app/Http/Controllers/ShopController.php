<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsBrand;
use App\Models\ProductsCategories;
use App\Models\ProductsPurpose;
use App\Models\ProductsTaste;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = new Products();
        $allProducts = Products::with(['brandBond'])->groupBy('categoryName')->paginate(15);
        $allProductsMenu = Products::all();


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
        /** Конец Подтягивания и подсчёта товаров с определённой категорией**/

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
        //dd(@$allProducts);
        return view('shop', compact( 'allProducts', 'brands', 'brandCountFinal', 'categories', 'categoryCountFinal', 'purposes', 'purposeCountFinal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
